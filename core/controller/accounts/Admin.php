<?php 

namespace Admin;
use Emailer;
use Auth\Auth;
use DBConn\DBConn;

class Admin extends DBConn {
    public function login() {
        Auth::check_csrf($_POST['csrf_token']);
        $error['field'] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : null;
        $error['email'] = Auth::check_email($_POST) ? 'Invalid email address' : null;

        $msg = 'Incorrect email or password';
        if (!empty($error['field']) || !empty($error['email'])) {
            return parent::alert('error', $msg);
        }

        $adminTbl = parent::select('admins','*', [], null, 1);
    
        foreach ($adminTbl as $d) {
            $email = $_POST['email'] === $d['email'];
            $pass = password_verify($_POST['password'], $d['password']);
            
            if ($email && $pass) {
                $_SESSION['admin_id'] = $d['id'];
                return parent::alert('success', 'success');
            }
        }

        return parent::alert('error', $msg);
    }

    public function pass_request() { 
        Auth::check_csrf($_POST['csrf_token']);

        if (!Auth::check_empty($_POST)) {
            $email = parent::select('admins', '*', ['email' => $_POST['email']], null, 1);
            if (count($email) > 0) {
                $token = bin2hex(random_bytes(32));

                parent::update('admins', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");

                $url = 'http://localhost/GitHub/PHPMysqlTailwindJquery/?vs=_admin/reset_password&token=' . $token;

                $mailer = new EMailer();
                $send = $mailer->send($_POST['email'], 'subject', $mailer->temp_body($url));

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
            $validate = parent::select('admins', 'id', [
                    'email' => $_POST['email'], 
                    'password_reset_token' => $_POST['token'],
                ], null, 1);

            if (count($validate) > 0) {
                if ($_POST['password'] === $_POST['password_confirmation']) {
                    DBConn::update('admins', [
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