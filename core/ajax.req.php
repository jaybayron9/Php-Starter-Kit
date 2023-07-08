<?php 

use Auth\Auth;
use Data\Data;
use Admin\Admin;
use Client\User; 
use Support\Support;

$request = !isset($_GET['rq']) ? '' : strtolower($_GET['rq']);

$response = [
    // Admin Authorization
    'admin_sign_in'            => ['obj' => new Admin(), 'method' => 'sign_in'],
    'admin_send_pass_req'      => ['obj' => new Admin(), 'method' => 'pass_request'],
    'admin_reset_pass'         => ['obj' => new Admin(), 'method' => 'reset_pass'],
    // Admin Settings
    'admin_update_profile'     => ['obj' => new Admin(), 'method' => 'update_profile'],
    'admin_update_password'    => ['obj' => new Admin(), 'method' => 'update_password'],
    // Control Supports
    'show_support'             => ['obj' => new Data(), 'method' => 'show_support'],
    'update_support'           => ['obj' => new Data(), 'method' => 'update_support'],
    'delete_support_acct'      => ['obj' => new Data(), 'method' => 'delete_support'],
    'add_support'              => ['obj' => new Data(), 'method' => 'add_support'],
    'delete_supports'          => ['obj' => new Data(), 'method' => 'delete_supports'],
    // Control Users
    'show_user'             => ['obj' => new Data(), 'method' => 'show_user'],
    'update_user'           => ['obj' => new Data(), 'method' => 'update_user'],
    'delete_user_acct'      => ['obj' => new Data(), 'method' => 'delete_user'],
    'add_user'              => ['obj' => new Data(), 'method' => 'add_user'],
    'delete_users'          => ['obj' => new Data(), 'method' => 'delete_users'],

    // Support Authorization
    'sup_sign_in'              => ['obj' => new Support(), 'method' => 'sign_in'],
    'sup_send_pass_req'        => ['obj' => new Support(), 'method' => 'pass_request'],
    'sup_reset_pass'           => ['obj' => new Support(), 'method' => 'reset_pass'],
    // Support Settings
    'sup_update_profile'       => ['obj' => new Support(), 'method' => 'update_profile'],
    'sup_update_password'      => ['obj' => new Support(), 'method' => 'update_password'],
    
    // Admin|Support Sign out function
    'sign_out'                 => ['obj' => new Auth(), 'method' => 'sign_out'],

    // User Authorization
    'user_sign_in'               => ['obj' => new User(), 'method' => 'sign_in'],
    'user_register'              => ['obj' => new User(), 'method' => 'sign_up'],
    'user_send_passreq'          => ['obj' => new User(), 'method' => 'pass_request'],
    'user_reset_password'        => ['obj' => new User(), 'method' => 'reset_password'],
    'user_sign_out'              => ['obj' => new User(), 'method' => 'sign_out'],
    'user_similar_email'         => ['obj' => new User(), 'method' => 'similar_email'],
    'resend_verification_email'  => ['obj' => new User(), 'method' => 'send_verification_email'],
    // User Settings
    'user_update_profile'        => ['obj' => new User(), 'method' => 'update_profile'],
    'user_update_password'       => ['obj' => new User(), 'method' => 'update_password'],
    'user_delete_account'        => ['obj' => new User(), 'method' => 'delete_account'], 

    // Unset Alert session
    'unset_alert_session' => ['obj' => new Data(), 'method' => 'unset_alert'],
];

HTTPR($request, $response);