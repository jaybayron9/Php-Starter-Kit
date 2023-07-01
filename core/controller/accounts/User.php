<?php 

namespace Client;
use Emailer;
use DBConn\DBConn;
use Auth\Auth;

class User extends DBConn {
    public function login() {
        Auth::check_csrf($_POST['csrf_token']);
        $error['field'] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : null;
        $error['email'] = Auth::check_email($_POST) ? 'Invalid email address' : null;

        $msg = 'Incorrect email or password';
        if (!empty($error['field']) || !empty($error['email'])) {
            return parent::alert('error', $msg);
        }

        $userTbl = parent::select('users','id, email, password', [], null, 1);
    
        foreach ($userTbl as $v) {
            $email = $_POST['email'] === $v['email'];
            $pass = password_verify($_POST['password'], $v['password']);
            
            if ($email && $pass) {
                if (isset($_POST['remember']) == 'on') {
                    $expiration = time() + 30 * 24 * 60 * 60;
                    setcookie('user_id', $v['id'], $expiration);
                }

                $_SESSION['user_id'] = $v['id'];
                return parent::alert('success', 'success');
            }
        }

        return parent::alert('error', $msg);
    }

    public function sign_out() {
        if (isset($_COOKIE['user_id'])) {
            setcookie('user_id', '', time() - 3600);
        }

        Auth::sign_out();
    }

    public function register() {
        Auth::check_csrf($_POST['csrf_token']);
        $error[] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : '';
        $error[] = Auth::check_email($_POST) ? 'Invalid email address' : '';
        $error[] = Auth::check_similar_email('users', $_POST['email']) ? 'The email has already been taken.' : '';
        $error[] = Auth::confirm_password($_POST['password'], $_POST['password_confirmation']) ? 'Password do not match' : '';
        $error[] = Auth::pass_length($_POST['password'], 7) ? 'The password must be between 8 to 96 characters.' : '';

        if (empty(array_filter($error))) {
            parent::insert('users', [
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ]);

            $id = parent::select('users', 'id', ['email' => $_POST['email']], null, 1);
            $_SESSION['user_id'] = $id[0]['id'];

            return parent::alert('success', '');
        } else {
            return json_encode([
                'status' => 'error',
                'msg' => $error[0],
                'email_format' => $error[1], 
                'similar_email' => $error[2],
                'pass_confirm' => $error[3],
                'password_length' => $error[4],
            ]);
        }
    }

    public function similar_email() {
        extract($_POST);
        echo Auth::check_email($_POST) ? 'Invalid email address' : '';
        echo Auth::check_similar_email('users', $email) ? 'This Email address is already taken.' : '';
    }

    public function pass_request() { 
        Auth::check_csrf($_POST['csrf_token']);

        if (!Auth::check_empty($_POST)) {
            $email = parent::select('users', '*', ['email' => $_POST['email']], null, 1);
            if (count($email) > 0) {
                $token = bin2hex(random_bytes(32));

                parent::update('users', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");

                $config = require('config.php'); 
                extract($config['links']);

                $url = $reset_password_url . '?vs=reset_password&token=' . $token;

                $mailer = new EMailer();
                $send = $mailer->send($_POST['email'], 'Password Reset Link', $mailer->temp_body($url));

                if ($send) {
                    return parent::alert('success', 'We have emailed your password reset link!');
                }
            }
            return parent::alert('error', 'We can\'t find a user with that email address.');
        } 

        return parent::alert('error', 'The Email field is required.');
    }

    public function reset_password() {
        Auth::check_csrf($_POST['csrf_token']);

        if (!Auth::check_empty($_POST)) {
            $validate = parent::select('users', 'id', [
                    'email' => $_POST['email'], 
                    'password_reset_token' => $_POST['token'],
                ], null, 1);

            if (count($validate) > 0) {
                if ($_POST['password'] === $_POST['password_confirmation']) {
                    DBConn::update('users', [
                        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    ], "id = '{$validate[0]['id']}'");
                    return parent::alert('success', 'Your password has been changed.');
                }
                return parent::alert('error', 'Password does not match.');
            }
            return parent::alert('error', 'Email address does not match.');
        }
        return parent::alert('error', 'Please fill out the required fields.');
    }
}