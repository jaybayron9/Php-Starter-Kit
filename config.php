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
    'oracle'=> [
        'localhost' => '',
        'username' => '',
        'password' => '',
        'port' => 0,
        'database' => '',
    ],
    'smtp' => [
        'from_name' => 'Administrator', 
        'username' => 'tweb65776@gmail.com',
        'password' => 'bgpekesrwlvgrljx',
    ],
    'sms' => [
        'API_KEY' => 'as9w12nj213jas98h8c6x67m21n',
        'sender' => 'Administrator',
        'number' => '+639123456780',
    ],
    'links' => [
        'base_url' => 'http://localhost/GitHub/PHPMysqlTailwindJquery'
    ],
    'recaptchav3' => [
        'SITE_KEY' => '6LdIqu0mAAAAAHKhiSg-EnuA7O3-9EuayBVbUxMv',
        'SECRET_KEY' => '6LdIqu0mAAAAAEZ9DKBe01pPpWivJQ-TLBcW0lBa',
    ],
    'recaptchav2' => [
        'SITE_KEY' => '6LdX7-0mAAAAAE8rkS_NAzlHC-yUKQqTL4B0Cl46',
        'SECRET_KEY' => '6LdX7-0mAAAAAAAlCy5HbqQgj6Sz7Tgz3jjtRlqY',
    ],

];
