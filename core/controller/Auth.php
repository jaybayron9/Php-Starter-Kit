<?php 

class Auth extends DBConn {
    public function __construct() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = uniqid();
        }
    }

    public function login() {
        foreach ($_POST as $key => $value) {
            $key = trim($value);

            if (empty($key)) {
                return parent::alert('', 'Please enter a email address and password.');
            }

            
        }
    }
}