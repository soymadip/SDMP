<?php
// Debug mode (enable extra mesages for debugging)
$DEBUG_MODE = filter_var(getenv('APP_DEBUG') ?: 'false', FILTER_VALIDATE_BOOLEAN);


// Database configuration
$db_host = getenv('DB_HOST') ?: 'mariadb';
$db_port = getenv('DB_PORT') ?: '3306';
$db_user = getenv('MARIADB_USER') ?: 'root';
$db_pass = getenv('MARIADB_PASSWORD') ?: '';
$db_name = getenv('MARIADB_DATABASE') ?: 'sdmp';

// Detect base URL automatically - works in container or local environment
$hostUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');

$hostPath = __DIR__;


// Master Users (Have access to all things)
$masterUserType = ['admin', 'master'];
$dashboardPages = ['master' => 'master'];


// Bootstrap CDN assets
$BtpCss = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
$BtpJs = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js';

// Custom css/js url/path
$CstmCss = $hostUrl . '/src/custom/custom.css';
$CstmJs = $hostUrl . '/src/custom/custom.js'; 

// Favicon Path
$FvcnPath = $hostUrl . '/src/images/favicon';


//Site configuration
$SiteName = 'Student Data Management Portal';
$SiteShortName = 'SDMP';
$SiteLogo = 'src/images/icon.png';

$SiteVer = 'v0.45';

// check if directly excluded or not.
if (basename($_SERVER['PHP_SELF']) == 'config.php') {
  $npTxt = 'This page is not meant to accessed directly.';
  include_once 'src/no-permission.php';
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Enable error reporting
if ($DEBUG_MODE) {
  $_SESSION['DEBUG_MODE'] = true;
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}

