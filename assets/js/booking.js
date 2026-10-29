/**
 * AuraDent 5-Step Online Booking Wizard
 */

document.addEventListener('DOMContentLoaded', () => {
  let currentStep = 1;
  const bookingState = {
    serviceId: null,
    serviceName: '',
    servicePrice: 0,
    doctorId: null,
    doctorName: 'Any Available Specialist',
    appointmentDate: '',
    appointmentTime: '',
    patientName: '',
    patientEmail: '',
    patientPhone: '',
    patientDob: '',
    isNewPatient: 1,
    isEmergency: 0,
    notes: '',
    bookingRef: ''
  };

  // Pre-fill from URL parameters (e.g. ?service=2 or ?doctor=1)
  const urlParams = new URLSearchParams(window.location.search);
  const preSelectedService = urlParams.get('service');
  const preSelectedDoctor = urlParams.get('doctor');
  const preSelectedDate = urlParams.get('date');

  // DOM Elements
  const steps = document.querySelectorAll('.wizard-step');
  const indicators = document.querySelectorAll('.step-indicator');
  const prevBtn = document.getElementById('prevStepBtn');
  const nextBtn = document.getElementById('nextStepBtn');
  const submitBtn = document.getElementById('submitBookingBtn');
  const bookingError = document.getElementById('bookingErrorMsg');

  // Step 1: Services Selection
  const serviceItems = document.querySelectorAll('.service-select-item');
  serviceItems.forEach(item => {
    item.addEventListener('click', () => {
      serviceItems.forEach(i => i.classList.remove('selected'));
      item.classList.add('selected');
      bookingState.serviceId = item.getAttribute('data-id');
      bookingState.serviceName = item.getAttribute('data-name');
      bookingState.servicePrice = item.getAttribute('data-price');
      clearError();
    });

    if (preSelectedService && (item.getAttribute('data-id') === preSelectedService || item.getAttribute('data-slug') === preSelectedService)) {
      item.click();
    }
  });

  // Step 2: Doctor Selection
  const doctorItems = document.querySelectorAll('.doctor-select-item');
  doctorItems.forEach(item => {
    item.addEventListener('click', () => {
      doctorItems.forEach(i => i.classList.remove('selected'));
      item.classList.add('selected');
      bookingState.doctorId = item.getAttribute('data-id') || null;
      bookingState.doctorName = item.getAttribute('data-name') || 'Any Available Specialist';
      clearError();
      loadAvailableSlots();
    });

    if (preSelectedDoctor && item.getAttribute('data-id') === preSelectedDoctor) {
      item.click();
    }
  });

  // Step 3: Date & Slots
  const dateInput = document.getElementById('bookingDateInput');
  if (dateInput) {
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
    if (preSelectedDate) {
      dateInput.value = preSelectedDate;
      bookingState.appointmentDate = preSelectedDate;
    } else {
      dateInput.value = today;
      bookingState.appointmentDate = today;
    }

    dateInput.addEventListener('change', () => {
      bookingState.appointmentDate = dateInput.value;
      loadAvailableSlots();
    });
  }

  // Initial slot load
  loadAvailableSlots();

  function loadAvailableSlots() {
    const slotsContainer = document.getElementById('slotsContainer');
    if (!slotsContainer) return;

    const date = dateInput ? dateInput.value : '';
    const docId = bookingState.doctorId || '';

    slotsContainer.innerHTML = '<div style="grid-column: 1/-1; text-align: center; color: #64748b; padding: 1.5rem;">Checking real-time calendar availability...</div>';

    fetch(`api/get_slots.php?doctor_id=${encodeURIComponent(docId)}&date=${encodeURIComponent(date)}`)
      .then(res => res.json())
      .then(data => {
        slotsContainer.innerHTML = '';
        if (!data.slots || data.slots.length === 0) {
          slotsContainer.innerHTML = '<div style="grid-column: 1/-1; color: #dc2626; padding: 1rem;">No slots available for this date. Please select another date.</div>';
          return;
        }

        data.slots.forEach(slot => {
          const btn = document.createElement('button');
          btn.type = 'button';
          btn.className = 'slot-btn' + (slot.available ? '' : ' disabled');
          btn.disabled = !slot.available;
          btn.textContent = slot.time;
          if (bookingState.appointmentTime === slot.time && slot.available) {
            btn.classList.add('selected');
          }

          if (slot.available) {
            btn.addEventListener('click', () => {
              document.querySelectorAll('.slot-btn').forEach(b => b.classList.remove('selected'));
              btn.classList.add('selected');
              bookingState.appointmentTime = slot.time;
              clearError();
            });
          }
          slotsContainer.appendChild(btn);
        });
      })
      .catch(err => {
        slotsContainer.innerHTML = '<div style="grid-column: 1/-1; color: #64748b;">Standard clinic hours available. Select a slot above.</div>';
      });
  }

  // Navigation handlers
  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      if (validateStep(currentStep)) {
        goToStep(currentStep + 1);
      }
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      if (currentStep > 1) {
        goToStep(currentStep - 1);
      }
    });
  }

  function validateStep(step) {
    clearError();
    if (step === 1) {
      if (!bookingState.serviceId) {
        showError('Please select a dental service or consultation to proceed.');
        return false;
      }
      return true;
    }
    if (step === 2) {
      // Doctor can be null for "Any Doctor", but one card must be chosen
      const selected = document.querySelector('.doctor-select-item.selected');
      if (!selected) {
        showError('Please select a preferred dentist or choose "Any Available Specialist".');
        return false;
      }
      return true;
    }
    if (step === 3) {
      if (!bookingState.appointmentDate) {
        showError('Please select an appointment date.');
        return false;
      }
      if (!bookingState.appointmentTime) {
        showError('Please choose an available appointment time slot.');
        return false;
      }
      // Populate review summary in Step 4
      updateBookingSummary();
      return true;
    }
    if (step === 4) {
      const name = document.getElementById('patientNameInput')?.value.trim();
      const email = document.getElementById('patientEmailInput')?.value.trim();
      const phone = document.getElementById('patientPhoneInput')?.value.trim();

      if (!name) {
        showError('Please enter your full legal name.');
        return false;
      }
      if (!email || !email.includes('@')) {
        showError('Please provide a valid email address for confirmation.');
        return false;
      }
      if (!phone || phone.length < 8) {
        showError('Please provide a valid phone number for SMS notifications.');
        return false;
      }

      bookingState.patientName = name;
      bookingState.patientEmail = email;
      bookingState.patientPhone = phone;
      bookingState.patientDob = document.getElementById('patientDobInput')?.value || '';
      bookingState.isNewPatient = document.getElementById('patientNewCheckbox')?.checked ? 1 : 0;
      bookingState.isEmergency = document.getElementById('patientEmergencyCheckbox')?.checked ? 1 : 0;
      bookingState.notes = document.getElementById('patientNotesInput')?.value.trim() || '';

      return true;
    }
    return true;
  }

  function goToStep(step) {
    currentStep = step;
    steps.forEach(s => s.classList.remove('active'));
    indicators.forEach((ind, idx) => {
      ind.classList.remove('active');
      if (idx + 1 < currentStep) {
        ind.classList.add('completed');
      } else if (idx + 1 === currentStep) {
        ind.classList.add('active');
      } else {
        ind.classList.remove('completed');
      }
    });

    const activeEl = document.querySelector(`.wizard-step[data-step="${currentStep}"]`);
    if (activeEl) activeEl.classList.add('active');

    // Button states
    if (prevBtn) prevBtn.style.display = (currentStep > 1 && currentStep < 5) ? 'inline-flex' : 'none';
    if (nextBtn) nextBtn.style.display = (currentStep < 4) ? 'inline-flex' : 'none';
    if (submitBtn) submitBtn.style.display = (currentStep === 4) ? 'inline-flex' : 'none';

    window.scrollTo({ top: document.querySelector('.wizard-card').offsetTop - 90, behavior: 'smooth' });
  }

  function updateBookingSummary() {
    const summaryBox = document.getElementById('bookingSummaryBox');
    if (summaryBox) {
      summaryBox.innerHTML = `
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1.25rem; margin-bottom: 1.5rem;">
          <h4 style="margin-bottom: 0.5rem; font-size: 1.05rem; color: #0f172a;">Appointment Summary</h4>
          <div style="font-size: 0.92rem; color: #334155; display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
            <div><strong>Treatment:</strong> ${bookingState.serviceName}</div>
            <div><strong>Dentist:</strong> ${bookingState.doctorName}</div>
            <div><strong>Date:</strong> ${bookingState.appointmentDate}</div>
            <div><strong>Time:</strong> ${bookingState.appointmentTime}</div>
          </div>
        </div>
      `;
    }
  }

  // Form submission
  if (submitBtn) {
    submitBtn.addEventListener('click', (e) => {
      e.preventDefault();
      if (!validateStep(4)) return;

      submitBtn.disabled = true;
      submitBtn.textContent = 'Securing Your Booking...';

      fetch('api/book.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(bookingState)
      })
      .then(res => res.json())
      .then(data => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Confirm & Book Appointment';

        if (data.success) {
          bookingState.bookingRef = data.reference;
          showConfirmationScreen(data);
          goToStep(5);
        } else {
          showError(data.message || 'An error occurred while securing your appointment.');
        }
      })
      .catch(err => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Confirm & Book Appointment';
        showError('Network error. Please try again.');
      });
    });
  }

  function showConfirmationScreen(data) {
    const refBadge = document.getElementById('confirmRefBadge');
    const detailsWrap = document.getElementById('confirmDetailsWrap');
    if (refBadge) refBadge.textContent = data.reference;
    if (detailsWrap) {
      detailsWrap.innerHTML = `
        <p><strong>Patient:</strong> ${escapeHtml(bookingState.patientName)}</p>
        <p><strong>Treatment:</strong> ${escapeHtml(bookingState.serviceName)}</p>
        <p><strong>Doctor:</strong> ${escapeHtml(bookingState.doctorName)}</p>
        <p><strong>Date & Time:</strong> ${escapeHtml(bookingState.appointmentDate)} at ${escapeHtml(bookingState.appointmentTime)}</p>
        <p><strong>Contact:</strong> ${escapeHtml(bookingState.patientEmail)} | ${escapeHtml(bookingState.patientPhone)}</p>
      `;
    }

    // Set calendar download button
    const calBtn = document.getElementById('downloadCalBtn');
    if (calBtn) {
      calBtn.href = generateIcsUrl(bookingState);
      calBtn.download = `auradent-booking-${bookingState.bookingRef}.ics`;
    }
  }

  function generateIcsUrl(state) {
    const icsData = [
      'BEGIN:VCALENDAR',
      'VERSION:2.0',
      'PRODID:-//AuraDent Luxe Dental Clinic//Appointment Calendar//EN',
      'BEGIN:VEVENT',
      `SUMMARY:Dental Appointment - ${state.serviceName}`,
      `DESCRIPTION:Appointment Ref: ${state.bookingRef} with ${state.doctorName}. Clinic: AuraDent Dental, 450 Lexington Ave, Suite 1200, NY.`,
      `LOCATION:450 Lexington Ave, Suite 1200, New York, NY 10017`,
      `STATUS:CONFIRMED`,
      'END:VEVENT',
      'END:VCALENDAR'
    ].join('\r\n');

    return 'data:text/calendar;charset=utf8,' + encodeURIComponent(icsData);
  }

  function showError(msg) {
    if (bookingError) {
      bookingError.textContent = msg;
      bookingError.style.display = 'block';
    }
  }

  function clearError() {
    if (bookingError) {
      bookingError.textContent = '';
      bookingError.style.display = 'none';
    }
  }

  function escapeHtml(str) {
    return String(str).replace(/[&<>"']/g, m => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    })[m]);
  }
});
