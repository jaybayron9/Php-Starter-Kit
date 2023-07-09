<?php 
use Auth\Auth; 

Auth::check_user_auth(
    'user_id', 'login', 'user_id'
); 
Auth::check_email_verified(
    'user','users', $_SESSION['user_id']
); 
if (Auth::check_user_access(
    'users', $_SESSION['user_id']
)) {
    unset($_SESSION['user_id']);
    $_SESSION['access_denied'] = true;
    header("Location: {$_SERVER['HTTP_REFERER']}");
}