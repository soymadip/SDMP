<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $SiteTitle = 'Admin Dash';

    include_once dirname(__DIR__) . '/src/check-permission.php';
    include_once dirname(__DIR__) . '/config.php';
    include_once dirname(__DIR__) . '/src/head.php';

  ?>
</head>

<body>
  <!-- import navbar -->
  <?php
    include_once '../src/navbar.php';
  ?>

  <!-- Page heading -->
  <div class="container">
    <h5 class="text-center display-4 my-3">
      <i class="fas fa-shield-alt"></i> Admin
    </h5>
    <p><?php echo $dashUrl; ?></p>
    <hr class="my-4" />
  </div>

  <!--     Main area -->

  <!-- import Bootstrap.js & custom js -->
  <script src="<?php echo $BtpJs ?>"></script>
  <script src="<?php echo $CstmJs ?>"></script>

  <script>
  SetPrevPage("<?php echo $hostUrl; ?>");
  </script>
</body>

</html>