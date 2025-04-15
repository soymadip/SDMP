<?php
// Only show if enabled in config
if (isset($showDevNotice) && $showDevNotice): 
?>
<div class="dev-notice-float" title="Click for development information" data-bs-toggle="modal" data-bs-target="#devInfoModal">
    <i class="bi bi-code-slash"></i>
    <div class="text-container">
        <span class="dev-notice-text"><?php echo $devNoticeText ?? 'DEV'; ?></span>
        <span class="hint-text">Click for info</span>
    </div>
</div>

<!-- Development Info Modal -->
<div class="modal fade" id="devInfoModal" tabindex="-1" aria-labelledby="devInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="devInfoModalLabel">
          <i class="bi bi-gear-fill me-2"></i>Development Environment
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <i class="bi bi-tag-fill me-1 text-primary"></i>
          <strong>Version:</strong> <?php echo $siteVer; ?>
        </div>
        <div class="mb-3">
          <i class="bi bi-hdd-network me-1 text-secondary"></i>
          <strong>Host:</strong> <?php echo $host; ?>
        </div>
        <div class="mb-3">
          <i class="bi bi-arrow-repeat me-1 text-success"></i>
          <strong>Live Reload: </strong> <?php echo $enableLiveReload ? 'Enabled ('.$liveReloadInterval.'ms)' : 'Disabled'; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
