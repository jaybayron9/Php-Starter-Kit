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
];
