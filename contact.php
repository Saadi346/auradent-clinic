<?php
$currentPage = 'contact';
$pageTitle = 'Contact Us, Office Location & Emergency Hours | Aura Atelier';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contact Hero -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">We Are Here For You</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      Get in Touch with Our Patient Concierge Team
    </h1>
    <p style="max-width: 720px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      Have a question regarding insurance, treatment feasibility, or seeking emergency same-day dental care? Our care coordinators respond within 2 hours.
    </p>
  </div>
</div>

<!-- Contact Info & Form Section (Phone Screen Friendly Flex-Wrap) -->
<section style="padding: 5rem 0 6rem; background: var(--color-alabaster);">
  <div class="container">
    <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: flex-start;">
      
      <!-- Left: Contact Details & Hours -->
      <div style="flex: 1 1 380px;">
        <div class="section-tag">Direct Coordinates</div>
        <h2 style="font-size: 2rem; margin-bottom: 1.5rem; color: var(--color-obsidian);">Our Midtown Practice</h2>

        <div style="display: flex; flex-direction: column; gap: 1.5rem; margin-bottom: 2.5rem;">
          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(197, 160, 89, 0.12); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">📍</div>
            <div>
              <div style="font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Address</div>
              <div style="font-size: 1.05rem; font-weight: 600; color: var(--color-obsidian);"><?= APP_ADDRESS ?></div>
              <div style="font-size: 0.85rem; color: #64748b;">Grand Central Station & Lexington Ave Subway Accessible</div>
            </div>
          </div>

          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(197, 160, 89, 0.12); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">📞</div>
            <div>
              <div style="font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Appointments & Inquiries</div>
              <div style="font-size: 1.05rem; font-weight: 600; color: var(--color-obsidian);">
                <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_PHONE) ?>"><?= APP_PHONE ?></a>
              </div>
            </div>
          </div>

          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(244, 63, 94, 0.1); color: #f43f5e; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">🚨</div>
            <div>
              <div style="font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">24/7 Dental Emergency Line</div>
              <div style="font-size: 1.05rem; font-weight: 700; color: #e11d48;">
                <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_EMERGENCY_PHONE) ?>"><?= APP_EMERGENCY_PHONE ?></a>
              </div>
            </div>
          </div>

          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(5, 150, 105, 0.1); color: var(--color-emerald); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">✉️</div>
            <div>
              <div style="font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Email Concierge</div>
              <div style="font-size: 1.05rem; font-weight: 600; color: var(--color-obsidian);"><?= APP_EMAIL ?></div>
            </div>
          </div>
        </div>

        <!-- Operating Hours Card -->
        <div style="background: #ffffff; border: 1px solid var(--color-slate-200); border-radius: 14px; padding: 1.75rem; box-shadow: var(--shadow-sm);">
          <h4 style="font-size: 1.15rem; color: var(--color-obsidian); margin-bottom: 1rem;">Clinical Hours of Operation</h4>
          <div style="display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.92rem;">
            <div style="display: flex; justify-content: space-between;"><span>Monday – Thursday</span><strong style="color: var(--color-obsidian);">8:00 AM – 7:00 PM</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Friday</span><strong style="color: var(--color-obsidian);">8:00 AM – 6:00 PM</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Saturday</span><strong style="color: var(--color-obsidian);">9:00 AM – 4:00 PM</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Sunday</span><strong style="color: var(--color-gold-dark);">Emergency On-Call</strong></div>
          </div>
        </div>
      </div>

      <!-- Right: Contact Inquiry Form -->
      <div style="flex: 1 1 450px; background: #ffffff; border-radius: 18px; border: 1px solid var(--color-slate-200); padding: clamp(1.5rem, 3vw, 2.8rem); box-shadow: var(--shadow-md);">
        <h3 style="font-size: 1.6rem; margin-bottom: 0.5rem; color: var(--color-obsidian);">Send an Inquiry</h3>
        <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 2rem;">
          Our medical care coordinators will review your questions and contact you promptly.
        </p>

        <form id="contactInquiryForm">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="contactName">Your Full Name *</label>
              <input type="text" id="contactName" class="form-control" placeholder="Johnathan Doe" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="contactPhone">Phone Number *</label>
              <input type="tel" id="contactPhone" class="form-control" placeholder="+1 (555) 000-0000" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="contactEmail">Email Address *</label>
            <input type="email" id="contactEmail" class="form-control" placeholder="john@example.com" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="contactSubject">Subject of Inquiry</label>
            <select id="contactSubject" class="form-control">
              <option value="New Patient Consultation">New Patient Consultation</option>
              <option value="Cosmetic Veneers / Smile Makeover">Cosmetic Veneers / Smile Makeover</option>
              <option value="Dental Implants & All-on-4">Dental Implants & All-on-4</option>
              <option value="Invisalign Orthodontics">Invisalign Orthodontics</option>
              <option value="Insurance Coverage Verification">Insurance Coverage Verification</option>
              <option value="Other Question">Other Question</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label" for="contactMessage">How Can We Help You? *</label>
            <textarea id="contactMessage" class="form-control" rows="4" placeholder="Please describe any symptoms, treatments you are interested in, or preferred times..." required></textarea>
          </div>

          <div id="contactSuccessMsg" style="display: none; padding: 0.9rem; background: #d1fae5; color: #065f46; border-radius: 8px; font-size: 0.9rem; margin-bottom: 1.25rem;"></div>

          <button type="submit" id="submitContactBtn" class="btn btn-gold btn-lg" style="width: 100%;">
            Send Message &rarr;
          </button>
        </form>
      </div>

    </div>

    <!-- Map & Transit Container -->
    <div style="margin-top: 4.5rem; background: #ffffff; border-radius: 18px; border: 1px solid var(--color-slate-200); overflow: hidden; box-shadow: var(--shadow-sm);">
      <div style="padding: 1.5rem 2rem; border-bottom: 1px solid var(--color-slate-200); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <div>
          <h4 style="font-size: 1.2rem; color: var(--color-obsidian); margin-bottom: 0.25rem;">Interactive Location & Transit</h4>
          <p style="font-size: 0.88rem; color: #64748b; margin: 0;">Located inside the iconic 450 Lexington Medical Building with direct valet parking.</p>
        </div>
        <a href="https://maps.google.com" target="_blank" rel="noopener" class="btn btn-outline btn-sm">
          Open in Google Maps &rarr;
        </a>
      </div>
      <div style="width: 100%; height: 320px; background: var(--color-obsidian); display: flex; align-items: center; justify-content: center; position: relative;">
        <div style="text-align: center; color: #ffffff; z-index: 2; padding: 1.5rem;">
          <div style="font-size: 2.8rem; margin-bottom: 0.5rem;">📍</div>
          <h3 style="font-size: 1.35rem; font-weight: 700;">Aura Dental Atelier & Implant Institute</h3>
          <p style="color: #94a3b8; font-size: 0.95rem;">450 Lexington Ave, Suite 1200, New York, NY 10017</p>
        </div>
        <div style="position: absolute; inset: 0; background: radial-gradient(circle at center, rgba(197, 160, 89, 0.2), transparent 70%);"></div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contactInquiryForm');
  const btn = document.getElementById('submitContactBtn');
  const msgBox = document.getElementById('contactSuccessMsg');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    btn.disabled = true;
    btn.textContent = 'Transmitting Message...';

    const payload = {
      name: document.getElementById('contactName').value.trim(),
      phone: document.getElementById('contactPhone').value.trim(),
      email: document.getElementById('contactEmail').value.trim(),
      subject: document.getElementById('contactSubject').value,
      message: document.getElementById('contactMessage').value.trim()
    };

    fetch('api/contact_submit.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
      btn.disabled = false;
      btn.textContent = 'Send Message →';
      if (data.success) {
        msgBox.textContent = data.message;
        msgBox.style.display = 'block';
        form.reset();
      } else {
        alert(data.message || 'Error sending inquiry');
      }
    })
    .catch(err => {
      btn.disabled = false;
      btn.textContent = 'Send Message →';
      alert('Network error');
    });
  });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
