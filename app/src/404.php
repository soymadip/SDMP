<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include configuration
require_once '../config.php';

$siteTitle = 'Page Not Found';
$theme = $darkMode ? 'dark' : 'light';

// Set proper HTTP status code
header("HTTP/1.0 404 Not Found");
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <?php include_once 'head.php'; ?>
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="error-container">
            <div class="error-code">404</div>
            <div class="error-message">Page Not Found</div>
            <p class="lead">The page you're looking for doesn't exist or has been moved.</p>
            <a href="<?php echo $hostUrl; ?>" class="btn btn-primary mt-3">Go to Homepage</a>
        </div>
    </div>
    <?php include_once $hostPath . '/src/footer.php';?>
</html>
