<?php
	$masterOnly = true;
	$SiteTitle = 'Master Dashboard';
	require_once dirname(__DIR__) . '/config.php';
	include_once dirname(__DIR__) . '/src/check-permission.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
	<?php include_once dirname(__DIR__) . '/src/head.php'; ?>
</head>

<body>
	<?php include_once '../src/navbar.php'; ?>

	<main class="container py-4">
		<h1 class="display-4 text-center">Master Dashboard</h1>
		<p class="text-center text-muted">System-level administration</p>

		<div class="row g-3 mt-3">
			<div class="col-12 col-md-6">
				<div class="border rounded-3 p-4 h-100">
					<h2 class="h4">Administration</h2>
					<p>Manage the application through the administrator dashboard.</p>
					<a class="btn btn-success" href="<?php echo $hostUrl; ?>/dash/admin.php">Open admin dashboard</a>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="border rounded-3 p-4 h-100">
					<h2 class="h4">Master access</h2>
					<p class="mb-1">Signed in as:</p>
					<strong><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></strong>
					<p class="mt-3 mb-0 text-muted">Master-only controls can be added here without exposing them to administrators.</p>
				</div>
			</div>
		</div>
	</main>

	<script src="<?php echo $BtpJs; ?>"></script>
	<script src="<?php echo $CstmJs; ?>"></script>
</body>

</html>
