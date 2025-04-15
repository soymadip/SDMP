<?php
require_once dirname(__DIR__) . '/config.php';


// Determine active page for navigation highlighting
$currentPage = basename($_SERVER['PHP_SELF']);
$currentDir = dirname($_SERVER['PHP_SELF']);

// Check if we're in a subdirectory like /status
$isStatusPage = (strpos($currentDir, '/status') !== false) || ($currentPage === 'status.php') || ($currentPage === 'index.php' && strpos($currentDir, '/status') !== false);
$isDashboardPage = (strpos($currentDir, '/dash') !== false) || (strpos($currentPage, 'dash') !== false);
$isHomePage = ($currentPage === 'index.php' && $currentDir === '/' . basename($hostPath));
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm custom-navbar">
  <div class="container-fluid">
    <!-- Brand section -->
    <div class="d-flex align-items-center">
      <img src="<?php echo $hostUrl.'/'.$siteLogo ?>" alt="Logo" width="34" class="d-inline-block align-middle me-2" />
      <a class="navbar-brand" href="<?php echo $hostUrl ?>">
        <?php echo $siteShortName ?>
        <span class="text-muted nav-version">(<?php echo $siteVer ?>)<span>
      </a>
    </div>
    
    <!-- Toggler for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Navigation links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center text-lg-start">
        <li class="nav-item mx-1">
          <a class="nav-link <?php echo $isHomePage ? 'active' : ''; ?>" href="<?php echo $hostUrl; ?>">
            <i class="fas fa-home me-1"></i>Home
          </a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link <?php echo $isStatusPage ? 'active' : ''; ?>" href="<?php echo $hostUrl; ?>/status">
            <i class="fas fa-signal me-1"></i>Status
          </a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link <?php echo $isDashboardPage ? 'active' : ''; ?>" href="<?php echo $dashUrl; ?>">
            <i class="fas fa-gauge me-1"></i>Dashboard
          </a>
        </li>
        <!-- dropdown -->
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-1"></i>Login
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <button class="dropdown-item d-flex align-items-center" onclick="toggleTheme()">
                <span style="width: 20px; text-align: center;" class="me-2">
                  <i id="theme-icon" class="fas fa-sun"></i>
                </span>
                <span>Change Theme</span>
              </button>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>