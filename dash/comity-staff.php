<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php
        include '../cofig.php';
        include '../src/head.php';
      ?>
  <title>Commity Dashboard | CSMP</title>
</head>

<body>
  <!-- import navbar -->
  <?php
        include '../src/navbar.php';
      ?>

  <!-- Page heading -->
  <div class="container mt-5 pt-3">
    <h2 class="text-center display-4 my-3">
      <i class="fas fa-user"></i> Comitty Dashboard
    </h2>
    <hr class="my-4">
  </div>


  <!-- Main area -->
  <!-- import Bootstrap JS -->
  <script src="../src/css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>