<?php

return [
    // HTTP Error Response Page
    '403'    => view('errors', '403'),
    '404'    => view('errors', '404'),


    // Guest Home Page
    ''      => view(), 

    // Admin Authorization
    '_admin'                   => view('accts/admin', 'login'),
    '_admin/forgot_password'   => view('accts/admin', 'forgot-pass'),
    '_admin/reset_password'    => view('accts/admin', 'reset-pass'),
    '_admin/'                  => view('accts/admin/unlock'),
    '_admin/profile'           => view('accts/admin/unlock/privacy', 'profile'),

    '_sup'                     => view('accts/support', 'login'),
    '_sup/forgot_password'     => view('accts/support', 'forgot-pass'),
    '_sup/reset_password'      => view('accts/support', 'reset-pass'),
    '_sup/'                    => view('accts/support/unlock'),

    // Users Authorization
    'login'                    => view('accts/user', 'login'),
    'register'                 => view('accts/user', 'register'),
    'forgot_password'          => view('accts/user', 'forgot-pass'),
    'reset_password'           => view('accts/user', 'reset-pass'),
    '_/'                       => view('accts/user/unlock'),
];