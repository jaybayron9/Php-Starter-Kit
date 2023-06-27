<?php

return [
    '404' => view('auth', '404'),
    '' => view(),

    // AUTH
    'login' => view('auth', 'login'),
    'register' => view('auth', 'register'),
    'forgot_password' => view('auth', 'forgot.pass'),
];