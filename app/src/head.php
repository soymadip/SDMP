<?php
// Include configuration with absolute path
require_once dirname(__DIR__) . '/config.php';
?>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $siteTitle . ' | '. $siteShortName?></title>

<!-- Favicon links -->
<link rel="icon" href="<?php echo $fvcnUrl ?>/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $fvcnUrl ?>/apple-touch-icon.png" />
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $fvcnUrl ?>/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $fvcnUrl ?>/favicon-16x16.png" />
<link rel="manifest" href="<?php echo $fvcnUrl ?>/site.webmanifest" />

<!-- Link to Bootstrap CSS, Icons & Font Awesome -->
<link rel="stylesheet" href="<?php echo $btpCss ?>" />
<link rel="stylesheet" href="<?php echo $btpIcn ?>" /> 
<link rel="stylesheet" href="<?php echo $faIcn ?>" /> 
<link rel="stylesheet" href="<?php echo $cstmCss ?>" />