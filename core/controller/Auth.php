<?php 

class Auth extends DBConn {
    public function __construct() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = uniqid();
        }
    }

    public function login() {
        foreach ($_POST as $key => $value) {
            $value = trim($value);

            if (empty($value)) {
                return parent::alert('error', 'Please enter an email address and password.');
            }

            if ($key === 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return parent::alert('error', 'Please enter a valid email address.');
                }
            }
        }

        return parent::alert('success', 'You\'re ready to login.');
    }
}