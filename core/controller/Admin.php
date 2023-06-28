<?php 

namespace Admin;
use Auth\Auth;
use DBConn\DBConn;

class Admin extends DBConn {
    public function login() {
        Auth::check_csrf($_POST['csrf_token']);
        $error['field'] = Auth::check_empty($_POST) ? 'Please fill out the required fields' : null;
        $error['email'] = Auth::check_email($_POST) ? 'Invalid email address' : null;

        $msg = 'Incorrect username or password';
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

    public function create() {
        $hashedPassword = password_hash('password123', PASSWORD_BCRYPT);

        DBConn::insert('admins', [
            'name' => 'Admin One',
            'phone' => '123-456-7890',
            'email' => 'admin@example.com',
            'password' => $hashedPassword
        ]);
    }
}