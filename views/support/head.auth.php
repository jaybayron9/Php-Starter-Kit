<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'support_id', '_sup'
);

$admin_info = DBConn::select('supports', '*', [
        'id' => $_SESSION['support_id']
    ], null, 1);