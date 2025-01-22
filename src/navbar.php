<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include dirname(__DIR__) . '/config.php';

if (isset($_SESSION['username'])) {
  $dashUrl = $hostUrl . '/dash/' . $_SESSION['usertype'] . '.php';
} else {
  $dashUrl = $hostUrl . '/dash/admin.php';
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="<?php echo $hostUrl ?>">
      <img src="<?php echo $hostUrl.'/'.$SiteLogo ?>" alt="Logo" width="37" class="d-inline-block align-middle" />
      <span class="mrnwthr fw-bold ms-2">
        <?php echo $SiteShortName; ?> <span class="text-muted roboto-font">(<?php echo $SiteVer; ?>)
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center justify-content-lg-end text-center"
      id="navbarNavAltMarkup">
      <div class="navbar-nav align-middle">

        <a class="nav-link" aria-current="page" href="<?php echo $hostUrl ?>">
          <i class="fas fa-home small-icon"></i>
          Home
        </a>
        <a class="nav-link" aria-current="page" href="<?php echo $dashUrl ?>">
          <i class="fas fa-solid fa-gauge small-icon"></i>
          Dashboard
        </a>
        <a class="nav-link" href="#">
          <i class="fas fa-university small-icon"></i>
          Institute
        </a>
        <?php if (isset($_SESSION['username'])) { ?>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-user small-icon"></i>
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li class="dropdown-item disabled">
              <i class="fas fa-user-tag small-icon"></i>
              <?php echo $_SESSION['usertype']; ?>
            </li>
            <li class="dropdown-item disabled">
              <i class="fas fa-user small-icon"></i>
              <?php echo $hostUrl; ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="<?php echo $hostUrl ?>/src/auth.php" method="POST" class="d-inline">
                <input type="hidden" name="action" value="logout" />
                <button type="submit" class="dropdown-item text-danger">
                  <i class="fas fa-sign-out-alt small-icon"></i>
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
        <?php } else { ?>
        <a class="nav-link" href="<?php echo $hostUrl ?>/index.php">
          <i class="fas fa-sign-in-alt small-icon"></i>
          Login
        </a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>

<!-- Link Bootstrap & Custom JS -->
<script src="<?php echo $BtpJs ?>"></script>
<script src="<?php echo $CstmJs ?>"></script>