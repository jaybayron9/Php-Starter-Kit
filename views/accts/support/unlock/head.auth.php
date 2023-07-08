<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'support_id', '_sup'
); 
Auth::check_user_access(
    'supports', $_SESSION['support_id']
);

$support_info = DBConn::select('supports', '*', [
        'id' => $_SESSION['support_id']
    ], null, 1);