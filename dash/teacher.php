<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php
      session_start();

      include dirname(__DIR__) . '/config.php';
      include dirname(__DIR__) . '/src/head.php';

      if (!isset($_SESSION['usertype'])) {
        header("Location: ". $hostUrl);
        echo $_SESSION['usertype'];
        exit();
      } else if (!in_array($_SESSION['usertype'], ['teacher', 'admins'])) {
        $dashUrl = $hostUrl . '/dash/' . $_SESSION['usertype'] . '.php';
        header("Location: ". $dashUrl);
        exit();
      }
  ?>
  <title>Teacher Dashboard | CSMP</title>
</head>

<body>
  <!-- import navbar -->
  <?php
        include '../src/navbar.php';
  ?>

  <!-- Page heading -->
  <div class="container mt-5 pt-3">
    <h2 class="text-center display-4 my-3">
      <i class="fas fa-user"></i> Teacher Dashboard
    </h2>
    <hr class="my-4">
  </div>

  <p><?php echo $_SESSION['usertype']; ?></p>
  <p><?php echo $hostUrl; ?></p>

  <!-- Main area -->
  <!-- import Bootstrap JS -->
  <script src="../src/css/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../src/js/backButtonHandler.js"></script>
  <script>
  // Call the function with the desired redirect URL
  handleBackButton('index.php');
  </script>
</body>

</html>