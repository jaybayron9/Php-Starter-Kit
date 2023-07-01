<?php 

namespace Auth;
use DBConn\DBConn;

class Auth {
    public function __construct() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = hash('sha256', uniqid());
        }
    }

    public static function check_csrf($token) {
        if ($_SESSION['csrf_token'] !== $token) { 
            echo http_response_code(403);
            exit();
        }
    }

    public static function check_user_auth($session, $dir1, $cookie = '') {
        if (isset($_COOKIE[$cookie])) {
            $_SESSION[$session] = $_COOKIE[$cookie];
        }
        
        if (!isset($_SESSION[$session])) {
            header("location: ?vs=$dir1");
        }
    }

    public static function check_login_auth($key, $dir) {
        if (isset($_COOKIE[$key]) || isset($_SESSION[$key])) {
            header("location: ?vs=$dir");
        }
    }

    public static function check_pass_reset_token($table) {
        $token = isset($_GET['token']) ? $_GET['token'] : '';

        $client = DBConn::select($table, '*', ['password_reset_token' => $token], null, 1);

        if (count($client) > 0) {
            return $client;
        }
            
        http_response_code(403);
        include view('auth', '403');
        exit;
    }

    public static function sign_out() {
        session_unset();
        session_destroy();

        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        exit;
    }    

    public static function check_empty($data = []) {
        foreach ($data as $key => $value) {
            $value = trim($value);

            if (empty($value) && ($key == 'remember' || $key !== 'remember')) {
                return true;
            }
        }
        return false;
    } 

    public static function check_email($v) {
        return !filter_var($v['email'], FILTER_VALIDATE_EMAIL);
    }    

    public static function check_similar_email($t, $v) {
        $c = DBConn::select($t, '*', ['email' => $v], null, 1);

        if (count($c) > 0) {
            return true;
        }
        return false;
    }

    public static function confirm_password($n, $c) {
        if ($n !== $c) {
            return true;
        }
        return false;
    }

    public static function pass_length($v, $l = 0) {
        return strlen($v) > $l ? false : true;
    }
}