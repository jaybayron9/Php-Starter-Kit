<?php

return [
    '403' => view('auth', '403'),
    '404' => view('auth', '404'),
    '' => view(), // Guest Home Page

    // Admin Authorization
    '_admin' => view('admin', 'login'),
    '_admin/forgot_password' => view('admin', 'forgot-pass'),
    '_admin/reset_password' => view('admin', 'reset-pass'),
    '_admin/' => view('admin/unlock'),
    '_admin/profile' => view('admin/unlock/privacy', 'profile'),

    '_sup' => view('support', 'login'),
    '_sup/forgot_password' => view('support', 'forgot-pass'),
    '_sup/reset_password' => view('support', 'reset-pass'),
    '_sup/' => view('support/unlock'),

    // Users Authorization
    'login' => view('user', 'login'),
    'register' => view('user', 'register'),
    'forgot_password' => view('user', 'forgot-pass'),
    'reset_password' => view('user', 'reset-pass'),
    '_/' => view('user/unlock'),
];