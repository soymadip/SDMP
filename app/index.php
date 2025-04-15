<?php
// Include configuration
require_once 'config.php';
$siteTitle = 'Home';

$theme = $darkMode ? 'dark' : 'light';
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <?php include_once $hostPath . '/src/head.php'; ?>
</head>
<body>
    <?php include_once $hostPath . '/src/navbar.php'; ?>

    <p><?php echo $siteName ?></p>

    <?php include_once $hostPath . '/src/footer.php';?>
</body>
</html>