<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $SiteTitle = 'No Permission!';

    include_once dirname(__DIR__) . '/config.php';
    include_once dirname(__DIR__) . '/src/head.php';

    $nptxt = $npTxt ?? 'You do not have enough privilege to see this page.';
  ?>
</head>

<body>
  <?php include_once dirname(__DIR__) . '/src/navbar.php'; ?>

  <div class="container d-flex justify-content-center align-items-center div-index">
    <div class="text-center border border-2 border-danger rounded-3 p-4 abd">
      <i class="fas fa-times-circle fs-1 text-danger"></i>
      <h3 class="mrnwthr text-danger mb-2">No Permission!</h3>
      <p class="small text-warning roboto-font mt-3"><?php echo $nptxt; ?></p>
    </div>
  </div>

  <script src="<?php echo $BtpJs; ?>"></script>
  <script src="<?php echo $CstmJs; ?>"></script>
</body>

</html>
