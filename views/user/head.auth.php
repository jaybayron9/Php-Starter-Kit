<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    $_SESSION['user_id'],
    '?vs=login'
);

$user_info = DBConn::select('users', '*', [
        'id' => $_SESSION['user_id']
    ], null, 1);