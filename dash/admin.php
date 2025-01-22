<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['username'])) {
  header("Location:". $hostUrl);
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php

      include '../config.php';

      $SiteTitle = 'Admin Dash';
      include '../src/head.php';
      ?>
  <title> Admin Dashboard | CSMP</title>

</head>

<body>
  <!-- import navbar -->
  <?php
        include '../src/navbar.php';
      ?>

  <!-- Page heading -->
  <div class="container">
    <h5 class="text-center display-4 my-3">
      <i class="fas fa-shield-alt"></i> Admin
    </h5>
    <hr class="my-4">
  </div>

  <!-- Main area -->
  <!-- import Bootstrap.js & custom js -->
  <script src="<?php echo $BtpJs ?>"></script>
  <script src="<?php echo $CstmJs ?>"></script>

  <script>
  // Call the function with the desired redirect URL
  SetPrevPage('<?php echo $hostUrl; ?>');
  </script>
</body>

</html>