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

    public static function check_user_auth($sess, $dir, $cookie = null) {
        if (isset($cookie)) {
            $_SESSION['user_id'] == $cookie;
        } else if (!isset($sess)) {
            header("location: $dir");
        }
    }

    public static function check_pass_reset_token($table) {
        $token = isset($_GET['token']) ? $_GET['token'] : '';

        $client = DBConn::select($table, '*', ['password_reset_token' => $token], null, 1);

        if (count($client) > 0) 
            return $client;
            
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

    public static function check_email($data) {
        return !filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    }    
}