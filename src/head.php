<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php 
  include dirname(__DIR__) . '/config.php';
?>

<!-- Favicon links -->
<link rel="icon" href="<?php echo $FvcnPath ?>/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $FvcnPath ?>/apple-touch-icon.png" />
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $FvcnPath ?>/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $FvcnPath ?>/favicon-16x16.png" />
<link rel="manifest" href="<?php echo $FvcnPath ?>/site.webmanifest" />

<!-- Link to Bootstrap & custom CSS -->
<link rel="stylesheet" href="<?php echo $BtpCss ?>" />
<link rel="stylesheet" href="<?php echo $CstmCss ?>" />

<!-- Link Bootstrap & Custom JS -->
<script src="<?php echo $BtpJs ?>"></script>
<script src="<?php echo $CstmJs ?>"></script>

<title><?php echo $SiteTitle . ' | '. $SiteShortName?></title>