<?php 

namespace Client;
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

        $userTbl = parent::select('users','*', [], null, 1);
    
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

    public static function user_cookie($val) {
        if (!isset($val)) {
            return false;
        }

        parent::select('users', '*', ['id', $val], null, 1);
    }
}