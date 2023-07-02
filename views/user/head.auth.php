<?php 
use Auth\Auth;

Auth::check_user_auth(
    'user_id', 'login', 'user_id'
);

Auth::check_email_verified('user','users', $_SESSION['user_id']);
