<?php

use Database\Database;

return [
    'mysql' => [
        'localhost' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => Database::get_database_name(),
    ],
    'postgresql' => [
        'localhost' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'cjce',
    ],
    'smtp' => [
        'from_name' => 'Administrator', 
        'username' => 'tweb65776@gmail.com',
        'password' => 'bgpekesrwlvgrljx',
    ],
    'links' => [
        'reset_password_url' => 'http://localhost/GitHub/PHPMysqlTailwindJquery/'
    ]
];
