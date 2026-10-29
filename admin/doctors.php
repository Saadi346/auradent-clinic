<?php
/**
 * AuraDent Admin - Doctors & Medical Staff Management
 */

require_once __DIR__ . '/../includes/functions.php';
requireAuth();

$pdo = getDBConnection();
$doctors = getAllDoctors();
$adminPage = 'doctors';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Doctors | AuraDent Admin Portal</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🦷</text></svg>">
</head>
<body class="admin-body">

  <!-- Sidebar Component -->
  <?php require_once __DIR__ . '/includes/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="admin-content-area">
    <header class="admin-topbar">
      <div class="admin-topbar-left">
        <button type="button" class="admin-hamburger" id="adminSidebarToggle" aria-label="Toggle navigation drawer">
          <span>☰</span>
        </button>
        <div class="admin-topbar-title">Doctors &amp; Specialists</div>
      </div>
      <div class="admin-topbar-right">
        <button type="button" class="btn btn-primary btn-sm" id="openAddDoctorBtn">
          + Add Specialist
        </button>
      </div>
    </header>

    <div class="admin-body-content">
      
      <!-- Doctor Cards Grid -->
      <div class="admin-doctors-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.8rem;">
        <?php foreach ($doctors as $doc): ?>
          <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
            
            <div style="display: flex; gap: 1.25rem; padding: 1.5rem; border-bottom: 1px solid #f1f5f9; align-items: center;">
              <img src="../<?= htmlspecialchars($doc['avatar_url']) ?>" alt="<?= htmlspecialchars($doc['name']) ?>" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; background: #0f172a; flex-shrink: 0;">
              <div>
                <span class="status-pill <?= ($doc['is_active'] == 1) ? 'status-completed' : 'status-cancelled' ?>" style="font-size: 0.72rem; margin-bottom: 0.25rem;">
                  <?= ($doc['is_active'] == 1) ? 'ACTIVE' : 'ON LEAVE' ?>
                </span>
                <h3 style="font-size: 1.15rem; margin: 0.2rem 0; color: #0f172a;"><?= htmlspecialchars($doc['name']) ?></h3>
                <div style="font-size: 0.82rem; font-weight: 700; color: #0d9488;"><?= htmlspecialchars($doc['specialty']) ?></div>
                <div style="font-size: 0.78rem; color: #64748b;"><?= htmlspecialchars($doc['qualifications']) ?></div>
              </div>
            </div>

            <div style="padding: 1.25rem 1.5rem; flex-grow: 1; font-size: 0.88rem; color: #475569; line-height: 1.6;">
              <p style="margin-bottom: 1rem;"><?= htmlspecialchars(mb_strimwidth($doc['bio'], 0, 140, '...')) ?></p>
              
              <div style="background: #f8fafc; border-radius: 8px; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; font-size: 0.82rem;">
                <div><strong>Days:</strong> <?= htmlspecialchars($doc['schedule_days']) ?></div>
                <div><strong>Hours:</strong> <?= htmlspecialchars($doc['hours_text']) ?></div>
                <div><strong>Experience:</strong> <?= $doc['experience_years'] ?> Years</div>
              </div>
            </div>

            <div style="padding: 1rem 1.5rem; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
              <button type="button" class="btn btn-outline btn-sm edit-doctor-btn" data-doctor="<?= htmlspecialchars(json_encode($doc), ENT_QUOTES, 'UTF-8') ?>">
                ✏️ Edit Profile
              </button>
              
              <button type="button" class="btn <?= ($doc['is_active'] == 1) ? 'btn-danger' : 'btn-primary' ?> btn-sm toggle-status-btn" data-id="<?= $doc['id'] ?>" data-status="<?= ($doc['is_active'] == 1) ? 0 : 1 ?>">
                <?= ($doc['is_active'] == 1) ? 'Deactivate' : 'Activate' ?>
              </button>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </main>

  <!-- Add / Edit Doctor Modal -->
  <div class="admin-modal-overlay" id="doctorModal">
    <div class="admin-modal">
      <div class="admin-modal-header">
        <h3 style="font-size: 1.25rem; font-weight: 700; margin: 0;" id="doctorModalTitle">Add New Specialist</h3>
        <button type="button" id="doctorModalClose" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
      </div>
      
      <form id="doctorForm">
        <input type="hidden" name="id" id="docId">
        <div class="admin-modal-body">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Full Doctor Name *</label>
              <input type="text" id="docName" name="name" class="form-control" placeholder="Dr. Julian Vance" required>
            </div>
            <div class="form-group">
              <label class="form-label">Clinical Title *</label>
              <input type="text" id="docTitle" name="title" class="form-control" placeholder="Associate Prosthodontist" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Qualifications / Degrees</label>
              <input type="text" id="docQuals" name="qualifications" class="form-control" placeholder="DDS, MS (Columbia)" required>
            </div>
            <div class="form-group">
              <label class="form-label">Specialty Field *</label>
              <input type="text" id="docSpecialty" name="specialty" class="form-control" placeholder="Cosmetic & Reconstructive" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Years of Experience</label>
              <input type="number" id="docExp" name="experience_years" class="form-control" value="10" min="1" max="50">
            </div>
            <div class="form-group">
              <label class="form-label">Consultation Schedule</label>
              <input type="text" id="docDays" name="schedule_days" class="form-control" placeholder="Mon, Wed, Fri">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Consultation Hours</label>
              <input type="text" id="docHours" name="hours_text" class="form-control" placeholder="9:00 AM - 5:00 PM">
            </div>
            <div class="form-group">
              <label class="form-label">Status</label>
              <select id="docStatus" name="is_active" class="form-control">
                <option value="1">Active / Accepting Patients</option>
                <option value="0">On Leave / Inactive</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Biography & Clinical Philosophy</label>
            <textarea id="docBio" name="bio" class="form-control" rows="3" placeholder="Provide background, university education, and clinical focus..."></textarea>
          </div>
        </div>

        <div class="admin-modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" id="doctorModalCancel">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm" id="saveDoctorBtn">Save Specialist</button>
        </div>
      </form>
    </div>
  </div>

  <script src="../assets/js/admin.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('doctorModal');
    const form = document.getElementById('doctorForm');
    const title = document.getElementById('doctorModalTitle');
    const openBtn = document.getElementById('openAddDoctorBtn');
    const closeBtn = document.getElementById('doctorModalClose');
    const cancelBtn = document.getElementById('doctorModalCancel');

    function openModal() { modal.classList.add('open'); }
    function closeModal() { modal.classList.remove('open'); form.reset(); document.getElementById('docId').value = ''; }

    openBtn.addEventListener('click', () => {
      title.textContent = 'Add New Specialist';
      document.getElementById('docId').value = '';
      form.reset();
      openModal();
    });

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Edit Doctor
    document.querySelectorAll('.edit-doctor-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const d = JSON.parse(btn.getAttribute('data-doctor'));
        title.textContent = `Edit Profile: ${d.name}`;
        document.getElementById('docId').value = d.id;
        document.getElementById('docName').value = d.name;
        document.getElementById('docTitle').value = d.title;
        document.getElementById('docQuals').value = d.qualifications;
        document.getElementById('docSpecialty').value = d.specialty;
        document.getElementById('docExp').value = d.experience_years;
        document.getElementById('docDays').value = d.schedule_days;
        document.getElementById('docHours').value = d.hours_text;
        document.getElementById('docStatus').value = d.is_active;
        document.getElementById('docBio').value = d.bio;
        openModal();
      });
    });

    // Toggle Status
    document.querySelectorAll('.toggle-status-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        const status = btn.getAttribute('data-status');
        fetch('api/manage_doctor.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'toggle_status', id: id, status: status })
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
      const saveBtn = document.getElementById('saveDoctorBtn');
      saveBtn.disabled = true;

      const payload = {
        action: 'save',
        id: document.getElementById('docId').value,
        name: document.getElementById('docName').value.trim(),
        title: document.getElementById('docTitle').value.trim(),
        qualifications: document.getElementById('docQuals').value.trim(),
        specialty: document.getElementById('docSpecialty').value.trim(),
        experience_years: document.getElementById('docExp').value,
        schedule_days: document.getElementById('docDays').value.trim(),
        hours_text: document.getElementById('docHours').value.trim(),
        is_active: document.getElementById('docStatus').value,
        bio: document.getElementById('docBio').value.trim()
      };

      fetch('api/manage_doctor.php', {
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
