<?php
// Import Bootstrap JS
echo '<script src="' . $btpJs . '"></script>';

// Import custom JS
echo '<script src="' . $cstmJs . '"></script>';

// Include dev notice if enabled
if (isset($showDevNotice) && $showDevNotice) {
    include_once dirname(__FILE__) . '/utils/dev-notice.php';
}
?>