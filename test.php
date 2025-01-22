<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

  <?php
        include 'config.php';
      ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon links -->
  <link rel="icon" href="<?php echo $hostUrl ?>/src/images/favicon/favicon.ico" type="image/x-icon" />
  <link rel="manifest" href="<?php echo $hostUrl ?>/src/images/favicon/site.webmanifest" />

  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo $hostUrl ?>/src/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $hostUrl ?>/src/custom/custom.css" />
  <title>TEST | CSMP</title>
</head>

<body>
  <!-- import navbar -->
  <?php
        include 'src/navbar.php';
      ?>

  <!-- Main area -->
  <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis nisi sint commodi, cumque quasi magnam
    doloremque quos eveniet vitae vero itaque repudiandae quod tenetur unde accusantium fuga quo. Dicta, dolorum?</h3>

  <!-- import Bootstrap JS -->
  <script src="src/css/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>