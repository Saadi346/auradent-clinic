<?php
$currentPage = 'home';
$pageTitle = 'Aura Dental Atelier | Aesthetic & Surgical Dentistry';
require_once __DIR__ . '/includes/header.php';

$doctors = getActiveDoctors();
$featuredServices = getFeaturedServices();
$reviews = getApprovedReviews(3);
?>

<!-- Hero Section: Modern Asymmetric Atelier -->
<section class="hero-atelier">
  <div class="container">
    <div class="hero-atelier-grid">
      <!-- Left Editorial Column -->
      <div>
        <div class="hero-status-pill">
          <span class="status-dot-pulse"></span>
          <span>Midtown Operatory Open &bull; 8:00 AM – 7:00 PM</span>
        </div>

        <h1 class="hero-atelier-title">
          Where Biological Precision Meets <span class="gold-text">Aesthetic Mastery</span>
        </h1>

        <p class="hero-atelier-desc">
          Step into New York’s premier dental sanctuary. We combine painless computer-regulated Wand® anesthesia, zero-radiation 3D optical diagnostics, and artisanal Swiss ceramic artistry to deliver restorative dental medicine without fear.
        </p>

        <div class="hero-cta-group">
          <a href="booking.php" class="btn btn-gold btn-lg">
            <span>📅</span>
            <span>Book Your Appointment</span>
          </a>
          <a href="gallery.php" class="btn btn-outline btn-lg">
            <span>View Clinical Transformations &rarr;</span>
          </a>
        </div>

        <!-- 3 Luxury Sensory Amenities -->
        <div class="hero-amenities-strip">
          <div class="amenity-chip">
            <span class="icon">🕊️</span>
            <span>Zero Syringe Fear<br><small style="color: #64748b; font-weight: 400;">The Wand® Anesthesia</small></span>
          </div>
          <div class="amenity-chip">
            <span class="icon">🔬</span>
            <span>No Impression Goo<br><small style="color: #64748b; font-weight: 400;">iTero 5D Optical 3D</small></span>
          </div>
          <div class="amenity-chip">
            <span class="icon">🎧</span>
            <span>Sensory Comfort<br><small style="color: #64748b; font-weight: 400;">Bose® Audio & Netflix</small></span>
          </div>
        </div>
      </div>

      <!-- Right Visual Column with On-Call Specialist Widget -->
      <div class="hero-visual-card">
        <div class="hero-card-frame">
          <img src="assets/images/hero-clinic.jpg" alt="Aura Dental Atelier Modern Suite" width="600" height="480">
        </div>

        <!-- Floating Live Doctor Schedule Widget -->
        <div class="hero-floating-slot">
          <div class="slot-indicator">
            <img src="assets/images/doctor-sarah.jpg" alt="Dr. Sarah Jensen" class="slot-avatar">
            <div class="slot-info">
              <h5>Dr. Sarah Jensen, DDS</h5>
              <p>Clinical Director &bull; Harvard Dental</p>
            </div>
          </div>
          <div>
            <a href="booking.php?doctor=1" class="btn btn-gold btn-sm" style="font-size: 0.8rem; padding: 0.4rem 0.9rem;">
              Book Today &rarr;
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Interactive Smile Goals Concierge -->
<section class="concierge-section">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Interactive Smile Concierge</div>
      <h2 class="section-title">What is Your Primary Dental Goal?</h2>
      <p class="section-subtitle">
        Select your objective below to review tailored clinical pathways, expected timelines, and transparent fee schedules.
      </p>
    </div>

    <!-- Concierge Interactive Tabs -->
    <div class="concierge-tabs-nav">
      <button type="button" class="concierge-tab-btn active" data-goal="veneers">
        <span>💎</span>
        <span>Aesthetic Smile Makeover</span>
      </button>
      <button type="button" class="concierge-tab-btn" data-goal="implants">
        <span>🔩</span>
        <span>Restore Missing Teeth</span>
      </button>
      <button type="button" class="concierge-tab-btn" data-goal="aligners">
        <span>🦷</span>
        <span>Discreet Straightening</span>
      </button>
      <button type="button" class="concierge-tab-btn" data-goal="emergency">
        <span>🚨</span>
        <span>Acute Pain Relief</span>
      </button>
    </div>

    <!-- Panel 1: Veneers & Makeovers -->
    <div class="concierge-panel active" data-goal="veneers">
      <div style="background: var(--color-alabaster); border: 1px solid var(--color-slate-200); border-radius: 20px; padding: 2.5rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 2.5rem; align-items: center;">
        <div>
          <div style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); text-transform: uppercase; margin-bottom: 0.35rem;">Aesthetic Cosmetic Suite</div>
          <h3 style="font-size: 1.8rem; color: var(--color-obsidian); margin-bottom: 0.85rem;">Handcrafted Ultra-Thin Porcelain Veneers</h3>
          <p style="color: #64748b; font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">
            Custom sculpted by our master ceramists using high-translucency e.max lithium disilicate. Designed to permanently eliminate gaps, chips, uneven proportions, and stubborn tetracycline stains in only two comfortable appointments.
          </p>
          <div style="display: flex; gap: 2rem; font-size: 0.92rem; margin-bottom: 1.5rem;">
            <div><strong>Starting Fee:</strong> <span style="color: var(--color-gold-dark); font-weight: 800;">$950 / tooth</span></div>
            <div><strong>Treatment Time:</strong> <span style="font-weight: 700;">2 Visits (10 Days)</span></div>
          </div>
          <a href="booking.php?service=2" class="btn btn-gold">
            Book Smile Consultation &rarr;
          </a>
        </div>
        <div>
          <div style="border-radius: 14px; overflow: hidden; box-shadow: var(--shadow-md); border: 3px solid #fff;">
            <img src="assets/images/smile-transformation.jpg" alt="Porcelain Veneers Before and After" style="width: 100%; height: 260px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>

    <!-- Panel 2: Implants & All-on-4 -->
    <div class="concierge-panel" data-goal="implants">
      <div style="background: var(--color-alabaster); border: 1px solid var(--color-slate-200); border-radius: 20px; padding: 2.5rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 2.5rem; align-items: center;">
        <div>
          <div style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); text-transform: uppercase; margin-bottom: 0.35rem;">Surgical Prosthodontics</div>
          <h3 style="font-size: 1.8rem; color: var(--color-obsidian); margin-bottom: 0.85rem;">3D Computer-Guided Dental Implants & All-on-4</h3>
          <p style="color: #64748b; font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">
            Permanent titanium and Swiss zirconia root replacements with 99.4% clinical integration success. From single missing molars to same-day full-arch permanent bridges, regain 100% natural chewing strength.
          </p>
          <div style="display: flex; gap: 2rem; font-size: 0.92rem; margin-bottom: 1.5rem;">
            <div><strong>Starting Fee:</strong> <span style="color: var(--color-gold-dark); font-weight: 800;">$1,850.00</span></div>
            <div><strong>Lead Surgeon:</strong> <span style="font-weight: 700;">Dr. Marcus Vance (Columbia)</span></div>
          </div>
          <a href="booking.php?service=3" class="btn btn-gold">
            Book 3D Implant Consultation &rarr;
          </a>
        </div>
        <div>
          <div style="border-radius: 14px; overflow: hidden; box-shadow: var(--shadow-md); border: 3px solid #fff;">
            <img src="assets/images/hero-clinic.jpg" alt="Guided Implant Suite" style="width: 100%; height: 260px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>

    <!-- Panel 3: Aligners -->
    <div class="concierge-panel" data-goal="aligners">
      <div style="background: var(--color-alabaster); border: 1px solid var(--color-slate-200); border-radius: 20px; padding: 2.5rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 2.5rem; align-items: center;">
        <div>
          <div style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); text-transform: uppercase; margin-bottom: 0.35rem;">Invisible Orthodontics</div>
          <h3 style="font-size: 1.8rem; color: var(--color-obsidian); margin-bottom: 0.85rem;">Invisalign® Diamond Premier Provider</h3>
          <p style="color: #64748b; font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">
            Straighten crowded teeth, close gaps, and balance your bite without unsightly metal brackets or dietary restrictions. Visual 3D simulation reveals your finished smile before you even start wearing aligners.
          </p>
          <div style="display: flex; gap: 2rem; font-size: 0.92rem; margin-bottom: 1.5rem;">
            <div><strong>Starting Investment:</strong> <span style="color: var(--color-gold-dark); font-weight: 800;">$2,800.00</span></div>
            <div><strong>Monthly Plan:</strong> <span style="font-weight: 700;">$119 / mo (0% APR)</span></div>
          </div>
          <a href="booking.php?service=5" class="btn btn-gold">
            Book 3D Optical Scan &rarr;
          </a>
        </div>
        <div>
          <div style="border-radius: 14px; overflow: hidden; box-shadow: var(--shadow-md); border: 3px solid #fff;">
            <img src="assets/images/smile-transformation.jpg" alt="Invisalign Aligners" style="width: 100%; height: 260px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>

    <!-- Panel 4: Emergency -->
    <div class="concierge-panel" data-goal="emergency">
      <div style="background: #fff1f2; border: 1px solid #fecdd3; border-radius: 20px; padding: 2.5rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 2.5rem; align-items: center;">
        <div>
          <div style="font-size: 0.8rem; font-weight: 700; color: #be123c; text-transform: uppercase; margin-bottom: 0.35rem;">Urgent Clinical Triage</div>
          <h3 style="font-size: 1.8rem; color: #881337; margin-bottom: 0.85rem;">Same-Day Emergency Pain Relief & Tooth Repair</h3>
          <p style="color: #9f1239; font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">
            Severe throbbing toothache, knocked-out tooth, broken crown, or abscess swelling? We hold emergency appointments open every morning and evening.
          </p>
          <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_EMERGENCY_PHONE) ?>" class="btn btn-danger btn-lg">
              📞 Emergency Hotline: <?= APP_EMERGENCY_PHONE ?>
            </a>
            <a href="booking.php?service=10" class="btn btn-outline btn-lg" style="background: #ffffff;">
              Book Fast-Track Slot
            </a>
          </div>
        </div>
        <div style="text-align: center; padding: 1.5rem; background: #ffffff; border-radius: 14px; border: 1px solid #fecdd3;">
          <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🚨</div>
          <h4 style="color: #881337; margin-bottom: 0.35rem;">Average Wait Time</h4>
          <div style="font-size: 2rem; font-weight: 800; color: #be123c;">Under 30 Mins</div>
          <p style="font-size: 0.82rem; color: #64748b; margin: 0;">For registered priority emergencies</p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- The Atelier Sensory Experience Bento Grid -->
