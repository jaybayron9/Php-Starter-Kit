<?php 

namespace Support;
use Emailer;
use Auth\Auth;
use DBConn\DBConn;

class Support extends DBConn {
    public function sign_in() {
        $msg = 'Incorrect email or password';

        Auth::check_csrf($_POST['csrf_token']);

        $error[] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : '';
        $error[] = Auth::check_email($_POST) ? $msg : '';

        if (empty(array_filter($error))) {
            $supTbl = parent::select('supports','*', [], null, 1);

            foreach ($supTbl as $d) {
                $email = $_POST['email'] === $d['email'];
                $pass = password_verify($_POST['password'], $d['password']);

                if ($email && $pass) {
                    $_SESSION['support_id'] = $d['id'];
                    return parent::alert('success', '');
                }

                return parent::alert('error', $msg);
            }
        } 

        return json_encode([
            'status' => 'error',
            'msg' => $msg,
            'empty' => $error[0],
            'incorrect' => $error[1]
        ]);
    }

    public function pass_request() { 
        Auth::check_csrf($_POST['csrf_token']);

        if (!Auth::check_empty($_POST)) {
            $email = parent::select('supports', '*', ['email' => $_POST['email']], null, 1);
            if (count($email) > 0) {
                $token = bin2hex(random_bytes(32));

                parent::update('supports', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");

                $config = require('config.php'); 
                extract($config['links']);

                $url = $reset_password_url . '/?vs=_sup/reset_password&token=' . $token;

                $mailer = new EMailer();
                $send = $mailer->send($_POST['email'], 'Support Password Reset Link', $mailer->temp_body($url));

                if ($send) {
                    return parent::alert('success', 'We have emailed your password reset link!');
                }
            }
            return parent::alert('error', 'We can\'t find a user with that email address.');
        } 

        return parent::alert('error', 'The Email field is required.');
    }

    public function reset_pass() {
        Auth::check_csrf($_POST['csrf_token']);

        if (!Auth::check_empty($_POST)) {
            $validate = parent::select('supports', 'id', [
                    'email' => $_POST['email'], 
                    'password_reset_token' => $_POST['token'],
                ], null, 1);

            if (count($validate) > 0) {
                if ($_POST['password'] === $_POST['password_confirmation']) {
                    DBConn::update('supports', [
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