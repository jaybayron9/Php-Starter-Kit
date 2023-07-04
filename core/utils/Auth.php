<?php 

namespace Auth;
use DBConn\DBConn;

class Auth {
    public function __construct() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = hash('sha256', uniqid());
        }
    }

    public static function check_csrf($t) {
        if ($_SESSION['csrf_token'] !== $t) { 
            echo http_response_code(403);
            exit();
        }
    }

    public static function check_user_auth($s, $d, $c = '', $tb = 'users', $d2 = 'accts/user/unlock', $f = 'verified-email') {
        if (isset($_COOKIE[$c])) {
            $_SESSION[$s] = $_COOKIE[$c];
        }
        
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $c = DBConn::select($tb, '*', ['email_verify_token' => $token], null, 1);

        if ($c) {
            DBConn::update('users', [
                'email_verified_at' => date('Y-m-d H:i:s'),
            ], "id = '{$c[0]['id']}'");

            $_SESSION[$s] = $c[0]['id'];
            include view($d2, $f);
            exit();
        }

        if (!isset($_SESSION[$s])) {
            header("location: ?vs=$d");
        }
    }

    public static function check_email_verified($a, $t, $id) {
        $qry = DBConn::DBQuery("
            SELECT * FROM $t 
            WHERE 
                id = $id AND email_verified_at IS NULL OR email_verified_at = ''
            LIMIT 1"
        );

        if (count($qry) > 0) {
            include view("$a/navbars", 'topbar');
            include view("$a/lock", 'verify-email');
            include view('partials', 'footer');
            exit;
        }
        return false;
    }

    public static function check_login_auth($k, $d) {
        if (isset($_COOKIE[$k]) || isset($_SESSION[$k])) {
            header("location: ?vs=$d");
        }
    }

    public static function check_pass_reset_token($tb) {
        $t = isset($_GET['token']) ? $_GET['token'] : '';

        $c = DBConn::select($tb, '*', ['password_reset_token' => $t], null, 1);

        if (count($c) > 0) {
            return $c;
        }
            
        http_response_code(403);
        include view('errors', '403');
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

    public static function check_empty($d = []) {
        foreach ($d as $k => $v) {
            $v = trim($v);

            if (empty($v) && ($k == 'remember' || $k !== 'remember')) {
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

    public static function reCaptchaV3($post, $key) {
        $response = json_decode(file_get_contents(
                'https://www.google.com/recaptcha/api/siteverify', 
                false, 
                stream_context_create([ 
                    'http' => [
                        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method' => 'POST',
                        'content' => http_build_query([
                                'secret' => $key,
                                'response' => $post
                            ]),
                    ],
                ])
            )
        );

        if ($response->success) {
            return false;
        } 
        return true;
    }
}