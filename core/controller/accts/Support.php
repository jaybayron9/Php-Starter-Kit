<?php 

namespace Support;
use Emailer;
use Auth\Auth;
use DBConn\DBConn;
use FHandler\FHandler;

class Support extends DBConn {
    public function sign_in() {  
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? 'Error: 400 - Bad Request' : '';  
        $error[] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : '';
        $error[] = Auth::check_email($_POST) ?  'Incorrect email or password' : '';

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 'error',
                'msg' => 'Incorrect email or password', 
                'empty' => $error[1]
            ]);
        }

        $adminTbl = parent::select('supports','*', ['email' => $_POST['email']], null, 1);
    
        foreach ($adminTbl as $d) {
            if ($_POST['email'] === $d['email'] && password_verify($_POST['password'], $d['password'])) {
                $_SESSION['support_id'] = $d['id'];
                return parent::alert('success', '');
            }
        } 
        
        return parent::alert('error', 'Incorrect email or password');
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

                $url = $base_url . '/?vs=_sup/reset_password&token=' . $token;

                $mailer = new EMailer();
                $send = $mailer->send($_POST['email'], 'Support Password Reset Link', $mailer->forgot_temp($url));

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

    public function update_profile() {
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? '403 (Forbidden)' : '';
        $error[] = Auth::empty($_POST['email']) ? 'The email field is required.' : '';
        $error[] = Auth::empty($_POST['name']) ? 'The name field is required.' : '';
        $error[] = Auth::empty($_POST['phone']) ? 'The phone field is required.' : ''; 

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 400,
                'email' => $error[1],
                'name' => $error[2], 
                'phone' => $error[3],
            ]);
        }

        DBConn::update('supports', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'], 
        ], "id = '{$_POST['id']}'");

        if (!Auth::valImage()) { 
            $del = DBConn::select('supports', '*', ['id' => $_POST['id']], null, 1);
            FHandler::delete_image($del[0]['profile_photo_path']);
            DBConn::update('supports', [
                'profile_photo_path' => FHandler::upload_image('uploads'),
            ], "id = '{$_POST['id']}'");
        }

        return parent::resp(200, 'Saved.');
    }

    public function update_password() {
        $error[] = Auth::check_csrf($_POST['csrf_token']) ? '403 (Forbidden)' : '';
        $error[] = Auth::empty($_POST['current_password']) ? 'The current password field is required.' : '';
        $error[] = Auth::compare_password('supports', $_POST['id'], $_POST['current_password']) ? 'The provided password does not match your current password.' : '';
        $error[] = Auth::empty($_POST['new_password']) ? 'The new password field is required.' : '';
        $error[] = Auth::pass_length($_POST['new_password'], 7) ? 'The password must be at least 8 characters.' : '';
        $error[] = Auth::confirm_password($_POST['new_password'], $_POST['confirm_password']) ? 'The password confirmation does not match.' : ''; 

        if (!empty(array_filter($error))) {
            return json_encode([
                'status' => 400,
                'current_password' => $error[1],
                'old_pass_confirmation' => $error[2],
                'new_password' => $error[3],
                'pass_length' => $error[4], 
                'password_confirmaton' => $error[5]
            ]);
        }

        DBConn::update('supports', [
            'password' => password_hash($_POST['new_password'], PASSWORD_BCRYPT),
        ], "id = '{$_POST['id']}'");

        return parent::resp(200);
    }
}