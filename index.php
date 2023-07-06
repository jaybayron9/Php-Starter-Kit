<?php 

date_default_timezone_set("Asia/Manila");
session_start();

require_once 'core/functions.php';
require_once core('Database');
require_once core('DBConn');

// Utility Classes
foreach (glob('core/utils/*.php') as $utils) {
    require_once $utils;
}

// Clients Authentication
foreach (glob('core/controller/accts/*.php') as $control) {
    require_once $control;
}

// Clients Authentication
foreach (glob('core/controller/clients/*.php') as $control) {
    require_once $control;
}

// Page Content (ajax) Request
require_once core('ajax.req');

// Page Contents
include_once(view('partials', 'header'));
include_once(getURL($GET));
include_once(view('partials', 'footer'));