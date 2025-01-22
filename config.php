<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// $hostUrl = 'http://localhost/csmp';
$hostUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/csmp';
$hostPath = dirname(__DIR__) . '/csmp';

// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'CSMP';

// Bootstrap url/path
$BtpCss = $hostUrl . '/src/bootstrap/css/bootstrap.min.css';
$BtpJs = $hostUrl . '/src/bootstrap/js/bootstrap.bundle.min.js'; 

// Custom css/js url/path
$CstmCss = $hostUrl . '/src/custom/custom.css';
$CstmJs = $hostUrl . '/src/custom/custom.js'; 

// Favicon Path
$FvcnPath = $hostUrl . '/src/images/favicon';

//Site configuration
$SiteName = 'CTS Student Management Portal';
$SiteShortName = 'CSMP';
$SiteLogo = 'src/images/cts-logo-com.png';

$SiteVer = 'v0.3';
?>