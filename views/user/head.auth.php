<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'user_id', 'login', 'user_id'
);

$user_info = DBConn::select('users', '*', [
        'id' => $_SESSION['user_id']
    ], null, 1);