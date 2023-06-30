<?php 

use Auth\Auth;
use Admin\Admin;
use Client\User;

$request = !isset($_GET['rq']) ? '' : strtolower($_GET['rq']);

$response = [
    // Admin Authorization
    'admin_signin' => ['obj' => new Admin(), 'method' => 'login'],
    'admin_send_passreq' => ['obj' => new Admin(), 'method' => 'pass_request'],

    // User Authorization
    'user_login'             => ['obj' => new User(), 'method' => 'login'],
    'register'          => ['obj' => new User(), 'method' => 'register'],
    'forgot_password'   => ['obj' => new User(), 'method' => 'forgotPassword'],
    'user_sign_out' => ['obj' => new User(), 'method' => 'sign_out'],

    // Auth
    'sign_out' => ['obj' => new Auth(), 'method' => 'sign_out'],

    'create' => ['obj' => new Admin(), 'method' => 'create'],
    'email_body' => ['obj' => new Emailer(), 'method' => 'temp_body'],
];

HTTPR($request, $response);