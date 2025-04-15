<?php

// Development settings: dev/prod
$environment = "dev";


//Site configuration
$siteName = 'Student Data Management Portal';
$siteShortName = 'SDMP';
$siteLogo = 'src/images/icon.png';
$siteVer = 'v0.45';
$darkMode = true;


// base URL & path
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$hostUrl = $protocol . $host;
$hostPath = dirname(__FILE__);



// Database configuration
$db_host = getenv('DB_HOST');
$db_user = getenv('POSTGRES_USER');
$db_pass = getenv('POSTGRES_PASSWORD');
$db_name = getenv('POSTGRES_DB');


// Bootstrap url/path
$btpCss = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
$btpIcn = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css';
$btpJs =  'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'; 
$faIcn = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css';
$faIcnJs = 'https://kit.fontawesome.com/6e694bfacd.js';


// Custom resources
$cstmCss = $hostUrl . '/src/custom/custom.css';
$cstmJs = $hostUrl . '/src/custom/custom.js';
$fvcnUrl = $hostUrl . '/src/images/favicon';


// Status page configuration
$statusPageRefreshInterval = 20;
$statusPageShowDetails = true;



//-------------------- INIT -----------------------

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Environment-specific settings
if ($environment === "dev") {
    // Development notice
    $showDevNotice = true;
    $devNoticeText = 'Dev Env';
} else {
    $showDevNotice = false;
}
?>