<section class="bento-section">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">The Atelier Standard</div>
      <h2 class="section-title">Engineered Around Patient Dignity</h2>
      <p class="section-subtitle">
        Four clinical pillars that eliminate stress, optimize healing biological outcomes, and redefine the dental visit.
      </p>
    </div>

    <div class="bento-grid">
      <!-- Bento 1: Large Dark Card -->
      <div class="bento-card dark bento-col-8">
        <div>
          <div class="bento-icon">🕊️</div>
          <div style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); text-transform: uppercase; margin-bottom: 0.35rem;">Milestone Innovation</div>
          <h3 style="font-size: 1.85rem; margin-bottom: 0.85rem;">The Computer-Controlled Wand® Anesthesia</h3>
          <p style="font-size: 1.05rem; line-height: 1.7; max-width: 650px;">
            Traditional dental injections cause discomfort because anesthetic is forced manually with rapid tissue pressure. The Wand® utilizes a microprocessor to deliver anesthetic molecule by molecule below the nerve pain-threshold, resulting in virtually imperceptible numbing.
          </p>
        </div>
        <div style="margin-top: 2rem; display: flex; gap: 2rem; flex-wrap: wrap; padding-top: 1.5rem; border-top: 1px solid rgba(255, 255, 255, 0.1);">
          <div>
            <div style="font-size: 1.8rem; font-weight: 800; color: var(--color-gold-light);">99.8%</div>
            <div style="font-size: 0.82rem; color: #94a3b8;">Zero Injection Pain Reported</div>
          </div>
          <div>
            <div style="font-size: 1.8rem; font-weight: 800; color: #38bdf8;">0 Numb Face</div>
            <div style="font-size: 0.82rem; color: #94a3b8;">Localized Single-Tooth Anesthesia</div>
          </div>
        </div>
      </div>

      <!-- Bento 2: Optical 3D -->
      <div class="bento-card bento-col-4">
        <div>
          <div class="bento-icon">🔬</div>
          <h3 style="font-size: 1.35rem; margin-bottom: 0.65rem;">Goo-Free Optical 3D Impressions</h3>
          <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6;">
            Say goodbye to gag-inducing impression paste. Our iTero 5D scanners take 6,000 photographic frames per second to render micron-accurate 3D models of your teeth.
          </p>
        </div>
        <div style="margin-top: 1.5rem;">
          <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-gold-dark);">Sub-Micron Precision &rarr;</span>
        </div>
      </div>

      <!-- Bento 3: Sensory Comfort -->
      <div class="bento-card bento-col-4">
        <div>
          <div class="bento-icon">🛋️</div>
          <h3 style="font-size: 1.35rem; margin-bottom: 0.65rem;">Acoustic & Sensory Spa Suite</h3>
          <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6;">
            Every dental operatory is equipped with heated memory foam, Bose® active noise cancellation, ceiling streaming screens, and lavender organic aromatherapy.
          </p>
        </div>
        <div style="margin-top: 1.5rem;">
          <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-gold-dark);">Total Body Relaxation &rarr;</span>
        </div>
      </div>

      <!-- Bento 4: Cleanroom Protocols -->
      <div class="bento-card bento-col-8">
        <div>
          <div class="bento-icon">🛡️</div>
          <h3 style="font-size: 1.5rem; margin-bottom: 0.65rem;">Hospital Cleanroom Sterilization Standards</h3>
          <p style="font-size: 0.98rem; color: #64748b; line-height: 1.65;">
            Our instruments undergo 4-stage ultrasonic debridement and Class-B vacuum sterilization exceeding CDC, OSHA, and surgical theater guidelines. Continuous negative-pressure HEPA-14 medical filtration recycles operatory air every 6 minutes.
          </p>
        </div>
        <div style="margin-top: 1.5rem; display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap;">
          <span style="background: var(--color-alabaster); padding: 0.4rem 0.85rem; border-radius: 8px; font-size: 0.82rem; font-weight: 700; border: 1px solid var(--color-slate-200);">✓ Class-B Autoclaves</span>
          <span style="background: var(--color-alabaster); padding: 0.4rem 0.85rem; border-radius: 8px; font-size: 0.82rem; font-weight: 700; border: 1px solid var(--color-slate-200);">✓ Daily Biological Spore Testing</span>
          <span style="background: var(--color-alabaster); padding: 0.4rem 0.85rem; border-radius: 8px; font-size: 0.82rem; font-weight: 700; border: 1px solid var(--color-slate-200);">✓ OSHA Verified</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Before & After Interactive Stage -->
