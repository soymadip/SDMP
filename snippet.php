<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php

    $allowedUserTypes = ['all']; // ask for user type in snippet
    $SiteTitle = 'Test'; // ask for title in snippet

    require_once 'config.php'; // ask for file path in snippet
    include_once $hostPath.'/src/check-permission.php';
    include_once $hostPath.'/src/head.php';
  ?>
</head>

<body>
  <!-- import navbar -->
  <?php
      include_once $hostPath.'/src/navbar.php';
    ?>
  <h3>Google</h3>

  <!-- Import Bootstrap & custom JS -->
  <script src="<?php echo $BtpJs ?>"></script>
  <script src="<?php echo $CstmJs ?>"></script>
</body>

</html>