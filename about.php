<?php
$currentPage = 'about';
$pageTitle = 'The Atelier & Technology | Aura Dental Atelier';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Header -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Pioneering Painless Dentistry</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.2rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      Where Clinical Mastery Meets Human Empathy
    </h1>
    <p style="max-width: 700px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      Founded on the principle that dental care should be restorative, calming, and completely free of dread, Aura Dental Atelier is transforming dental experiences across New York.
    </p>
  </div>
</div>

<!-- Story Section -->
<section style="padding: 6rem 0; background: #ffffff;">
  <div class="container">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
      <div>
        <div class="section-tag">Our Founding Story</div>
        <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem;">Designed by Clinicians Who Listened to Patient Fears</h2>
        <p style="color: #475569; font-size: 1.05rem; line-height: 1.8; margin-bottom: 1.2rem;">
          Over 60% of adults experience severe dental anxiety or delay life-saving dental treatments because of past traumatic experiences, clinical smells, or fear of injections.
        </p>
        <p style="color: #475569; font-size: 1.05rem; line-height: 1.8; margin-bottom: 1.5rem;">
          In 2011, Dr. Sarah Jensen founded Aura Atelier with a revolutionary vision: eliminate every single stress-inducing trigger from the dental visit. By pairing computer-regulated anesthesia delivery with calming boutique interior architecture, we replaced sterile anxiety with spa-level tranquility.
        </p>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--color-slate-200);">
          <div>
            <div style="font-family: var(--font-display); font-size: 1.8rem; font-weight: 800; color: var(--color-gold-dark);">14,000+</div>
            <div style="font-size: 0.88rem; color: #64748b;">Patients Treated with Zero Phobia</div>
          </div>
          <div>
            <div style="font-family: var(--font-display); font-size: 1.8rem; font-weight: 800; color: var(--color-obsidian);">100% Digital</div>
            <div style="font-size: 0.88rem; color: #64748b;">Goo-Free Optical Scanning</div>
          </div>
        </div>
      </div>
      <div>
        <div style="border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-xl); border: 5px solid #ffffff;">
          <img src="assets/images/doctor-sarah.jpg" alt="Dr. Sarah Jensen" style="width: 100%; height: 500px; object-fit: cover;">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 4 Pillars of Care -->
<section style="padding: 6rem 0; background: var(--color-alabaster);">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Our Philosophy</div>
      <h2 class="section-title">The Four Pillars of the Atelier Standard</h2>
      <p class="section-subtitle">
        Every protocol in our clinic is engineered around patient dignity, total comfort, and verifiable clinical longevity.
      </p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 2rem;">
      <div style="background: #ffffff; padding: 2.2rem; border-radius: 16px; border: 1px solid var(--color-slate-200); box-shadow: var(--shadow-sm);">
        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🕊️</div>
        <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem;">1. Pain-Free Promise</h3>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.65;">
          We utilize computer-controlled Wand® anesthesia that delivers local numbing below the human pain-perception threshold, eliminating traditional syringes.
        </p>
      </div>

      <div style="background: #ffffff; padding: 2.2rem; border-radius: 16px; border: 1px solid var(--color-slate-200); box-shadow: var(--shadow-sm);">
        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🔬</div>
        <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem;">2. 3D Guided Precision</h3>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.65;">
          Green CBCT imaging maps your bone, nerves, and tooth anatomy in high-definition 3D with 90% less radiation than standard dental CT scanners.
        </p>
      </div>

      <div style="background: #ffffff; padding: 2.2rem; border-radius: 16px; border: 1px solid var(--color-slate-200); box-shadow: var(--shadow-sm);">
        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🛋️</div>
        <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem;">3. Sensory Relaxation</h3>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.65;">
          Memory foam dental suites equipped with Bose noise-canceling headsets, overhead streaming screens, calming organic aromatherapy, and warm face towels.
        </p>
      </div>

      <div style="background: #ffffff; padding: 2.2rem; border-radius: 16px; border: 1px solid var(--color-slate-200); box-shadow: var(--shadow-sm);">
        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🛡️</div>
        <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem;">4. Hospital Sterilization</h3>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.65;">
          Class-B vacuum autoclaves, HEPA-14 medical air purification cycles, and surgical operatory hygiene protocols exceeding CDC & OSHA benchmarks.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Technology Spotlight -->
