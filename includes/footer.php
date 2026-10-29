<?php
/**
 * Aura Dental Atelier - Luxury Obsidian & Gold Footer
 */
?>
  <!-- Site Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <!-- Brand Info -->
        <div class="footer-brand">
          <div class="brand-island" style="color: #ffffff; margin-bottom: 1.25rem;">
            <div class="brand-crest">💎</div>
            <div class="brand-title">
              <span class="brand-name">AURA <span class="gold-text">ATELIER</span></span>
              <span class="brand-sub">Dental Medicine & Implants</span>
            </div>
          </div>
          <p class="footer-desc">
            Redefining contemporary oral healthcare with boutique hospitality, painless computer-regulated anesthesia, and Ivy League trained clinical specialists.
          </p>
          <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
            <span style="background: rgba(255,255,255,0.06); padding: 0.35rem 0.75rem; border-radius: 6px; font-size: 0.75rem; border: 1px solid rgba(255,255,255,0.1); color: var(--color-gold-light);">🏆 ADA Member</span>
            <span style="background: rgba(255,255,255,0.06); padding: 0.35rem 0.75rem; border-radius: 6px; font-size: 0.75rem; border: 1px solid rgba(255,255,255,0.1); color: var(--color-gold-light);">🌟 AACD Fellow</span>
            <span style="background: rgba(255,255,255,0.06); padding: 0.35rem 0.75rem; border-radius: 6px; font-size: 0.75rem; border: 1px solid rgba(255,255,255,0.1); color: var(--color-gold-light);">🔬 3D Guided</span>
          </div>
        </div>

        <!-- Navigation Links -->
        <div>
          <h4 class="footer-title">Practice Portals</h4>
          <ul class="footer-links">
            <li><a href="index.php">Home Practice</a></li>
            <li><a href="about.php">The Atelier & Philosophy</a></li>
            <li><a href="services.php">Procedures & Specializations</a></li>
            <li><a href="dentists.php">Specialist Doctors Roster</a></li>
            <li><a href="gallery.php">Smile Gallery (Before & After)</a></li>
            <li><a href="pricing.php">Pricing & VIP Membership</a></li>
            <li><a href="reviews.php">Verified Patient Stories</a></li>
            <li><a href="contact.php">Office Coordinates & Map</a></li>
            <li><a href="booking.php">Online Booking Engine</a></li>
          </ul>
        </div>

        <!-- Working Hours -->
        <div>
          <h4 class="footer-title">Consultation Hours</h4>
          <div class="footer-hours-row">
            <span>Monday – Thursday</span>
            <span style="color: #ffffff; font-weight: 600;">8:00 AM – 7:00 PM</span>
          </div>
          <div class="footer-hours-row">
            <span>Friday</span>
            <span style="color: #ffffff; font-weight: 600;">8:00 AM – 6:00 PM</span>
          </div>
          <div class="footer-hours-row">
            <span>Saturday</span>
            <span style="color: #ffffff; font-weight: 600;">9:00 AM – 4:00 PM</span>
          </div>
          <div class="footer-hours-row">
            <span>Sunday</span>
            <span style="color: var(--color-gold-light); font-weight: 600;">Emergency On-Call</span>
          </div>
          <div style="margin-top: 1.5rem;">
            <a href="booking.php" class="btn btn-gold btn-sm" style="width: 100%;">
              Check Real-Time Slots
            </a>
          </div>
        </div>

        <!-- Office Coordinates -->
        <div>
          <h4 class="footer-title">Midtown Coordinates</h4>
          <p style="font-size: 0.9rem; margin-bottom: 0.8rem; line-height: 1.6;">
            📍 <?= APP_ADDRESS ?><br>
            📞 Phone: <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_PHONE) ?>" style="color: var(--color-gold-light);"><?= APP_PHONE ?></a><br>
            🚨 Emergency: <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_EMERGENCY_PHONE) ?>" style="color: #f43f5e;"><?= APP_EMERGENCY_PHONE ?></a><br>
            ✉️ Email: <?= APP_EMAIL ?>
          </p>
          <div style="background: rgba(255, 255, 255, 0.05); padding: 0.85rem 1rem; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.08);">
            <div style="font-size: 0.78rem; font-weight: 700; color: #ffffff; margin-bottom: 0.25rem;">Patient Assurance</div>
            <div style="font-size: 0.78rem; color: #94a3b8;">100% HIPAA compliant clinical records & sterilization telemetry.</div>
          </div>
        </div>
      </div>

      <!-- Bottom Bar -->
      <div class="footer-bottom">
        <div>
          &copy; <?= date('Y') ?> Aura Dental Atelier & Implant Institute. All rights reserved. HIPAA & OSHA Verified.
        </div>
        <div style="display: flex; gap: 1.5rem;">
          <a href="about.php#privacy">Privacy Policy</a>
          <a href="about.php#terms">Patient Rights</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="assets/js/main.js"></script>
</body>
</html>
