<?php
$currentPage = 'services';
$pageTitle = 'Dental Services & Treatments | Comprehensive Oral Care';
require_once __DIR__ . '/includes/header.php';

$services = getAllServices();
?>

<!-- Services Hero Banner -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Full Spectrum Treatments</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      Every Smile Deserves Expert, Uncompromising Care
    </h1>
    <p style="max-width: 750px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      From preventive dental cleanings to computer-guided full-arch smile restorations, our specialists provide precision oral surgery and cosmetic artistry under one roof.
    </p>
  </div>
</div>

<!-- Services Filter & Full Catalog -->
<section style="padding: 5rem 0 7rem; background: var(--color-alabaster);">
  <div class="container">
    
    <!-- Service Category Pills -->
    <div style="display: flex; gap: 0.65rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3.5rem;">
      <button type="button" class="btn btn-outline btn-sm filter-service-btn active" data-category="all">All Specializations</button>
      <button type="button" class="btn btn-outline btn-sm filter-service-btn" data-category="Cosmetic Dentistry">Cosmetic Dentistry</button>
      <button type="button" class="btn btn-outline btn-sm filter-service-btn" data-category="Restorative & Implants">Implants & Full-Arch</button>
      <button type="button" class="btn btn-outline btn-sm filter-service-btn" data-category="Orthodontics">Invisalign® & Braces</button>
      <button type="button" class="btn btn-outline btn-sm filter-service-btn" data-category="Endodontics">Micro-Endodontics</button>
      <button type="button" class="btn btn-outline btn-sm filter-service-btn" data-category="Preventive & General">Cleanings & Preventive</button>
      <button type="button" class="btn btn-outline btn-sm filter-service-btn" data-category="Emergency Care">Emergency Dental</button>
    </div>

    <!-- Services Grid -->
    <div class="services-grid" id="fullServicesGrid">
      <?php foreach ($services as $s): ?>
        <div class="service-card" data-category="<?= htmlspecialchars($s['category']) ?>">
          <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.25rem;">
            <div class="service-icon-box" style="margin-bottom: 0;">
              <?php
              $icon = $s['icon'];
              if ($icon === 'sparkles') echo '✨';
              elseif ($icon === 'smile') echo '💎';
              elseif ($icon === 'implant') echo '🔩';
              elseif ($icon === 'arch') echo '🏛️';
              elseif ($icon === 'aligner') echo '🦷';
              elseif ($icon === 'microscope') echo '🔬';
              elseif ($icon === 'shield-check') echo '🛡️';
              elseif ($icon === 'laser') echo '⚡';
              elseif ($icon === 'heart') echo '💖';
              elseif ($icon === 'emergency') echo '🚨';
              elseif ($icon === 'scissors') echo '✂️';
              elseif ($icon === 'moon') echo '🌙';
              else echo '🩺';
              ?>
            </div>
            <span style="font-size: 0.8rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 0.3rem 0.65rem; border-radius: 6px;">
              ⏱️ <?= $s['duration_mins'] ?> mins
            </span>
          </div>

          <div class="service-category"><?= htmlspecialchars($s['category']) ?></div>
          <h3 class="service-title"><?= htmlspecialchars($s['name']) ?></h3>
          <p class="service-desc"><?= htmlspecialchars($s['full_description']) ?></p>

          <div style="background: var(--color-alabaster); border: 1px solid var(--color-slate-200); padding: 0.95rem; border-radius: 10px; margin-bottom: 1.4rem;">
            <div style="font-size: 0.78rem; font-weight: 700; color: var(--color-gold-dark); text-transform: uppercase; margin-bottom: 0.25rem;">Key Benefits & Highlights</div>
            <div style="font-size: 0.85rem; color: #475569; line-height: 1.5;">
              <?= htmlspecialchars($s['short_description']) ?>
            </div>
          </div>

          <div class="service-meta">
            <div class="service-price-block">
              <span class="price-label">Starting Investment</span>
              <span class="price-value" style="color: var(--color-obsidian);"><?= formatPrice($s['price_starting']) ?></span>
            </div>
            <a href="booking.php?service=<?= $s['id'] ?>" class="btn btn-gold btn-sm">
              Book This Service &rarr;
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Service Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const filterBtns = document.querySelectorAll('.filter-service-btn');
  const serviceCards = document.querySelectorAll('#fullServicesGrid .service-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => {
        b.classList.remove('active');
        b.style.background = '#ffffff';
        b.style.color = 'var(--color-obsidian)';
        b.style.borderColor = 'var(--color-slate-200)';
      });
      btn.classList.add('active');
      btn.style.background = 'var(--color-obsidian)';
      btn.style.color = '#ffffff';
      btn.style.borderColor = 'var(--color-obsidian)';

      const cat = btn.getAttribute('data-category');
      serviceCards.forEach(card => {
        const cardCat = card.getAttribute('data-category');
        if (cat === 'all' || cardCat === cat) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
</script>

<!-- Consultation CTA Banner -->
<section style="background: #ffffff; padding: 5rem 0; border-top: 1px solid var(--color-slate-200); text-align: center;">
  <div class="container" style="max-width: 700px;">
    <h2 style="font-size: 2.2rem; margin-bottom: 0.85rem;">Not Sure Which Treatment You Need?</h2>
    <p style="color: #64748b; font-size: 1.1rem; line-height: 1.6; margin-bottom: 2rem;">
      Schedule a comprehensive 3D Digital Consultation. We will capture a full optical scan of your teeth, identify hidden issues, and present personalized options with 100% price transparency.
    </p>
    <a href="booking.php?service=7" class="btn btn-gold btn-lg">
      Schedule 3D Digital Consultation &rarr;
    </a>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
