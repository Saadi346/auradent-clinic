<?php
$currentPage = 'booking';
$pageTitle = 'Book an Appointment Online | 24/7 Real-Time Scheduling';
require_once __DIR__ . '/includes/header.php';

$allServices = getAllServices();
$allDoctors = getActiveDoctors();
?>

<!-- Booking Hero -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 4.5rem 0 4rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">24/7 Automated Scheduling</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.2rem); font-weight: 800; color: #ffffff; margin-bottom: 0.8rem;">
      Schedule Your Dental Visit in 60 Seconds
    </h1>
    <p style="max-width: 680px; margin: 0 auto; color: #94a3b8; font-size: 1.1rem; line-height: 1.6;">
      Choose your preferred procedure, select a doctor, and pick an open calendar slot. Instant confirmation with zero phone tag.
    </p>
  </div>
</div>

<!-- Booking Wizard Container -->
<section class="booking-page-wrap">
  <div class="container">
    
    <div class="wizard-card">
      <!-- Progress Stepper -->
      <div class="wizard-stepper">
        <div class="step-indicator active" data-step="1">
          <div class="step-number">1</div>
          <span>Select Treatment</span>
        </div>
        <div class="step-indicator" data-step="2">
          <div class="step-number">2</div>
          <span>Choose Dentist</span>
        </div>
        <div class="step-indicator" data-step="3">
          <div class="step-number">3</div>
          <span>Date & Time</span>
        </div>
        <div class="step-indicator" data-step="4">
          <div class="step-number">4</div>
          <span>Patient Details</span>
        </div>
        <div class="step-indicator" data-step="5">
          <div class="step-number">5</div>
          <span>Confirmed</span>
        </div>
      </div>

      <!-- Wizard Body -->
      <div class="wizard-body">
        
        <!-- Error Banner -->
        <div id="bookingErrorMsg" style="display: none; padding: 0.9rem 1.25rem; background: #fee2e2; border: 1px solid #f87171; color: #b91c1c; border-radius: 8px; font-weight: 600; font-size: 0.92rem; margin-bottom: 1.5rem;"></div>

        <!-- STEP 1: Select Service -->
        <div class="wizard-step active" data-step="1">
          <h2 class="wizard-step-title">Step 1: Select Your Treatment or Consultation</h2>
          <p class="wizard-step-subtitle">Click the service you would like to receive. All consultations include digital 3D scans.</p>

          <div class="services-select-grid">
            <?php foreach ($allServices as $s): ?>
              <div class="service-select-item" data-id="<?= $s['id'] ?>" data-slug="<?= $s['slug'] ?>" data-name="<?= htmlspecialchars($s['name']) ?>" data-price="<?= $s['price_starting'] ?>">
                <div style="font-size: 0.75rem; font-weight: 700; color: #0284c7; text-transform: uppercase; margin-bottom: 0.25rem;">
                  <?= htmlspecialchars($s['category']) ?>
                </div>
                <h4 style="font-size: 1.05rem; color: #0f172a; margin-bottom: 0.5rem; line-height: 1.3;">
                  <?= htmlspecialchars($s['name']) ?>
                </h4>
                <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.8rem; line-height: 1.45;">
                  <?= htmlspecialchars($s['short_description']) ?>
                </p>
                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 0.65rem; border-top: 1px solid #f1f5f9; font-size: 0.85rem;">
                  <span style="color: #64748b;">⏱️ <?= $s['duration_mins'] ?> mins</span>
                  <span style="font-weight: 800; color: #0d9488;"><?= formatPrice($s['price_starting']) ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 2: Select Doctor -->
        <div class="wizard-step" data-step="2">
          <h2 class="wizard-step-title">Step 2: Choose Your Dental Specialist</h2>
          <p class="wizard-step-subtitle">Select an Ivy-League certified doctor or choose "Any Available Specialist" for earliest availability.</p>

          <div class="doctors-select-grid">
            <!-- Any Doctor Card -->
            <div class="doctor-select-item selected" data-id="" data-name="Any Available Specialist">
              <div style="width: 54px; height: 54px; border-radius: 50%; background: #0d9488; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                ⭐
              </div>
              <div>
                <h4 style="font-size: 1.05rem; margin-bottom: 0.2rem; color: #0f172a;">Any Available Specialist</h4>
                <p style="font-size: 0.82rem; color: #64748b; margin: 0;">Recommended for fastest appointment availability</p>
              </div>
            </div>

            <!-- Specific Doctors -->
            <?php foreach ($allDoctors as $doc): ?>
              <div class="doctor-select-item" data-id="<?= $doc['id'] ?>" data-name="<?= htmlspecialchars($doc['name']) ?>">
                <img src="<?= htmlspecialchars($doc['avatar_url']) ?>" alt="<?= htmlspecialchars($doc['name']) ?>" class="doctor-select-avatar">
                <div>
                  <h4 style="font-size: 1.05rem; margin-bottom: 0.2rem; color: #0f172a;"><?= htmlspecialchars($doc['name']) ?></h4>
                  <div style="font-size: 0.78rem; font-weight: 700; color: #0d9488;"><?= htmlspecialchars($doc['specialty']) ?></div>
                  <p style="font-size: 0.78rem; color: #64748b; margin: 0;">⏰ <?= htmlspecialchars($doc['schedule_days']) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 3: Date & Time Slot Picker -->
        <div class="wizard-step" data-step="3">
          <h2 class="wizard-step-title">Step 3: Pick Date & Calendar Time Slot</h2>
          <p class="wizard-step-subtitle">Real-time availability synced with our clinical scheduling system.</p>

          <div style="display: grid; grid-template-columns: 320px 1fr; gap: 2.5rem; align-items: flex-start;">
            <!-- Calendar Picker -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 1.5rem;">
              <label class="form-label" for="bookingDateInput">Choose Date</label>
              <input type="date" id="bookingDateInput" class="form-control" style="font-size: 1.05rem; padding: 0.85rem;" required>
              <div style="font-size: 0.82rem; color: #64748b; margin-top: 1rem; line-height: 1.5;">
                💡 <em>Appointments booked for the same day are confirmed instantly. Walk-ins also welcomed for emergencies.</em>
              </div>
            </div>

            <!-- Available Slots Grid -->
            <div>
              <label class="form-label">Available Time Slots for Selected Date</label>
              <div class="slots-grid" id="slotsContainer">
                <!-- Dynamically loaded via AJAX -->
              </div>
            </div>
          </div>
        </div>

        <!-- STEP 4: Patient Information -->
        <div class="wizard-step" data-step="4">
          <h2 class="wizard-step-title">Step 4: Patient Information & Medical Intake</h2>
          <p class="wizard-step-subtitle">Please enter your contact information to receive SMS & email appointment confirmations.</p>

          <!-- Appointment Summary Banner -->
          <div id="bookingSummaryBox"></div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="patientNameInput">Full Legal Name *</label>
              <input type="text" id="patientNameInput" class="form-control" placeholder="Jane Doe" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="patientEmailInput">Email Address (For Confirmation) *</label>
              <input type="email" id="patientEmailInput" class="form-control" placeholder="jane@example.com" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="patientPhoneInput">Mobile Phone (For SMS Reminders) *</label>
              <input type="tel" id="patientPhoneInput" class="form-control" placeholder="+1 (555) 234-5678" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="patientDobInput">Date of Birth (Optional)</label>
              <input type="date" id="patientDobInput" class="form-control">
            </div>
          </div>

          <div style="display: flex; gap: 2rem; margin: 1.25rem 0;">
            <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.92rem; cursor: pointer;">
              <input type="checkbox" id="patientNewCheckbox" checked style="width: 18px; height: 18px;">
              <span>I am a new patient to AuraDent</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.92rem; cursor: pointer; color: #e11d48; font-weight: 600;">
              <input type="checkbox" id="patientEmergencyCheckbox" style="width: 18px; height: 18px;">
              <span>🚨 This is an acute emergency / severe pain</span>
            </label>
          </div>

          <div class="form-group">
            <label class="form-label" for="patientNotesInput">Symptoms, Treatment Goals or Clinical Notes</label>
            <textarea id="patientNotesInput" class="form-control" rows="3" placeholder="Tell us if you have dental anxiety, specific tooth pain, or need wheelchair accessibility..."></textarea>
          </div>
        </div>

        <!-- STEP 5: Instant Confirmation Screen -->
        <div class="wizard-step" data-step="5">
          <div class="confirmation-card">
            <div class="confirm-icon-box">✓</div>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.5rem;">
              Your Appointment is Confirmed!
            </h2>
            <p style="color: #64748b; font-size: 1.1rem; max-width: 600px; margin: 0 auto 1.5rem auto;">
              We have confirmed your appointment reservation. An SMS text and calendar invite have been dispatched.
            </p>

            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Unique Booking Reference</span>
              <div>
                <span class="booking-ref-badge" id="confirmRefBadge">AUR-XXXXX</span>
              </div>
            </div>

            <!-- Details Box -->
            <div id="confirmDetailsWrap" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.5rem; max-width: 550px; margin: 1.5rem auto; text-align: left; font-size: 0.95rem; line-height: 1.8;">
            </div>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
              <a href="#" id="downloadCalBtn" class="btn btn-outline btn-lg">
                📅 Add to Google / Apple Calendar (.ics)
              </a>
              <a href="index.php" class="btn btn-gold btn-lg">
                Return to Home Practice
              </a>
            </div>
          </div>
        </div>

        <!-- Wizard Navigation Buttons -->
        <div class="wizard-footer">
          <button type="button" class="btn btn-outline" id="prevStepBtn" style="display: none;">
            &larr; Previous Step
          </button>
          <div style="margin-left: auto; display: flex; gap: 1rem;">
            <button type="button" class="btn btn-gold btn-lg" id="nextStepBtn">
              Continue to Step 2 &rarr;
            </button>
            <button type="button" class="btn btn-gold btn-lg" id="submitBookingBtn" style="display: none;">
              Confirm & Book Appointment &rarr;
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Include Wizard Script -->
<script src="assets/js/booking.js"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
