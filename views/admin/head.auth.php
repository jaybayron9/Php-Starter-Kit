<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    $_SESSION['admin_id'], '?vs=_admin'
);

$admin_info = DBConn::select('admins', '*', [
        'id' => $_SESSION['admin_id']
    ], null, 1);