<?php 
use DBConn\DBConn;
use Auth\Auth;

$conn = new DBConn();

Auth::check_user_auth(
    'admin_id', '_admin'
);

$admin_info = DBConn::select('admins', '*', [
        'id' => $_SESSION['admin_id']
    ], null, 1);