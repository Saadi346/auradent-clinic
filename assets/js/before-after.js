/**
 * Aura Dental Atelier - Interactive Before & After Engine
 * Features:
 * 1. 60fps CSS clip-path dual layer split slider (touch + mouse)
 * 2. Case study preset switcher
 * 3. Card flip toggle (Instant Before / After state)
 * 4. Clinical Case Inspection Modal with pre-populated booking CTA
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Interactive Split Sliders (Hardware-Accelerated via CSS clip-path)
  const sliders = document.querySelectorAll('.ba-slider-container');

  sliders.forEach(container => {
    const rangeInput = container.querySelector('.ba-range-input');
    if (!rangeInput) return;

    function setPosition(val) {
      const clamped = Math.max(0, Math.min(100, val));
      container.style.setProperty('--ba-pos', `${clamped}%`);
    }

    rangeInput.addEventListener('input', (e) => {
      setPosition(e.target.value);
    });

    // Handle touch & mouse dragging smoothly
    let isDragging = false;

    function handleMove(clientX) {
      const rect = container.getBoundingClientRect();
      const posX = clientX - rect.left;
      const pct = (posX / rect.width) * 100;
      setPosition(pct);
      rangeInput.value = pct;
    }

    container.addEventListener('mousedown', (e) => {
      isDragging = true;
      handleMove(e.clientX);
    });

    window.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      handleMove(e.clientX);
    });

    window.addEventListener('mouseup', () => {
      isDragging = false;
    });

    // Touch events for phone screens
    container.addEventListener('touchstart', (e) => {
      if (e.touches.length > 0) {
        handleMove(e.touches[0].clientX);
      }
    }, { passive: true });

    container.addEventListener('touchmove', (e) => {
      if (e.touches.length > 0) {
        handleMove(e.touches[0].clientX);
      }
    }, { passive: true });

    // Initial 50% split
    setPosition(50);
  });

  // 2. Preset Switcher on Featured Makeover Hero
  const presetBtns = document.querySelectorAll('.ba-preset-btn');
  const mainBeforeImg = document.getElementById('featuredBeforeImg');
  const mainAfterImg = document.getElementById('featuredAfterImg');
  const caseTitle = document.getElementById('featuredCaseTitle');
  const caseDesc = document.getElementById('featuredCaseDesc');

  const presetData = {
    veneers: {
      title: 'Case #101: 8 Handcrafted e.max® Porcelain Veneers',
      desc: 'Patient presented with severe tetracycline banding and chipped incisal edges. Dr. Sarah Jensen designed eight micro-thin lithium disilicate laminates restoring golden proportion harmony.',
      before: 'assets/images/case-veneers-before.svg',
      after: 'assets/images/case-veneers-after.svg'
    },
    implants: {
      title: 'Case #102: Full-Arch Computer-Guided All-on-4 Titanium Implants',
      desc: 'Patient presented with a completely terminal upper dentition. Dr. Marcus Vance placed four computer-guided Straumann® implants and fixed a monolithic zirconia bridge in a single day.',
      before: 'assets/images/case-implants-before.svg',
      after: 'assets/images/case-implants-after.svg'
    },
    invisalign: {
      title: 'Case #103: Invisalign® Clear Aligners (4.2mm Diastema Closure)',
      desc: 'Adult patient presented with a wide midline gap and anterior bite collapse. Dr. Elena Rostova closed the space and aligned the arches in 5.5 months with 22 SmartTrack® trays.',
      before: 'assets/images/case-invisalign-before.svg',
      after: 'assets/images/case-invisalign-after.svg'
    }
  };

  presetBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      presetBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const key = btn.getAttribute('data-preset');
      const data = presetData[key];
      if (!data) return;

      if (mainBeforeImg) mainBeforeImg.src = data.before;
      if (mainAfterImg) mainAfterImg.src = data.after;
      if (caseTitle) caseTitle.textContent = data.title;
      if (caseDesc) caseDesc.textContent = data.desc;
    });
  });

  // 3. Category Filter Tabs in Gallery
  const filterBtns = document.querySelectorAll('.gallery-filter-btn');
  const cards = document.querySelectorAll('.gallery-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.getAttribute('data-filter');

      cards.forEach(card => {
        const cat = card.getAttribute('data-category');
        if (filter === 'all' || cat === filter) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // 4. Card Flip Toggle (Instant Before / After state)
  document.querySelectorAll('.gallery-card').forEach(card => {
    const preview = card.querySelector('.gallery-card-preview');
    const toggleBtns = card.querySelectorAll('.gallery-card-toggle button');

    toggleBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        toggleBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const state = btn.getAttribute('data-state');

        if (state === 'before') {
          preview.classList.add('showing-before');
        } else {
          preview.classList.remove('showing-before');
        }
      });
    });
  });

  // 5. Clinical Case Inspection Modal
  const modal = document.getElementById('clinicalModal');
  const modalBody = document.getElementById('clinicalModalBody');
  const modalClose = document.getElementById('clinicalModalClose');

  document.querySelectorAll('.inspect-case-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const dataStr = btn.getAttribute('data-case');
      if (!dataStr || !modal || !modalBody) return;

      try {
        const c = JSON.parse(dataStr);
        modalBody.innerHTML = `
          <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #e2e8f0;">
            <div>
              <span style="font-size: 0.75rem; font-weight: 800; color: #c5a059; text-transform: uppercase; letter-spacing: 0.08em;">${escapeHtml(c.tag)}</span>
              <h3 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 0.2rem;">${escapeHtml(c.title)}</h3>
            </div>
            <div style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 12px; padding: 0.5rem 0.9rem; text-align: right; font-size: 0.8rem; font-weight: 700; color: #334155;">
              Case ID: <span style="color: #0f172a; font-family: monospace;">${escapeHtml(c.id)}</span>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
            <div style="background: #fff1f2; border: 1px solid #fecdd3; padding: 1rem; border-radius: 12px;">
              <div style="font-size: 0.75rem; font-weight: 800; color: #be123c; text-transform: uppercase;">Pre-Op Baseline</div>
              <div style="font-size: 1.1rem; font-weight: 700; color: #881337; margin: 0.2rem 0;">${escapeHtml(c.shadeBefore)}</div>
              <p style="font-size: 0.85rem; color: #4c0519; margin: 0;">${escapeHtml(c.complaint)}</p>
            </div>
            <div style="background: #ecfdf5; border: 1px solid #a7f3d0; padding: 1rem; border-radius: 12px;">
              <div style="font-size: 0.75rem; font-weight: 800; color: #047857; text-transform: uppercase;">Post-Op Result</div>
              <div style="font-size: 1.1rem; font-weight: 700; color: #065f46; margin: 0.2rem 0;">${escapeHtml(c.shadeAfter)}</div>
              <p style="font-size: 0.85rem; color: #064e3b; margin: 0;">${escapeHtml(c.outcome)}</p>
            </div>
          </div>

          <div style="margin-bottom: 1.5rem;">
            <h4 style="font-size: 0.92rem; font-weight: 800; color: #0f172a; text-transform: uppercase; margin-bottom: 0.5rem;">Clinical Protocol &amp; Materials</h4>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1rem 1.25rem; border-radius: 12px; font-size: 0.92rem; line-height: 1.6; color: #475569;">
              ${escapeHtml(c.protocol)}
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 2rem; font-size: 0.85rem;">
            <div style="border-left: 3px solid #c5a059; padding-left: 0.75rem;">
              <strong style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; display: block;">Operating Clinician</strong>
              <span style="font-weight: 700; color: #0f172a;">${escapeHtml(c.doctor)}</span>
            </div>
            <div style="border-left: 3px solid #c5a059; padding-left: 0.75rem;">
              <strong style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; display: block;">Treatment Duration</strong>
              <span style="font-weight: 700; color: #0f172a;">${escapeHtml(c.duration)}</span>
            </div>
            <div style="border-left: 3px solid #c5a059; padding-left: 0.75rem;">
              <strong style="color: #64748b; font-size: 0.75rem; text-transform: uppercase; display: block;">Patient Comfort</strong>
              <span style="font-weight: 700; color: #059669;">100% Painless</span>
            </div>
          </div>

          <div style="text-align: center; padding-top: 1.5rem; border-top: 1px solid #e2e8f0; display: flex; gap: 1rem; justify-content: flex-end;">
            <button type="button" class="btn btn-outline btn-sm" onclick="document.getElementById('clinicalModal').classList.remove('open')">Close Review</button>
            <a href="booking.php?service=${encodeURIComponent(c.serviceId || '2')}" class="btn btn-gold btn-sm">
              Book Appointment for This Treatment &rarr;
            </a>
          </div>
        `;
        modal.classList.add('open');
      } catch (err) {
        console.error('Failed to parse case data', err);
      }
    });
  });

  if (modalClose && modal) {
    modalClose.addEventListener('click', () => modal.classList.remove('open'));
    modal.addEventListener('click', (e) => {
      if (e.target === modal) modal.classList.remove('open');
    });
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.classList.contains('open')) {
        modal.classList.remove('open');
      }
    });
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str).replace(/[&<>"']/g, m => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    })[m]);
  }
});