<section class="ba-section">
  <div class="container">
    <div class="section-header">
      <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Clinical Proof</div>
      <h2 class="section-title">Inspect Actual Patient Transformations</h2>
      <p class="section-subtitle" style="color: #94a3b8;">
        Slide left and right to examine the natural enamel translucency and biological harmony achieved with our handcrafted ceramic veneers.
      </p>
    </div>

    <!-- Draggable Slider -->
    <div class="ba-slider-container">
      <div class="ba-slider-wrapper">
        <div class="ba-layer ba-after-layer">
          <img src="assets/images/case-veneers-after.svg" alt="Post-Operative Veneers Result">
        </div>
        <div class="ba-layer ba-before-layer">
          <img src="assets/images/case-veneers-before.svg" alt="Pre-Operative Baseline">
        </div>
        <div class="ba-divider"></div>
        <div class="ba-handle">&#8644;</div>
        <input type="range" min="0" max="100" value="50" class="ba-range-input" aria-label="Before and after split slider">
        <span class="ba-badge ba-badge-before">PRE-OP BASELINE</span>
        <span class="ba-badge ba-badge-after">POST-OP RESULT</span>
      </div>
    </div>

    <div style="text-align: center; margin-top: 3rem;">
      <a href="gallery.php" class="btn btn-gold btn-lg">
        Explore Complete Before & After Case Studies &rarr;
      </a>
    </div>
  </div>
