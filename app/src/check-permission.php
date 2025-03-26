<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (basename($_SERVER['PHP_SELF']) != 'config.php') {
    require_once dirname(__DIR__) . '/config.php';
}


if (isset($allowedUserTypes) && !empty($allowedUserTypes)) {
    $totalAllowedUserTypes = array_merge($masterUserType, $allowedUserTypes);
} else {
    $totalAllowedUserTypes = $masterUserType;
}

if (in_array('all', $totalAllowedUserTypes)) {
    // Do nothing
} elseif (!isset($_SESSION['usertype'])) {
    header("Location: " . $hostUrl);
    exit();

} elseif (!in_array($_SESSION['usertype'], $totalAllowedUserTypes)) {

    $dashUrl = $hostUrl . '/dash/' . $_SESSION['usertype'] . '.php';

    require_once dirname(__DIR__) . '/src/no-permission.php';

    exit();
}
?>