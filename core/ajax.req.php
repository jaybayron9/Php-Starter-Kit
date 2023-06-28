<?php 

use Auth\Auth;
use Admin\Admin;

$request = !isset($_GET['rq']) ? '' : strtolower($_GET['rq']);

$response = [
    // Admin Authorization
    'admin_login' => ['obj' => new Admin(), 'method' => 'login'],
    'create' => ['obj' => new Admin(), 'method' => 'create'],
    // Client Authorization
    'login'             => ['obj' => new Auth(), 'method' => 'login'],
    'register'          => ['obj' => new Auth(), 'method' => 'register'],
    'forgot_password'   => ['obj' => new Auth(), 'method' => 'forgotPassword'],
];

HTTPR($request, $response);