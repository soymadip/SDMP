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

    if (!isset($npTxt)) {
    $nptxt = 'You do not have enough Privilage to see this page.';
    } else {
    $nptxt = $npTxt;
    }
  ?>
</head>

<body>
  <!-- import navbar -->
  <?php
      include_once dirname(__DIR__) . '/src/navbar.php';
  ?>
  <!-- Main area -->
  <div class="container d-flex justify-content-center align-items-center div-index">
    <div class="text-center border border-2 border-danger rounded-3 p-4 abd">
      <i class="fas fa-times-circle fs-1 text-danger"></i>
      <h3 class="mrnwthr text-danger mb-2">
        No Permission!
      </h3>
      <p class="small text-warning roboto-font mt-3">
        <?php echo $nptxt ?>
        <?php  if ($DEBUG_MODE) { ?>
      <div class="text-start small text-muted">
        <br>
        <?php echo 'Cstm Cs: '.$CstmCss ?><br>
        <?php echo 'Cstm js: '.$CstmJs ?><br>
        <?php echo 'Btstrp Js: '.$BtpJs ?><br>
        <?php echo 'Btstrp Js: '.$BtpCss ?><br>
      </div>
      <?php } ?>

      </p>
    </div>
  </div>


  <!-- import Bootstrap JS -->
  <script src="<?php echo $BtpJs ?>"></script>
  <script src="<?php echo $CstmJs ?>"></script>

</body>

</html>