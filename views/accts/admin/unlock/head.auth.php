<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'admin_id', '_admin'
);

$conn = new DBConn();
$admin_info = DBConn::select('admins', '*', [
        'id' => $_SESSION['admin_id']
    ], null, 1);