</section>

<!-- Meet Lead Specialists -->
<section style="padding: 6rem 0; background: #ffffff;">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Clinical Faculty</div>
      <h2 class="section-title">Harvard & Columbia Trained Doctors</h2>
      <p class="section-subtitle">
        Our clinicians are published educators, fellowship-trained surgeons, and compassionate listeners.
      </p>
    </div>

    <div class="doctors-grid">
      <?php foreach (array_slice($doctors, 0, 4) as $doc): ?>
        <div class="doctor-card">
          <div class="doctor-avatar-wrap">
            <img src="<?= htmlspecialchars($doc['avatar_url']) ?>" alt="<?= htmlspecialchars($doc['name']) ?>">
            <span class="doctor-exp-badge"><?= $doc['experience_years'] ?>+ Yrs Exp</span>
          </div>
          <div class="doctor-info">
            <div class="doctor-specialty"><?= htmlspecialchars($doc['specialty']) ?></div>
            <h3 class="doctor-name"><?= htmlspecialchars($doc['name']) ?></h3>
            <div class="doctor-quals"><?= htmlspecialchars($doc['qualifications']) ?></div>
            <p class="doctor-bio"><?= htmlspecialchars(mb_strimwidth($doc['bio'], 0, 110, '...')) ?></p>
            <div class="doctor-schedule-meta">
              <span>⏰ <?= htmlspecialchars($doc['schedule_days']) ?></span>
            </div>
            <a href="booking.php?doctor=<?= $doc['id'] ?>" class="btn btn-outline btn-sm" style="width: 100%;">
              Book with <?= explode(' ', $doc['name'])[1] ?? 'Doctor' ?>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align: center; margin-top: 3rem;">
      <a href="dentists.php" class="btn btn-obsidian btn-lg">
        Meet All 5 Board Specialists &rarr;
      </a>
    </div>
  </div>
</section>

<script src="assets/js/before-after.js"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
