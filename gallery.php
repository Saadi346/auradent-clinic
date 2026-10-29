<?php
$currentPage = 'gallery';
$pageTitle = 'Smile Gallery | Real Before & After Case Studies';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Gallery Hero -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Clinical Outcomes</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      Real Smile Makeovers, Lasting Confidence
    </h1>
    <p style="max-width: 720px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      Inspect actual clinical transformations created by our master ceramists, prosthodontists, and dental surgeons. No artificial filters—just biological precision and high-translucency Swiss artistry.
    </p>
  </div>
</div>

<!-- Main Interactive Slider Showcase -->
<section style="padding: 5.5rem 0; background: #080c14; color: #ffffff; border-bottom: 1px solid rgba(197, 160, 89, 0.2);">
  <div class="container">
    <div class="section-header">
      <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Featured Interactive Stage</div>
      <h2 class="section-title" id="featuredCaseTitle" style="color: #ffffff;">Case #101: 8 Handcrafted e.max® Porcelain Veneers</h2>
      <p class="section-subtitle" id="featuredCaseDesc" style="color: #94a3b8; max-width: 750px; margin: 0 auto 2rem auto;">
        Patient presented with severe tetracycline banding and chipped incisal edges. Dr. Sarah Jensen designed eight micro-thin lithium disilicate laminates restoring golden proportion harmony. Drag the split slider to compare!
      </p>

      <!-- Case Presets Switcher -->
      <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 0.6rem; margin-bottom: 2.5rem;">
        <button type="button" class="ba-preset-btn active" data-preset="veneers" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(197,160,89,0.4); color: #fff; padding: 0.5rem 1.1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 700; cursor: pointer; transition: all 0.2s;">
          💎 Case #101: Porcelain Veneers
        </button>
        <button type="button" class="ba-preset-btn" data-preset="implants" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #94a3b8; padding: 0.5rem 1.1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 700; cursor: pointer; transition: all 0.2s;">
          🔩 Case #102: All-on-4 Implants
        </button>
        <button type="button" class="ba-preset-btn" data-preset="invisalign" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #94a3b8; padding: 0.5rem 1.1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 700; cursor: pointer; transition: all 0.2s;">
          🦷 Case #103: Invisalign® Aligners
        </button>
      </div>
    </div>

    <!-- 60fps Hardware Accelerated Split Slider -->
    <div class="ba-slider-container">
      <div class="ba-slider-wrapper">
        <div class="ba-layer ba-after-layer">
          <img id="featuredAfterImg" src="assets/images/case-veneers-after.svg" alt="Post-Operative Veneers Result">
        </div>
        <div class="ba-layer ba-before-layer">
          <img id="featuredBeforeImg" src="assets/images/case-veneers-before.svg" alt="Pre-Operative Baseline">
        </div>
        <div class="ba-divider"></div>
        <div class="ba-handle">&#8644;</div>
        <input type="range" min="0" max="100" value="50" class="ba-range-input" aria-label="Before and after split slider comparison">
        <span class="ba-badge ba-badge-before">PRE-OP BASELINE</span>
        <span class="ba-badge ba-badge-after">POST-OP RESULT</span>
      </div>
    </div>

    <div style="text-align: center; margin-top: 2rem;">
      <span style="font-size: 0.85rem; color: #94a3b8;">💡 <em>Drag slider left and right or touch screen to compare clinical outcome</em></span>
    </div>
  </div>
</section>

