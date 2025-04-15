<?php
// Include configuration
require_once '../config.php';
require_once $hostPath . '/src/utils/system-status.php';

$siteTitle = 'System Status';
$theme = $darkMode ? 'dark' : 'light';

// Auto-refresh settings - hardcoded to always refresh
$refreshInterval = 20;

// Get system status
$systemStatus = get_system_status();
$isHealthy = is_system_healthy();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <?php include_once $hostPath . '/src/head.php'; ?>
    <meta http-equiv="refresh" content="<?php echo $refreshInterval; ?>">
</head>
<body>
    <?php include_once $hostPath . '/src/navbar.php'; ?>

    <div class="container py-3">
        <!-- Status Header -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">
                            <i class="fas <?php echo $isHealthy ? 'fa-check-circle text-success' : 'fa-exclamation-triangle text-danger'; ?> me-2"></i>
                            <?php echo $isHealthy ? 'All Systems Operational' : 'System Issues Detected'; ?>
                        </h4>
                        <p class="text-muted mt-1 mb-0">
                            <?php echo $isHealthy 
                                ? 'All components of the portal are functioning correctly.' 
                                : 'Check issues below for more information.'; ?>
                        </p>
                    </div>
                    <div class="text-end">
                        <div class="d-flex flex-column align-items-end">
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i> 
                                    Last checked: <?php echo date('H:i:s'); ?>
                                    <span class="text-muted ms-1"><i class="fas fa-sync-alt fa-xs fa-spin"></i></span>
                                </small>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary" onclick="window.location.reload();">
                                    <i class="fas fa-sync-alt me-1"></i> Refresh Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Services Status -->
        <div class="row g-4">
            <?php foreach ($systemStatus as $service): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="<?php echo $service['icon']; ?> me-2 <?php echo $service['status'] ? 'text-success' : 'text-danger'; ?>"></i>
                            <?php echo $service['name']; ?>
                        </h5>
                        <span class="badge <?php echo $service['status'] ? 'bg-success' : 'bg-danger'; ?>">
                            <?php echo $service['message']; ?>
                        </span>
                    </div>
                    
                    <?php if (!empty($service['details'])): ?>
                    <div class="card-body py-2">
                        <table class="table table-hover mb-0">
                            <tbody>
                                <?php foreach ($service['details'] as $key => $value): ?>
                                <tr>
                                    <td class="text-secondary" width="40%"><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include_once $hostPath . '/src/footer.php'; ?>
</body>
</html>
