<?php
/**
 * AuraDent Admin Sidebar Navigation Component
 * Supports desktop fixed sidebar and mobile off-canvas drawer
 */
$adminPage = $adminPage ?? 'index';
?>
<!-- Mobile Sidebar Backdrop Overlay -->
<div class="admin-sidebar-backdrop" id="adminSidebarBackdrop"></div>

<!-- Sidebar / Drawer -->
<aside class="admin-sidebar" id="adminSidebar">
  <div class="admin-sidebar-header">
    <div style="display: flex; align-items: center; gap: 0.75rem;">
      <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #080c14, #1e293b); border: 1px solid rgba(197, 160, 89, 0.4); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--color-gold);">
        💎
      </div>
      <span>Aura Atelier Admin</span>
    </div>
    <button type="button" class="admin-sidebar-close" id="adminSidebarClose" aria-label="Close menu">&times;</button>
  </div>

  <div class="admin-sidebar-user-compact">
    <div class="admin-avatar" style="width: 38px; height: 38px; font-size: 0.85rem; flex-shrink: 0;">AD</div>
    <div style="overflow: hidden;">
      <div style="font-weight: 700; font-size: 0.88rem; color: #ffffff; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= htmlspecialchars($_SESSION['admin_full_name'] ?? 'Clinic Admin') ?></div>
      <div style="font-size: 0.75rem; color: #94a3b8;">Operations Superadmin</div>
    </div>
  </div>

  <ul class="admin-sidebar-menu">
    <li class="admin-nav-item <?= ($adminPage === 'index') ? 'active' : '' ?>">
      <a href="index.php">
        <span>📊</span>
        <span>Appointments</span>
      </a>
    </li>
    <li class="admin-nav-item <?= ($adminPage === 'doctors') ? 'active' : '' ?>">
      <a href="doctors.php">
        <span>👨‍⚕️</span>
        <span>Doctors &amp; Staff</span>
      </a>
    </li>
    <li class="admin-nav-item <?= ($adminPage === 'services') ? 'active' : '' ?>">
      <a href="services.php">
        <span>🩺</span>
        <span>Services &amp; Fees</span>
      </a>
    </li>
    <li class="admin-nav-item">
      <a href="<?= getPublicSiteUrl() ?>" target="_blank">
        <span>🌐</span>
        <span>View Patient Site ↗</span>
      </a>
    </li>
  </ul>

  <div class="admin-sidebar-footer">
    <a href="logout.php" style="color: #f43f5e; text-decoration: none; font-size: 0.9rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
      <span>🚪</span>
      <span>Sign Out</span>
    </a>
  </div>
</aside>
