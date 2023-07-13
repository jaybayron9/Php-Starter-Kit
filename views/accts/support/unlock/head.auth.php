<?php 
use DBConn\DBConn;
use Auth\Auth;

Auth::check_user_auth(
    'support_id', '_sup'
);  
if (Auth::check_user_access(
    'supports', $_SESSION['support_id']
)) {
    unset($_SESSION['support_id']);
    $_SESSION['access_denied'] = true;
    header('refresh: 0');
} 
$conn = new DBConn();
$support_info = DBConn::select('supports', '*', [
        'id' => $_SESSION['support_id']
    ], null, 1);