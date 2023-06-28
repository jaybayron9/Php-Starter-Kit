<?php 

namespace Auth;
use DBConn\DBConn;

class Auth extends DBConn {
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

    public static function check_user_auth($sess, $dir) {
        if (!isset($sess)) {
            header("location: $dir");
        }
    }

    public function logout($sess) {
        foreach ($sess as $data) {
            unset($data);
        }
    }

    public static function check_empty($data = []) {
        foreach ($data as $key => $value) {
            $value = trim($value);

            if (empty($value)) {
                return true;
            }
        }
        return false;
    } 

    public static function check_email($data) {
        return !filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    }    
}