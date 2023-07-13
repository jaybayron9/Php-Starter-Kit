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

// Clients account
foreach (glob('core/controller/accts/*.php') as $acct) {
    require_once $acct;
}

// Clients data
foreach (glob('core/controller/clients/*.php') as $data) {
    require_once $data;
}

// Http Routes
foreach (glob('core/HttpRoutes/*.php') as $route) {
    require_once $route;
}

// Page Contents
include_once(view('partials', 'header'));
include_once(getURL($GET));
include_once(view('partials', 'footer'));  