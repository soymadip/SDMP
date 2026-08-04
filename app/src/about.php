<?php
  $SiteTitle = 'Institute';
  require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php require_once $hostPath . '/src/head.php'; ?>
</head>

<body>
  <?php include_once 'navbar.php'; ?>

  <main class="container py-5">
    <h1 class="display-4">Student Data Management Portal</h1>
    <p class="lead">A portal for managing student records and academic information.</p>
  </main>

  <script src="<?php echo $BtpJs; ?>"></script>
  <script src="<?php echo $CstmJs; ?>"></script>
</body>

</html>