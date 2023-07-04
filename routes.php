<?php

return [
    // HTTP Error Response Page
    '403'    => view('errors', '403'),
    '404'    => view('errors', '404'),


    // Guest Home Page
    ''      => view(), 

    // Admin Authorization
    '_admin'                   => view('accts/admin/lock', 'login'),
    '_admin/forgot_password'   => view('accts/admin/lock', 'forgot-pass'),
    '_admin/reset_password'    => view('accts/admin/lock', 'reset-pass'),
    '_admin/'                  => view('accts/admin/unlock'),
    '_admin/profile'           => view('accts/admin/unlock/settings', 'profile'),

    '_sup'                     => view('accts/support/lock', 'login'),
    '_sup/forgot_password'     => view('accts/support/lock', 'forgot-pass'),
    '_sup/reset_password'      => view('accts/support/lock', 'reset-pass'),
    '_sup/'                    => view('accts/support/unlock'),

    // Users Authorization
    'login'                    => view('accts/user/lock', 'login'),
    'register'                 => view('accts/user/lock', 'register'),
    'forgot_password'          => view('accts/user/lock', 'forgot-pass'),
    'reset_password'           => view('accts/user/lock', 'reset-pass'),
    '_/'                       => view('accts/user/unlock'),
];