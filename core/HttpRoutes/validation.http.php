<?php    

use ControlValidation\ControlValidation;

$ValidReq = isset($_GET['validation']) ? strtolower($_GET['validation']) : '';  

$ValidResp = [  
    'only_letter' => ['obj' => new ControlValidation(), 'method' => 'only_letter'],
    'only_big_letters' => ['obj' => new ControlValidation(), 'method' => 'only_big_letters'],
    'only_small_letters' => ['obj' => new ControlValidation(), 'method' => 'only_small_letters'],
    'words_capitalize' => ['obj' => new ControlValidation(), 'method' => 'words_capitalize'],
    'password' => ['obj' => new ControlValidation(), 'method' => 'password'],
    'email' => ['obj' => new ControlValidation(), 'method' => 'email'],
    'only_number' => ['obj' => new ControlValidation(), 'method' => 'only_number'],
    'whole_number' => ['obj' => new ControlValidation(), 'method' => 'whole_number'],
    'negative_number' => ['obj' => new ControlValidation(), 'method' => 'is_negative_number'],
    'mobile_number_format' => ['obj' => new ControlValidation(), 'method' => 'mobile_number_format'],
    'decimal_number' => ['obj' => new ControlValidation(), 'method' => 'decimal_number'],
    'future_data' => ['obj' => new ControlValidation(), 'method' => 'future_data'],
    'past_date' => ['obj' => new ControlValidation(), 'method' => 'past_date'],
    'upload_image' => ['obj' => new ControlValidation(), 'method' => 'upload_image'],
    'upload_document' => ['obj' => new ControlValidation(), 'method' => 'upload_document'],
];

HTTPR($ValidReq, $ValidResp);