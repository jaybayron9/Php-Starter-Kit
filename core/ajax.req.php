<?php 

$request = !isset($_GET['rq']) ? '' : strtolower($_GET['rq']);

$response = [
    'create_database' => ['obj' => new Database(), 'method' => 'createDB'],
    // AUTH
    'login'             => ['obj' => new Auth(), 'method' => 'login'],
    'register'          => ['obj' => new Auth(), 'method' => 'register'],
    'forgot_password'   => ['obj' => new Auth(), 'method' => 'forgotPassword'],
];

HTTPR($request, $response);