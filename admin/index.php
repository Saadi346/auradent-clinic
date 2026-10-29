<?php
/**
 * AuraDent Admin Dashboard - Appointments & Clinic Overview
 */

require_once __DIR__ . '/../includes/functions.php';
requireAuth();

$pdo = getDBConnection();

// Fetch metrics
$totalBookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
$todayBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE appointment_date = '" . date('Y-m-d') . "'")->fetchColumn();
$pendingBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status = 'pending'")->fetchColumn();
$confirmedBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status = 'confirmed'")->fetchColumn();
$totalDoctors = $pdo->query("SELECT COUNT(*) FROM doctors WHERE is_active = 1")->fetchColumn();

// Fetch all bookings with doctor & service details
$stmt = $pdo->query("
    SELECT 
        b.*, 
        d.name as doctor_name, 
        d.specialty as doctor_specialty,
        s.name as service_name,
        s.price_starting as service_price
    FROM bookings b
    LEFT JOIN doctors d ON b.doctor_id = d.id
    LEFT JOIN services s ON b.service_id = s.id
    ORDER BY b.appointment_date DESC, b.appointment_time ASC
");
$bookings = $stmt->fetchAll();
$adminPage = 'index';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | AuraDent Healthcare Operations</title>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🦷</text></svg>">
</head>
<body class="admin-body">

  <!-- Sidebar Component -->
  <?php require_once __DIR__ . '/includes/sidebar.php'; ?>

  <!-- Main Content Area -->
  <main class="admin-content-area">
    <!-- Topbar -->
    <header class="admin-topbar">
      <div class="admin-topbar-left">
        <button type="button" class="admin-hamburger" id="adminSidebarToggle" aria-label="Toggle navigation drawer">
          <span>☰</span>
        </button>
        <div class="admin-topbar-title">Appointments Management</div>
      </div>
      <div class="admin-topbar-right">
        <div class="admin-user-profile">
          <div style="text-align: right;">
            <div style="font-weight: 700; font-size: 0.92rem;"><?= htmlspecialchars($_SESSION['admin_full_name'] ?? 'Clinic Administrator') ?></div>
            <div style="font-size: 0.78rem; color: #64748b;">Superadmin &bull; Clinical Operations</div>
          </div>
          <div class="admin-avatar">AD</div>
        </div>
      </div>
    </header>

    <!-- Body Content -->
    <div class="admin-body-content">
      
      <!-- KPI Metric Cards -->
      <div class="kpi-grid">
        <div class="kpi-card">
          <div>
            <div class="kpi-title">Total Bookings</div>
            <div class="kpi-value"><?= $totalBookings ?></div>
          </div>
          <div class="kpi-icon teal">📅</div>
        </div>

        <div class="kpi-card">
          <div>
            <div class="kpi-title">Today's Schedule</div>
            <div class="kpi-value"><?= $todayBookings ?></div>
          </div>
          <div class="kpi-icon cyan">⏰</div>
        </div>

        <div class="kpi-card">
          <div>
            <div class="kpi-title">Pending Confirmation</div>
            <div class="kpi-value"><?= $pendingBookings ?></div>
          </div>
          <div class="kpi-icon amber">⏳</div>
        </div>

        <div class="kpi-card">
          <div>
            <div class="kpi-title">Confirmed Visits</div>
            <div class="kpi-value"><?= $confirmedBookings ?></div>
          </div>
          <div class="kpi-icon mint">✓</div>
        </div>

        <div class="kpi-card">
          <div>
            <div class="kpi-title">Active Doctors</div>
            <div class="kpi-value"><?= $totalDoctors ?></div>
          </div>
          <div class="kpi-icon rose">👨‍⚕️</div>
        </div>
      </div>

      <!-- Data Table Card -->
      <div class="data-table-card">
        <!-- Filter Bar -->
        <div class="table-filter-bar">
          <div class="search-input-wrap">
            <span class="search-icon">🔍</span>
            <input type="text" id="tableSearchInput" placeholder="Search patient, phone, reference...">
          </div>

          <div class="filter-pills">
            <button type="button" class="filter-btn active" data-status="all">All (<?= count($bookings) ?>)</button>
            <button type="button" class="filter-btn" data-status="pending">Pending</button>
            <button type="button" class="filter-btn" data-status="confirmed">Confirmed</button>
            <button type="button" class="filter-btn" data-status="completed">Completed</button>
            <button type="button" class="filter-btn" data-status="cancelled">Cancelled</button>
          </div>
        </div>

        <!-- Table -->
        <div style="overflow-x: auto;">
          <table class="admin-table">
            <thead>
              <tr>
                <th>Reference</th>
                <th>Patient Details</th>
                <th>Doctor</th>
                <th>Treatment</th>
                <th>Date & Time</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($bookings)): ?>
                <tr>
                  <td colspan="8" style="text-align: center; padding: 2rem; color: #64748b;">
                    No appointment bookings found.
                  </td>
                </tr>
              <?php else: ?>
                <?php foreach ($bookings as $b): ?>
                  <tr data-status="<?= htmlspecialchars($b['status']) ?>">
                    <td data-label="Reference">
                      <span style="font-family: monospace; font-weight: 700; color: #0f172a;">
                        <?= htmlspecialchars($b['booking_reference']) ?>
                      </span>
                      <?php if ($b['is_emergency'] == 1): ?>
                        <span style="background: #ffe4e6; color: #be123c; font-size: 0.72rem; font-weight: 800; padding: 0.15rem 0.4rem; border-radius: 4px; margin-left: 0.35rem;">URGENT</span>
                      <?php endif; ?>
                    </td>
                    <td data-label="Patient">
                      <div>
                        <strong style="color: #0f172a;"><?= htmlspecialchars($b['patient_name']) ?></strong>
                        <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.15rem;">
                          📞 <?= htmlspecialchars($b['patient_phone']) ?><br>
                          ✉️ <?= htmlspecialchars($b['patient_email']) ?>
                        </div>
                      </div>
                    </td>
                    <td data-label="Doctor">
                      <div>
                        <strong style="color: #0d9488;"><?= htmlspecialchars($b['doctor_name'] ?? 'Any Available Doctor') ?></strong>
                        <div style="font-size: 0.78rem; color: #64748b;"><?= htmlspecialchars($b['doctor_specialty'] ?? 'General Care') ?></div>
                      </div>
                    </td>
                    <td data-label="Treatment">
                      <span style="font-weight: 600;"><?= htmlspecialchars($b['service_name'] ?? 'General Consultation') ?></span>
                    </td>
                    <td data-label="Scheduled">
                      <div>
                        <strong><?= formatDate($b['appointment_date']) ?></strong>
                        <div style="font-size: 0.82rem; color: #64748b;"><?= htmlspecialchars($b['appointment_time']) ?></div>
                      </div>
                    </td>
                    <td data-label="Status">
                      <span class="status-pill status-<?= htmlspecialchars($b['status']) ?>">
                        <?= htmlspecialchars(strtoupper($b['status'])) ?>
                      </span>
                    </td>
                    <td data-label="Update">
                      <select class="status-changer-select" data-id="<?= $b['id'] ?>" style="padding: 0.4rem 0.6rem; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.82rem; background: #fff; font-weight: 600; cursor: pointer;">
                        <option value="pending" <?= ($b['status'] === 'pending') ? 'selected' : '' ?>>Pending</option>
                        <option value="confirmed" <?= ($b['status'] === 'confirmed') ? 'selected' : '' ?>>Confirmed</option>
                        <option value="completed" <?= ($b['status'] === 'completed') ? 'selected' : '' ?>>Completed</option>
                        <option value="cancelled" <?= ($b['status'] === 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                      </select>
                    </td>
                    <td data-label="Actions">
                      <div class="action-btn-group">
                        <button type="button" class="btn btn-outline btn-sm view-booking-btn" data-booking="<?= htmlspecialchars(json_encode($b), ENT_QUOTES, 'UTF-8') ?>" title="View Full Intake Notes">
                          <span>👁️</span> <span>Details</span>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </main>

  <!-- Booking Details Modal -->
  <div class="admin-modal-overlay" id="bookingModal">
    <div class="admin-modal">
      <div class="admin-modal-header">
        <h3 style="font-size: 1.25rem; font-weight: 700; margin: 0;">Appointment Intake Details</h3>
        <button type="button" id="modalCloseBtn" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #64748b;">&times;</button>
      </div>
      <div class="admin-modal-body" id="bookingModalBody">
        <!-- Injected via JavaScript -->
      </div>
      <div class="admin-modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('bookingModal').classList.remove('open')">
          Close
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Bottom Dock Component -->
  <?php require_once __DIR__ . '/includes/bottom_dock.php'; ?>

  <script src="../assets/js/admin.js"></script>
</body>
</html>
