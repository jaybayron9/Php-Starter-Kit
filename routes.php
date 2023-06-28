<?php

return [
    '404' => view('auth', '404'),
    '' => view(),
    // Admin Authorization
    '$admin.lock' => view('admin', 'login'),
    '$admin.unlock' => view('admin'),

    // Client Authorization
    'login' => view('auth', 'login'),
    'register' => view('auth', 'register'),
    'forgot_password' => view('auth', 'forgot.pass'),
];