<section style="padding: 6rem 0; background: #ffffff;">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Cutting-Edge Equipment</div>
      <h2 class="section-title">Technology That Redefines Outcomes</h2>
      <p class="section-subtitle">
        We invest relentlessly in leading-edge dental engineering so treatments are faster, less invasive, and biologically durable.
      </p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
      <div style="border: 1px solid var(--color-slate-200); border-radius: 14px; padding: 1.8rem; background: var(--color-alabaster);">
        <h4 style="font-size: 1.15rem; color: var(--color-obsidian); margin-bottom: 0.5rem;">iTero Element 5D Optical Scanner</h4>
        <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">
          Replaces sticky, gag-inducing impression goop with an ultra-accurate 6,000 frames-per-second optical camera, rendering 3D simulations of your teeth instantly.
        </p>
      </div>

      <div style="border: 1px solid var(--color-slate-200); border-radius: 14px; padding: 1.8rem; background: var(--color-alabaster);">
        <h4 style="font-size: 1.15rem; color: var(--color-obsidian); margin-bottom: 0.5rem;">Biolase® WaterLase Laser</h4>
        <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">
          Allows cavity preparations and gum contouring without the sound, vibration, or heat of conventional drills, often requiring zero anesthetic injections.
        </p>
      </div>

      <div style="border: 1px solid var(--color-slate-200); border-radius: 14px; padding: 1.8rem; background: var(--color-alabaster);">
        <h4 style="font-size: 1.15rem; color: var(--color-obsidian); margin-bottom: 0.5rem;">Zeiss OPMI Surgical Microscope</h4>
        <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">
          Magnifies root canal anatomies up to 25x with brilliant xenon illumination, ensuring microscopic infections are eliminated with 99.2% preservation success.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- FAQs Section -->
<section style="padding: 6rem 0; background: var(--color-alabaster);">
  <div class="container" style="max-width: 800px;">
    <div class="section-header">
      <div class="section-tag">Got Questions?</div>
      <h2 class="section-title">Frequently Asked Questions</h2>
    </div>

    <div style="display: flex; flex-direction: column; gap: 1rem;">
      <div style="background: #ffffff; border: 1px solid var(--color-slate-200); border-radius: 12px; padding: 1.5rem;">
        <h4 style="font-size: 1.1rem; color: var(--color-obsidian); margin-bottom: 0.5rem;">I suffer from severe dental anxiety. How can you help me?</h4>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
          You are never alone. We offer gentle sedation options ranging from nitrous oxide (laughing gas) to oral conscious sedation. Our team walks you through every step at your own pace—you hold a stop button during treatment, giving you complete control.
        </p>
      </div>

      <div style="background: #ffffff; border: 1px solid var(--color-slate-200); border-radius: 12px; padding: 1.5rem;">
        <h4 style="font-size: 1.1rem; color: var(--color-obsidian); margin-bottom: 0.5rem;">How quickly can I be seen for a dental emergency?</h4>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
          We reserve emergency walk-in slots every morning and afternoon. When you call our emergency hotline (+1 800-911-SMILE), our triage dentist can typically accommodate you within 1 to 2 hours.
        </p>
      </div>

      <div style="background: #ffffff; border: 1px solid var(--color-slate-200); border-radius: 12px; padding: 1.5rem;">
        <h4 style="font-size: 1.1rem; color: var(--color-obsidian); margin-bottom: 0.5rem;">Do you accept dental insurance?</h4>
        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
          Yes! We work with Delta Dental, MetLife, Cigna, Aetna, Guardian, BlueCross, and many others. We also offer direct insurance billing and in-house 0% financing for out-of-pocket procedures.
        </p>
      </div>
    </div>

    <div style="text-align: center; margin-top: 3rem;">
      <a href="booking.php" class="btn btn-gold btn-lg">
        Schedule Your First Consultation &rarr;
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
