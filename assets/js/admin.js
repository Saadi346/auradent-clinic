/**
 * AuraDent Admin Portal Interactive Engine
 */

document.addEventListener('DOMContentLoaded', () => {
  // Mobile Off-Canvas Sidebar / Drawer Toggle
  const sidebar = document.getElementById('adminSidebar');
  const backdrop = document.getElementById('adminSidebarBackdrop');
  const toggleBtn = document.getElementById('adminSidebarToggle');
  const closeBtn = document.getElementById('adminSidebarClose');
  const dockMenuBtn = document.getElementById('adminDockMenuBtn');

  function openSidebar() {
    if (sidebar) sidebar.classList.add('open');
    if (backdrop) backdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeSidebar() {
    if (sidebar) sidebar.classList.remove('open');
    if (backdrop) backdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
  if (dockMenuBtn) dockMenuBtn.addEventListener('click', () => {
    if (sidebar && sidebar.classList.contains('open')) {
      closeSidebar();
    } else {
      openSidebar();
    }
  });
  if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
  if (backdrop) backdrop.addEventListener('click', closeSidebar);

  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && sidebar && sidebar.classList.contains('open')) {
      closeSidebar();
    }
  });

  // 1. Toast Notification Helper
  window.showAdminToast = function(message, isError = false) {
    let toast = document.querySelector('.admin-toast');
    if (!toast) {
      toast = document.createElement('div');
      toast.className = 'admin-toast';
      document.body.appendChild(toast);
    }
    toast.style.background = isError ? '#be123c' : '#0f172a';
    toast.innerHTML = (isError ? '&#9888; ' : '&#10004; ') + message;
    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3500);
  };

  // 2. Status Filter Buttons on Bookings Table
  const filterBtns = document.querySelectorAll('.filter-btn');
  const tableRows = document.querySelectorAll('.admin-table tbody tr');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const status = btn.getAttribute('data-status');

      tableRows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        if (status === 'all' || rowStatus === status) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });

  // 3. Search Filter
  const searchInput = document.getElementById('tableSearchInput');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase().trim();
      tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(query)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  }

  // 4. Quick Status Changer on Bookings
  document.querySelectorAll('.status-changer-select').forEach(select => {
    select.addEventListener('change', (e) => {
      const bookingId = select.getAttribute('data-id');
      const newStatus = select.value;

      fetch('api/update_booking.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: bookingId, status: newStatus })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          showAdminToast(`Booking #${bookingId} marked as ${newStatus.toUpperCase()}`);
          const row = select.closest('tr');
          if (row) {
            row.setAttribute('data-status', newStatus);
            const pill = row.querySelector('.status-pill');
            if (pill) {
              pill.className = `status-pill status-${newStatus}`;
              pill.textContent = newStatus.toUpperCase();
            }
          }
        } else {
          showAdminToast(data.message || 'Failed to update status', true);
        }
      })
      .catch(err => {
        showAdminToast('Network error while updating status', true);
      });
    });
  });

  // 5. Booking Details Modal
  const modalOverlay = document.getElementById('bookingModal');
  const modalContent = document.getElementById('bookingModalBody');
  const modalClose = document.getElementById('modalCloseBtn');

  document.querySelectorAll('.view-booking-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const dataStr = btn.getAttribute('data-booking');
      if (!dataStr) return;
      try {
        const b = JSON.parse(dataStr);
        modalContent.innerHTML = `
          <div class="modal-grid-2col" style="display: grid; gap: 1.1rem; margin-bottom: 1.5rem;">
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Reference Code</label>
              <div style="font-family: monospace; font-size: 1.15rem; font-weight: 700; color: #0f172a;">${escapeHtml(b.booking_reference)}</div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Status</label>
              <div><span class="status-pill status-${b.status}">${b.status.toUpperCase()}</span></div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Patient Name</label>
              <div style="font-weight: 600;">${escapeHtml(b.patient_name)}</div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Patient Contact</label>
              <div>${escapeHtml(b.patient_phone)}<br><small style="color: #64748b;">${escapeHtml(b.patient_email)}</small></div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Assigned Dentist</label>
              <div style="font-weight: 600;">${escapeHtml(b.doctor_name || 'Unassigned / Any')}</div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Treatment</label>
              <div style="font-weight: 600;">${escapeHtml(b.service_name || 'General Consultation')}</div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Scheduled Slot</label>
              <div><strong>${escapeHtml(b.appointment_date)}</strong> at ${escapeHtml(b.appointment_time)}</div>
            </div>
            <div>
              <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Emergency Case?</label>
              <div>${b.is_emergency == 1 ? '<span style="color: #e11d48; font-weight: 700;">&#9888; YES (URGENT)</span>' : 'Standard Routine'}</div>
            </div>
          </div>
          <div>
            <label style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Patient Clinical Notes & Symptoms</label>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1rem; border-radius: 8px; font-size: 0.92rem; margin-top: 0.35rem;">
              ${escapeHtml(b.notes || 'No special notes provided by patient.')}
            </div>
          </div>
        `;
        modalOverlay.classList.add('open');
      } catch (err) {
        console.error(err);
      }
    });
  });

  if (modalClose && modalOverlay) {
    modalClose.addEventListener('click', () => modalOverlay.classList.remove('open'));
    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) modalOverlay.classList.remove('open');
    });
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str).replace(/[&<>"']/g, m => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    })[m]);
  }
});
