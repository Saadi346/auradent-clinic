<?php
$currentPage = 'dentists';
$pageTitle = 'Meet Our Board-Certified Dentists & Specialists | Aura Atelier';
require_once __DIR__ . '/includes/header.php';

$doctors = getAllDoctors();
?>

<!-- Dentists Hero Banner -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Elite Clinical Faculty</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      Trained at the World’s Leading Dental Institutes
    </h1>
    <p style="max-width: 720px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      Our interdisciplinary team of board-certified dentists, oral surgeons, periodontists, and orthodontists collaborate seamlessly under one roof to deliver unmatched aesthetic outcomes.
    </p>
  </div>
</div>

<!-- Specialists Roster (Mobile Phone Friendly Responsive Grid) -->
<section style="padding: 5rem 0 6rem; background: var(--color-alabaster);">
  <div class="container">
    <div style="display: flex; flex-direction: column; gap: 3rem;">
      <?php foreach ($doctors as $doc): ?>
        <div style="background: #ffffff; border-radius: 20px; border: 1px solid var(--color-slate-200); box-shadow: var(--shadow-sm); overflow: hidden; display: flex; flex-wrap: wrap; align-items: stretch;">
          
          <!-- Avatar Frame -->
          <div style="flex: 1 1 300px; max-width: 100%; min-height: 320px; background: var(--color-obsidian); position: relative;">
            <img src="<?= htmlspecialchars($doc['avatar_url']) ?>" alt="<?= htmlspecialchars($doc['name']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
            <span class="doctor-exp-badge"><?= $doc['experience_years'] ?>+ Years Experience</span>
          </div>

          <!-- Doctor Bio Details -->
          <div style="flex: 1 1 420px; padding: clamp(1.5rem, 3vw, 2.8rem); display: flex; flex-direction: column; justify-content: center;">
            <div style="font-size: 0.82rem; font-weight: 700; color: var(--color-gold-dark); text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.35rem;">
              <?= htmlspecialchars($doc['specialty']) ?>
            </div>
            <h2 style="font-size: clamp(1.5rem, 2.5vw, 2rem); color: var(--color-obsidian); margin-bottom: 0.35rem;">
              <?= htmlspecialchars($doc['name']) ?>
            </h2>
            <div style="font-size: 0.92rem; font-weight: 600; color: var(--color-slate-500); margin-bottom: 1.25rem;">
              <?= htmlspecialchars($doc['qualifications']) ?>
            </div>
            <p style="color: #475569; font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">
              <?= htmlspecialchars($doc['bio']) ?>
            </p>
            <div style="display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap; padding: 0.85rem 1.2rem; background: var(--color-alabaster); border-radius: 12px; margin-bottom: 1.8rem; border: 1px solid var(--color-slate-200);">
              <div>
                <div style="font-size: 0.72rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Available Days</div>
                <div style="font-weight: 700; color: var(--color-obsidian); font-size: 0.9rem;"><?= htmlspecialchars($doc['schedule_days']) ?></div>
              </div>
              <div>
                <div style="font-size: 0.72rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Consultation Hours</div>
                <div style="font-weight: 700; color: var(--color-obsidian); font-size: 0.9rem;"><?= htmlspecialchars($doc['hours_text']) ?></div>
              </div>
            </div>
            <div>
              <a href="booking.php?doctor=<?= $doc['id'] ?>" class="btn btn-gold btn-lg">
                Book Consultation with <?= explode(' ', $doc['name'])[1] ?? 'Doctor' ?> &rarr;
              </a>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Clinical Credentials & Standards -->
<section style="background: #ffffff; padding: 5rem 0; border-top: 1px solid var(--color-slate-200);">
  <div class="container" style="text-align: center; max-width: 800px;">
    <div class="section-tag">Continuous Education</div>
    <h2 class="section-title">Over 200 Hours of Annual Continuing Clinical Training</h2>
    <p class="section-subtitle">
      Our clinicians exceed New York State licensing requirements by quadruple the mandatory continuing education hours, attending global symposiums in digital prosthodontics, laser dentistry, and biological implantology.
    </p>
    <div style="margin-top: 2rem;">
      <a href="booking.php" class="btn btn-obsidian btn-lg">
        Book an In-Person Specialist Exam &rarr;
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
