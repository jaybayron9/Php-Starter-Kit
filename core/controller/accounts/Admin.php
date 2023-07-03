<?php 

namespace Admin;
use Emailer;
use Auth\Auth;
use DBConn\DBConn;

class Admin extends DBConn {
    public function sign_in() {
        $config = require('config.php'); 
        extract($config['recaptchav3']);

        $error[] = Auth::check_csrf($_POST['csrf_token']) ? 'Error: 400 - Bad Request' : ''; 
        $error[] = Auth::reCaptchaV3($_POST['recaptcha'], $SECRET_KEY) ? 'You are a robot.' : '';
        $error[] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : null;
        $error[] = Auth::check_email($_POST) ? 'Incorrect email or password' : null;

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 'error',
                'msg' => 'Incorrect email or password',
                'robot' => $error[1], 
                'empty' => $error[2]
            ]);
        }

        $adminTbl = parent::select('admins','*', [], null, 1);
    
        foreach ($adminTbl as $d) {
            if ($_POST['email'] === $d['email'] && password_verify($_POST['password'], $d['password'])) {
                $_SESSION['admin_id'] = $d['id'];
                return parent::alert('success', '');
            }
        }

        return parent::alert('error', $msg);
    }

    public function pass_request() { 
        $config = require('config.php');
        extract($config['recaptchav3']);

        Auth::check_csrf($_POST['csrf_token']); 
        if (Auth::reCaptchaV3($_POST['recaptcha'], $SECRET_KEY)) {
            return parent::alert('error', 'You are a robot.');
        } 

        if (!Auth::check_empty($_POST)) {
            $email = parent::select('admins', '*', ['email' => $_POST['email']], null, 1);
            if (count($email) > 0) {
                $token = bin2hex(random_bytes(32));

                parent::update('admins', [
                    'password_reset_token' => $token,
                ], "email = '{$_POST['email']}'");

                $config = require('config.php'); 
                extract($config['links']);

                $url = $base_url . '/?vs=_admin/reset_password&token=' . $token;

                $mailer = new EMailer();
                $send = $mailer->send($_POST['email'], 'Admin Password Reset Link', $mailer->forgot_temp($url));

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