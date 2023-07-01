<?php 

use Auth\Auth;
use Admin\Admin;
use Client\User;

$request = !isset($_GET['rq']) ? '' : strtolower($_GET['rq']);

$response = [
    // Admin Authorization
    'admin_signin' => ['obj' => new Admin(), 'method' => 'login'],
    'admin_send_passreq' => ['obj' => new Admin(), 'method' => 'pass_request'],
    'admin_reset_password' => ['obj' => new Admin(), 'method' => 'reset_password'],

    // User Authorization
    'user_login'             => ['obj' => new User(), 'method' => 'login'],
    'user_register'          => ['obj' => new User(), 'method' => 'register'],
    'user_send_passreq'   => ['obj' => new User(), 'method' => 'pass_request'],
    'user_reset_password' => ['obj' => new User(), 'method' => 'reset_password'],
    'user_sign_out' => ['obj' => new User(), 'method' => 'sign_out'],
    'user_similar_email' => ['obj' => new User(), 'method' => 'similar_email'],

    // Auth
    'sign_out' => ['obj' => new Auth(), 'method' => 'sign_out'],

    'create' => ['obj' => new Admin(), 'method' => 'create'],
    'email_body' => ['obj' => new Emailer(), 'method' => 'temp_body'],
];

HTTPR($request, $response);