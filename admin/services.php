<?php
/**
 * AuraDent Admin - Services & Fees Management
 */

require_once __DIR__ . '/../includes/functions.php';
requireAuth();

$pdo = getDBConnection();
$services = getAllServices();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Services & Fees | AuraDent Admin Portal</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🦷</text></svg>">
</head>
<body class="admin-body">

  <!-- Sidebar Component -->
  <?php 
  $adminPage = 'services';
  require_once __DIR__ . '/includes/sidebar.php'; 
  ?>

  <!-- Main Content -->
  <main class="admin-content-area">
    <header class="admin-topbar">
      <div class="admin-topbar-left">
        <button type="button" class="admin-hamburger" id="adminSidebarToggle" aria-label="Toggle navigation drawer">
          <span>☰</span>
        </button>
        <div class="admin-topbar-title">Dental Procedures &amp; Fees</div>
      </div>
      <div class="admin-topbar-right">
        <button type="button" class="btn btn-primary btn-sm" id="openAddServiceBtn">
          + Add Service
        </button>
      </div>
    </header>

    <div class="admin-body-content">
      
      <!-- Table Card -->
      <div class="data-table-card">
        <table class="admin-table">
          <thead>
            <tr>
              <th>Procedure Name</th>
              <th>Category</th>
              <th>Duration</th>
              <th>Starting Price</th>
              <th>Featured on Home?</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($services as $s): ?>
              <tr>
                <td data-label="Procedure">
                  <strong style="color: #0f172a;"><?= htmlspecialchars($s['name']) ?></strong>
                  <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.15rem;"><?= htmlspecialchars(mb_strimwidth($s['short_description'], 0, 80, '...')) ?></div>
                </td>
                <td data-label="Category">
                  <span style="font-size: 0.85rem; font-weight: 600; color: #0284c7;"><?= htmlspecialchars($s['category']) ?></span>
                </td>
                <td data-label="Duration">
                  <span><?= $s['duration_mins'] ?> mins</span>
                </td>
                <td data-label="Starting Price">
                  <strong style="color: #0d9488; font-size: 1.05rem;"><?= formatPrice($s['price_starting']) ?></strong>
                </td>
                <td data-label="Featured">
                  <?= ($s['is_featured'] == 1) ? '<span class="status-pill status-completed">YES</span>' : '<span class="status-pill status-pending">NO</span>' ?>
                </td>
                <td data-label="Actions">
                  <div class="action-btn-group">
                    <button type="button" class="btn btn-outline btn-sm edit-service-btn" data-service="<?= htmlspecialchars(json_encode($s), ENT_QUOTES, 'UTF-8') ?>" title="Edit Service">
                      ✏️ Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm delete-service-btn" data-id="<?= $s['id'] ?>" title="Delete Service">
                      🗑️
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </main>

  <!-- Add / Edit Service Modal -->
  <div class="admin-modal-overlay" id="serviceModal">
    <div class="admin-modal">
      <div class="admin-modal-header">
        <h3 style="font-size: 1.25rem; font-weight: 700; margin: 0;" id="serviceModalTitle">Add New Procedure</h3>
        <button type="button" id="serviceModalClose" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
      </div>

      <form id="serviceForm">
        <input type="hidden" name="id" id="srvId">
        <div class="admin-modal-body">
          <div class="form-group">
            <label class="form-label">Service / Procedure Name *</label>
            <input type="text" id="srvName" name="name" class="form-control" placeholder="e.g. Laser Gum Recontouring" required>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Category *</label>
              <select id="srvCategory" name="category" class="form-control" required>
                <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                <option value="Restorative & Implants">Restorative & Implants</option>
                <option value="Orthodontics">Orthodontics</option>
                <option value="Endodontics">Endodontics</option>
                <option value="Preventive & General">Preventive & General</option>
                <option value="Periodontics">Periodontics</option>
                <option value="Oral Surgery">Oral Surgery</option>
                <option value="Emergency Care">Emergency Care</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Starting Price ($ USD) *</label>
              <input type="number" id="srvPrice" name="price_starting" class="form-control" step="0.01" placeholder="450.00" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Average Duration (Minutes)</label>
              <input type="number" id="srvDuration" name="duration_mins" class="form-control" value="60" min="15" max="360">
            </div>
            <div class="form-group">
              <label class="form-label">Feature on Homepage?</label>
              <select id="srvFeatured" name="is_featured" class="form-control">
                <option value="1">Yes (Show on Homepage)</option>
                <option value="0">No (Services Catalog Only)</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Short Description (Cards & Previews) *</label>
            <textarea id="srvShortDesc" name="short_description" class="form-control" rows="2" placeholder="One or two sentences highlighting benefits..." required></textarea>
          </div>

          <div class="form-group">
            <label class="form-label">Full Clinical Description</label>
            <textarea id="srvFullDesc" name="full_description" class="form-control" rows="3" placeholder="Full treatment breakdown..."></textarea>
          </div>
        </div>

        <div class="admin-modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" id="serviceModalCancel">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm" id="saveServiceBtn">Save Procedure</button>
        </div>
      </form>
    </div>
  </div>

  <script src="../assets/js/admin.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('serviceModal');
    const form = document.getElementById('serviceForm');
    const title = document.getElementById('serviceModalTitle');
    const openBtn = document.getElementById('openAddServiceBtn');
    const closeBtn = document.getElementById('serviceModalClose');
    const cancelBtn = document.getElementById('serviceModalCancel');

    function openModal() { modal.classList.add('open'); }
    function closeModal() { modal.classList.remove('open'); form.reset(); document.getElementById('srvId').value = ''; }

    openBtn.addEventListener('click', () => {
      title.textContent = 'Add New Procedure';
      document.getElementById('srvId').value = '';
      form.reset();
      openModal();
    });

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Edit Service
    document.querySelectorAll('.edit-service-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const s = JSON.parse(btn.getAttribute('data-service'));
        title.textContent = `Edit Procedure: ${s.name}`;
        document.getElementById('srvId').value = s.id;
        document.getElementById('srvName').value = s.name;
        document.getElementById('srvCategory').value = s.category;
        document.getElementById('srvPrice').value = s.price_starting;
        document.getElementById('srvDuration').value = s.duration_mins;
        document.getElementById('srvFeatured').value = s.is_featured;
        document.getElementById('srvShortDesc').value = s.short_description;
        document.getElementById('srvFullDesc').value = s.full_description;
        openModal();
      });
    });

    // Delete Service
    document.querySelectorAll('.delete-service-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        if (!confirm('Are you sure you want to remove this procedure?')) return;
        const id = btn.getAttribute('data-id');
        fetch('api/manage_service.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'delete', id: id })
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            window.location.reload();
          } else {
            alert(data.message);
          }
        });
      });
    });

    // Form Submit
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const saveBtn = document.getElementById('saveServiceBtn');
      saveBtn.disabled = true;

      const payload = {
        action: 'save',
        id: document.getElementById('srvId').value,
        name: document.getElementById('srvName').value.trim(),
        category: document.getElementById('srvCategory').value,
        price_starting: document.getElementById('srvPrice').value,
        duration_mins: document.getElementById('srvDuration').value,
        is_featured: document.getElementById('srvFeatured').value,
        short_description: document.getElementById('srvShortDesc').value.trim(),
        full_description: document.getElementById('srvFullDesc').value.trim()
      };

      fetch('api/manage_service.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      })
      .then(res => res.json())
      .then(data => {
        saveBtn.disabled = false;
        if (data.success) {
          closeModal();
          window.location.reload();
        } else {
          alert(data.message);
        }
      })
      .catch(err => {
        saveBtn.disabled = false;
        alert('Network error');
      });
    });
  });
  </script>

  <!-- Mobile Bottom Dock Component -->
  <?php require_once __DIR__ . '/includes/bottom_dock.php'; ?>

  <script src="../assets/js/admin.js"></script>
</body>
</html>
