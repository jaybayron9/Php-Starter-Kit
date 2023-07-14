<?php    

use ControlValidation\ControlValidation;

$ValidReq = isset($_GET['validation']) ? strtolower($_GET['validation']) : '';  

$ValidResp = [  
    'only_letter' => ['obj' => new ControlValidation(), 'method' => 'only_letter'],
    'only_big_letters' => ['obj' => new ControlValidation(), 'method' => 'only_big_letters'],
    'only_small_letters' => ['obj' => new ControlValidation(), 'method' => 'only_small_letters'],
    'password' => ['obj' => new ControlValidation(), 'method' => 'password'],
    'email' => ['obj' => new ControlValidation(), 'method' => 'email'],
    'only_number' => ['obj' => new ControlValidation(), 'method' => 'only_number'],
    'whole_number' => ['obj' => new ControlValidation(), 'method' => 'whole_number'],
    'decimal_number' => ['obj' => new ControlValidation(), 'method' => 'decimal_number'],
];

HTTPR($ValidReq, $ValidResp);