<?php 

date_default_timezone_set("Asia/Manila");
session_start();

require_once 'core/functions.php';
require_once core('Database');
require_once core('DBConn');

foreach (glob('core/controller/*.php') as $file) {
    require_once $file;
}

require_once core('ajax.req');

if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)) {
    include_once(view('partial', 'header'));
    include_once(getURL($GET));
    include_once(view('partial', 'footer'));
} else {
    include_once(view('partial', 'header'));
    include_once(getURL($GET));
    include_once(view('partial', 'footer'));
}