<?php
// Debug mode (enable extra mesages for debugging)
$DEBUG_MODE = true;


// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'SDMP';


// $hostUrl = 'http://localhost/sdmp';
$hostUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/sdmp';

$hostPath = dirname(__DIR__) . '/sdmp';


// Master Users (Have access to all things)
$masterUserType = ['admin', 'master'];


// Bootstrap url/path
$BtpCss = $hostUrl . '/src/bootstrap/css/bootstrap.min.css';
$BtpJs = $hostUrl . '/src/bootstrap/js/bootstrap.bundle.min.js'; 

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

?>



<!-- env setup -->

<?php 
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

?>
