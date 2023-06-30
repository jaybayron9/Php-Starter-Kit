<?php 

$url = 'http://localhost/GitHub/PHPMysqlTailwindJquery/?vs=_admin/reset_password#02c9265a60d41f3fa786b24e2c420b297ff432a9c6f4df545a6b65354140ccd5';

// Parse the URL
$parsedUrl = parse_url($url);

// Get the fragment component
$fragment = isset($parsedUrl['fragment']) ? $parsedUrl['fragment'] : '';

echo "Value after #: " . $fragment;
