<?php
/**
 * AuraDent Admin Mobile Bottom Navigation Dock (<= 768px)
 */
$adminPage = $adminPage ?? 'index';
?>
<!-- Mobile Bottom Navigation Dock -->
<nav class="admin-bottom-dock" aria-label="Admin Mobile Navigation">
  <a href="index.php" class="admin-dock-item <?= ($adminPage === 'index') ? 'active' : '' ?>">
    <span class="admin-dock-icon">📊</span>
    <span>Bookings</span>
  </a>
  <a href="doctors.php" class="admin-dock-item <?= ($adminPage === 'doctors') ? 'active' : '' ?>">
    <span class="admin-dock-icon">👨‍⚕️</span>
    <span>Doctors</span>
  </a>
  <a href="services.php" class="admin-dock-item <?= ($adminPage === 'services') ? 'active' : '' ?>">
    <span class="admin-dock-icon">🩺</span>
    <span>Services</span>
  </a>
  <a href="<?= getPublicSiteUrl() ?>" target="_blank" class="admin-dock-item">
    <span class="admin-dock-icon">🌐</span>
    <span>Site ↗</span>
  </a>
  <button type="button" class="admin-dock-item" id="adminDockMenuBtn" aria-label="Open full admin menu">
    <span class="admin-dock-icon">☰</span>
    <span>Menu</span>
  </button>
</nav>