<!-- Additional Case Studies Grid -->
<section style="padding: 5rem 0 7rem; background: var(--color-alabaster);">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Documented Outcomes</div>
      <h2 class="section-title">Comprehensive Case Portfolio</h2>
      <p class="section-subtitle">
        Filter by dental procedure to inspect clinical baselines, materials utilized, pre-and-post shade analysis, and operating doctors.
      </p>
    </div>

    <!-- Category Filter Tabs -->
    <div class="gallery-filter-wrap">
      <button type="button" class="gallery-filter-btn active" data-filter="all">All Procedures (6)</button>
      <button type="button" class="gallery-filter-btn" data-filter="veneers">💎 Porcelain Veneers (2)</button>
      <button type="button" class="gallery-filter-btn" data-filter="implants">🔩 Dental Implants (1)</button>
      <button type="button" class="gallery-filter-btn" data-filter="invisalign">🦷 Invisalign® Orthodontics (1)</button>
      <button type="button" class="gallery-filter-btn" data-filter="whitening">✨ Laser Whitening (1)</button>
      <button type="button" class="gallery-filter-btn" data-filter="periodontics">🩺 Gum Aesthetics (1)</button>
    </div>

    <!-- Case Studies Cards Grid -->
    <div class="gallery-grid">

      <!-- Case 1: Veneers -->
      <article class="gallery-card" data-category="veneers">
        <div class="gallery-card-preview">
          <img class="img-after" src="assets/images/case-veneers-after.svg" alt="After 8 Veneers">
          <img class="img-before" src="assets/images/case-veneers-before.svg" alt="Before Veneers">
          <span class="gallery-card-badge">8 PORCELAIN VENEERS</span>
          <div class="gallery-card-toggle">
            <button type="button" data-state="before">Before</button>
            <button type="button" class="active" data-state="after">After</button>
          </div>
        </div>
        <div class="gallery-card-body">
          <h3 class="gallery-card-title">Tetracycline Banding &amp; Incisal Fracture Restoration</h3>
          <p class="gallery-card-desc">
            Restored youthful optical vitality and symmetry using eight hand-layered IPS e.max® lithium disilicate laminates in two appointments.
          </p>
          <div class="gallery-card-metrics">
            <div>
              <strong>Shade Shift</strong>
              <span style="font-weight: 700; color: #0f172a;">A3.5 &rarr; Bleach BL2</span>
            </div>
            <div>
              <strong>Duration</strong>
              <span style="font-weight: 700; color: #0f172a;">2 Visits (7 Days)</span>
            </div>
          </div>
          <div class="gallery-card-footer">
            <span style="font-size: 0.82rem; color: #64748b;"><strong>Dr. Sarah Jensen</strong></span>
            <button type="button" class="btn btn-outline btn-sm inspect-case-btn" data-case='{"id":"#101","tag":"Porcelain Veneers","title":"8 Handcrafted e.max® Veneers","shadeBefore":"VITA A3.5 (Severe Banding)","shadeAfter":"Bleach BL2 Natural Ombre","complaint":"Chronic tetracycline enamel stains and chipped central incisor from childhood accident.","outcome":"Flawless golden proportion smile arc with zero sensitivity and lifetime stain resistance.","protocol":"Minimal 0.3mm enamel preparation, 3D TRIOS optical scan, in-house ceramic master layering, and dual-cure resin luting.","doctor":"Dr. Sarah Jensen, DDS (Columbia)","duration":"2 Visits (7 Days)","serviceId":"2"}'>
              Inspect Details &rarr;
            </button>
          </div>
        </div>
      </article>

      <!-- Case 2: Implants -->
      <article class="gallery-card" data-category="implants">
        <div class="gallery-card-preview">
          <img class="img-after" src="assets/images/case-implants-after.svg" alt="After All-on-4 Implants">
          <img class="img-before" src="assets/images/case-implants-before.svg" alt="Before All-on-4 Implants">
          <span class="gallery-card-badge">ALL-ON-4 IMPLANTS</span>
          <div class="gallery-card-toggle">
            <button type="button" data-state="before">Before</button>
            <button type="button" class="active" data-state="after">After</button>
          </div>
        </div>
        <div class="gallery-card-body">
          <h3 class="gallery-card-title">Full-Arch Computer-Guided Immediate Teeth</h3>
          <p class="gallery-card-desc">
            Rehabilitated a non-restorable upper arch with four computer-guided Straumann® BLX titanium implants and a monolithic zirconia bridge in 24 hours.
          </p>
          <div class="gallery-card-metrics">
            <div>
              <strong>Chewing Power</strong>
              <span style="font-weight: 700; color: #059669;">100% Restored</span>
            </div>
            <div>
              <strong>Duration</strong>
              <span style="font-weight: 700; color: #0f172a;">Same-Day Load</span>
            </div>
          </div>
          <div class="gallery-card-footer">
            <span style="font-size: 0.82rem; color: #64748b;"><strong>Dr. Marcus Vance</strong></span>
            <button type="button" class="btn btn-outline btn-sm inspect-case-btn" data-case='{"id":"#102","tag":"Surgical Prosthodontics","title":"All-on-4 Full Arch Zirconia Rehabilitation","shadeBefore":"Severe Bone Loss & Failing Teeth","shadeAfter":"Monolithic Zirconia Natural BL3","complaint":"Patient could no longer chew solid foods and suffered from recurrent dental abscesses and loose teeth.","outcome":"Immediate fixed permanent smile bridge delivered the same afternoon under IV conscious sedation.","protocol":"CBCT 3D guided surgical placement of 4 Straumann BLX implants with multi-unit abutments and screw-retained temporary bridge.","doctor":"Dr. Marcus Vance, DMD, MD (Harvard)","duration":"1 Day Protocol","serviceId":"3"}'>
              Inspect Details &rarr;
            </button>
          </div>
        </div>
      </article>

      <!-- Case 3: Invisalign -->
      <article class="gallery-card" data-category="invisalign">
        <div class="gallery-card-preview">
          <img class="img-after" src="assets/images/case-invisalign-after.svg" alt="After Invisalign Aligners">
          <img class="img-before" src="assets/images/case-invisalign-before.svg" alt="Before Invisalign Aligners">
          <span class="gallery-card-badge">INVISALIGN® CLEAR ALIGNERS</span>
          <div class="gallery-card-toggle">
            <button type="button" data-state="before">Before</button>
            <button type="button" class="active" data-state="after">After</button>
          </div>
        </div>
        <div class="gallery-card-body">
          <h3 class="gallery-card-title">4.2mm Midline Diastema &amp; Bite Correction</h3>
          <p class="gallery-card-desc">
            Completely closed severe anterior spacing and corrected a deep bite without wires or brackets using 22 SmartTrack® clear aligner trays.
          </p>
          <div class="gallery-card-metrics">
            <div>
              <strong>Spacing Closed</strong>
              <span style="font-weight: 700; color: #0f172a;">4.2mm Space &rarr; 0mm</span>
            </div>
            <div>
              <strong>Duration</strong>
              <span style="font-weight: 700; color: #0f172a;">5.5 Months</span>
            </div>
          </div>
          <div class="gallery-card-footer">
            <span style="font-size: 0.82rem; color: #64748b;"><strong>Dr. Elena Rostova</strong></span>
            <button type="button" class="btn btn-outline btn-sm inspect-case-btn" data-case='{"id":"#103","tag":"Orthodontics","title":"Invisalign® Diastema & Anterior Alignment","shadeBefore":"4.2mm Gap & Lower Crowding","shadeAfter":"Ideal Golden Proportion Arch","complaint":"Patient felt self-conscious about speaking in public meetings due to large central tooth gap.","outcome":"Midline gap eliminated, ideal overjet/overbite established, and Vivera retention protocol initiated.","protocol":"iTero 5D digital simulation, ClinCheck biomechanical tooth movement sequencing, weekly tray changes with SmartForce attachments.","doctor":"Dr. Elena Rostova, DDS, MS","duration":"5.5 Months (22 Trays)","serviceId":"4"}'>
              Inspect Details &rarr;
            </button>
          </div>
        </div>
      </article>

      <!-- Case 4: Whitening -->
      <article class="gallery-card" data-category="whitening">
        <div class="gallery-card-preview">
          <img class="img-after" src="assets/images/case-whitening-after.svg" alt="After Zoom Whitening">
          <img class="img-before" src="assets/images/case-whitening-before.svg" alt="Before Zoom Whitening">
          <span class="gallery-card-badge">ZOOM!® IN-OFFICE LASER</span>
          <div class="gallery-card-toggle">
            <button type="button" data-state="before">Before</button>
            <button type="button" class="active" data-state="after">After</button>
          </div>
        </div>
        <div class="gallery-card-body">
          <h3 class="gallery-card-title">8-Shade Extrinsic Coffee &amp; Enamel Decontamination</h3>
          <p class="gallery-card-desc">
            Intense 25% hydrogen peroxide photo-activated treatment removing decades of coffee and red wine staining with zero post-operative tooth sensitivity.
          </p>
          <div class="gallery-card-metrics">
            <div>
              <strong>Shade Lift</strong>
              <span style="font-weight: 700; color: #059669;">+8 Full Shades Lighter</span>
            </div>
            <div>
              <strong>Duration</strong>
              <span style="font-weight: 700; color: #0f172a;">60 Minutes</span>
            </div>
          </div>
          <div class="gallery-card-footer">
            <span style="font-size: 0.82rem; color: #64748b;"><strong>Aesthetic Hygiene Team</strong></span>
            <button type="button" class="btn btn-outline btn-sm inspect-case-btn" data-case='{"id":"#104","tag":"Aesthetic Whitening","title":"Philips Zoom!® WhiteSpeed Laser Whitening","shadeBefore":"VITA C3 (Deep Yellow/Brown)","shadeAfter":"VITA B1 (Bright Radiance)","complaint":"Patient preparing for upcoming wedding with heavy lifestyle coffee stains.","outcome":"Luminous white smile achieved in one 60-minute session with Relief ACP desensitizing gel.","protocol":"Gingival isolation barrier, 4 x 15-minute LED light activation cycles, and take-home custom touch-up trays.","doctor":"Lead Aesthetic Dental Hygienist","duration":"60 Minutes","serviceId":"5"}'>
              Inspect Details &rarr;
            </button>
          </div>
        </div>
      </article>

      <!-- Case 5: Composite Bonding -->
      <article class="gallery-card" data-category="veneers">
        <div class="gallery-card-preview">
          <img class="img-after" src="assets/images/case-bonding-after.svg" alt="After Biomimetic Composite Bonding">
          <img class="img-before" src="assets/images/case-bonding-before.svg" alt="Before Biomimetic Composite Bonding">
          <span class="gallery-card-badge">BIOMIMETIC EDGE BONDING</span>
          <div class="gallery-card-toggle">
            <button type="button" data-state="before">Before</button>
            <button type="button" class="active" data-state="after">After</button>
          </div>
        </div>
        <div class="gallery-card-body">
          <h3 class="gallery-card-title">Traumatic Incisal Fracture Emergency Repair</h3>
          <p class="gallery-card-desc">
            Reconstructed a severe diagonal enamel fracture on central incisor #8 using multi-layer biomimetic nanohybrid composite in a single 45-minute visit.
          </p>
          <div class="gallery-card-metrics">
            <div>
              <strong>Procedure</strong>
              <span style="font-weight: 700; color: #0f172a;">No Drilling Required</span>
            </div>
            <div>
              <strong>Duration</strong>
              <span style="font-weight: 700; color: #0f172a;">Single 45-Min Visit</span>
            </div>
          </div>
          <div class="gallery-card-footer">
            <span style="font-size: 0.82rem; color: #64748b;"><strong>Dr. David Kim</strong></span>
            <button type="button" class="btn btn-outline btn-sm inspect-case-btn" data-case='{"id":"#105","tag":"Biomimetic Restoration","title":"Direct Nanohybrid Composite Edge Bonding","shadeBefore":"Traumatic Class IV Fracture #8","shadeAfter":"Seamless Optical Integration","complaint":"Patient chipped front tooth during weekend basketball match; needed urgent repair for business meetings.","outcome":"Undetectable transition line, natural incisal mammelons, and full bite strength restored immediately.","protocol":"Star-bevel enamel preparation, self-etch adhesive bonding, multi-opacity dentin/enamel layering, and diamond disc polish.","doctor":"Dr. David Kim, DDS (NYU)","duration":"45 Minutes","serviceId":"2"}'>
              Inspect Details &rarr;
            </button>
          </div>
        </div>
      </article>

      <!-- Case 6: Gum Contouring -->
      <article class="gallery-card" data-category="periodontics">
        <div class="gallery-card-preview">
          <img class="img-after" src="assets/images/case-gummy-after.svg" alt="After Laser Gum Contouring">
          <img class="img-before" src="assets/images/case-gummy-before.svg" alt="Before Laser Gum Contouring">
          <span class="gallery-card-badge">DIODE LASER GINGIVECTOMY</span>
          <div class="gallery-card-toggle">
            <button type="button" data-state="before">Before</button>
            <button type="button" class="active" data-state="after">After</button>
          </div>
        </div>
        <div class="gallery-card-body">
          <h3 class="gallery-card-title">Gummy Smile Correction &amp; Proportional Lengthening</h3>
          <p class="gallery-card-desc">
            Sculpted excess gingival tissue with a gentle 940nm diode laser, uncovering full anatomical tooth lengths without bleeding or surgical sutures.
          </p>
          <div class="gallery-card-metrics">
            <div>
              <strong>Crown Lengthening</strong>
              <span style="font-weight: 700; color: #0f172a;">+3.5mm Tooth Exposure</span>
            </div>
            <div>
              <strong>Recovery</strong>
              <span style="font-weight: 700; color: #059669;">Zero Downtime</span>
            </div>
          </div>
          <div class="gallery-card-footer">
            <span style="font-size: 0.82rem; color: #64748b;"><strong>Dr. Sarah Jensen</strong></span>
            <button type="button" class="btn btn-outline btn-sm inspect-case-btn" data-case='{"id":"#106","tag":"Periodontal Aesthetics","title":"Diode Laser Aesthetic Gingivectomy","shadeBefore":"4.5mm Excessive Gum Display","shadeAfter":"Ideal 80% Tooth Width/Length","complaint":"Patient felt teeth appeared too small and childlike due to thick gum overgrowth covering enamel.","outcome":"Symmetrical parabolic gingival zeniths and elegant proportioned smile with instant same-day healing.","protocol":"Topical painless anesthetic, precise digital measurement guide, and 940nm soft-tissue laser ablation.","doctor":"Dr. Sarah Jensen, DDS (Columbia)","duration":"1 Visit (30 Mins)","serviceId":"10"}'>
              Inspect Details &rarr;
            </button>
          </div>
        </div>
      </article>

    </div>

    <!-- Booking CTA Banner -->
    <div style="background: linear-gradient(135deg, #080c14, #131b2e); border: 2px solid rgba(197, 160, 89, 0.35); border-radius: 20px; padding: 3.5rem 2rem; text-align: center; color: #ffffff; margin-top: 5rem; box-shadow: var(--shadow-xl);">
      <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Your Custom Transformation</div>
      <h3 style="font-size: clamp(1.8rem, 3vw, 2.4rem); font-weight: 800; color: #ffffff; margin-bottom: 0.85rem;">
        Ready to Envision Your New Smile?
      </h3>
      <p style="color: #94a3b8; font-size: 1.1rem; max-width: 620px; margin: 0 auto 2rem auto; line-height: 1.7;">
        Schedule a consultation to receive a complimentary 3D Digital Smile Simulation with our clinical director and visualize your outcome before beginning treatment.
      </p>
      <a href="booking.php?service=2" class="btn btn-gold btn-lg">
        <span>📅</span>
        <span>Book Smile Consultation &rarr;</span>
      </a>
    </div>
  </div>
</section>

<!-- Clinical Case Inspection Modal -->
<div class="clinical-modal-overlay" id="clinicalModal" aria-modal="true" role="dialog">
  <div class="clinical-modal-content">
    <button class="clinical-modal-close" id="clinicalModalClose" aria-label="Close modal">&times;</button>
    <div id="clinicalModalBody">
      <!-- Injected dynamically by before-after.js -->
    </div>
  </div>
</div>

<script src="assets/js/before-after.js"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
