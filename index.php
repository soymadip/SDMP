<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

      $SiteTitle = 'CSMP';

      include_once 'src/config.php';
      include_once 'src/head.php';
  ?>
</head>

<body>
  <!-- import navbar -->
  <?php
      include_once 'src/navbar.php';
  ?>
  <!-- Main area -->
  <div class="container d-flex align-items-center  div-index">
    <div class="row log align-items-center py-3 px-4 border border-2 border-danger rounded-3 mx-auto"
      style="max-width: 800px;">
      <div class="col-12 col-md-6 pe-md-5">
        <img class="d-block img-fluid text-muted" src="<?php echo $SiteLogo ?>" alt="<?php echo $SiteName ?> logo" />
        <div class="text-center mt-0">
          <h4 class="mrnwthr serif"><?php echo $SiteName; ?></h4>
        </div>
      </div>
      <div class="col-12 col-md-6 ps-md-5">
        <?php if (!isset($_SESSION['username'])) { ?>
        <form class="needs-validation" action="src/auth.php" method="POST" id="authForm">
          <div class="text-center mb-4 pb-1">
            <h1 class="fw-bold">LOGIN</h1>
            <p class="small text-muted">
              Please login with your credentials<br>to enter site
            </p>
          </div>
          <div class="mb-3 mt-1">
            <label class="form-label">
              <i class="fas fa-user"></i> Username
            </label>
            <input required name="username" id="username" type="text" class="form-control"
              placeholder="your username" />
            <div class="invalid-feedback">
              Please provide a valid username.
            </div>
          </div>
          <div class="mb-5">
            <label class="form-label">
              <i class="fas fa-lock"></i> Password
            </label>
            <div class="input-group">
              <input required name="password" type="password" class="form-control" id="password"
                placeholder="your password" />
              <span class="input-group-text" id="togglePassword">
                <i class="fas fa-eye"></i>
              </span>
            </div>
            <div class="invalid-feedback">
              Please provide a valid password.
            </div>
            <div class="text-end ps-1 small-icon">
              <a href="#" class="small text-muted"
                onclick="document.getElementById('forgotPasswordForm').submit();">Forgot Password?</a>
            </div>
          </div>
          <div class="d-grid">
            <button type="submit" name="action" value="login" class="btn btn-success" title="Log in your account.">
              Log in
            </button>
          </div>
        </form>
        <form id="forgotPasswordForm" action="src/auth.php" method="POST" class="hidden">
          <input type="hidden" name="action" value="fgtpass">
        </form>
        <?php } else {?>
        <div class="text-center mb-4 pb-1">
          <h1 class="fw-bold">WELCOME</h1>
          <p class="small text-muted">
            You are already logged in
          </p>
          <i class="fas fa-user me-1"></i> User Name: <?php echo $_SESSION['username']; ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- import Bootstrap.js & custom js -->
  <script src="<?php echo $BtpJs ?>"></script>
  <script src="<?php echo $CstmJs ?>"></script>

</body>

</html>