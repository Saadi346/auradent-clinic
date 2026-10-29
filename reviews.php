<?php
$currentPage = 'reviews';
$pageTitle = 'Patient Reviews & Verified Testimonials | 4.9 Star Rating';
require_once __DIR__ . '/includes/header.php';

$allReviews = getApprovedReviews(20);
?>

<!-- Reviews Hero Banner -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">Real Patient Feedback</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      Hear From Patients Who Love Visiting the Dentist
    </h1>
    <p style="max-width: 720px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      Over 480 verified Google and Yelp reviews highlight our pain-free Wand® anesthesia, compassionate clinicians, and life-changing smile makeovers.
    </p>
  </div>
</div>

<!-- Rating Scorecard Strip -->
<section style="background: #ffffff; padding: 3rem 0; border-bottom: 1px solid var(--color-slate-200);">
  <div class="container" style="display: flex; justify-content: center; align-items: center; gap: clamp(1.5rem, 4vw, 4rem); flex-wrap: wrap;">
    <div style="text-align: center;">
      <div style="font-family: var(--font-display); font-size: 3.5rem; font-weight: 800; color: var(--color-obsidian); line-height: 1;">4.9</div>
      <div style="color: #f59e0b; font-size: 1.3rem; margin: 0.35rem 0;">★★★★★</div>
      <div style="font-size: 0.85rem; color: #64748b; font-weight: 600;">Overall Patient Rating</div>
    </div>
    <div style="display: flex; gap: 2.5rem; flex-wrap: wrap;">
      <div>
        <div style="font-weight: 800; font-size: 1.4rem; color: var(--color-gold-dark);">99.4%</div>
        <div style="font-size: 0.82rem; color: #64748b;">Reported Zero In-Chair Pain</div>
      </div>
      <div>
        <div style="font-weight: 800; font-size: 1.4rem; color: var(--color-obsidian);">480+</div>
        <div style="font-size: 0.82rem; color: #64748b;">5-Star Online Reviews</div>
      </div>
      <div>
        <div style="font-weight: 800; font-size: 1.4rem; color: var(--color-emerald);">98.8%</div>
        <div style="font-size: 0.82rem; color: #64748b;">Would Recommend to Family</div>
      </div>
    </div>
  </div>
</section>

<!-- Reviews List & Submit Form Grid (Phone Screen Friendly Flex-Wrap) -->
<section style="padding: 5rem 0 6rem; background: var(--color-alabaster);">
  <div class="container">
    <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: flex-start;">
      
      <!-- Left: Reviews Stream -->
      <div style="flex: 1 1 500px;">
        <div class="section-tag">Verified Testimonials</div>
        <h2 style="font-size: 2rem; margin-bottom: 2rem;">Patient Stories</h2>

        <div style="display: flex; flex-direction: column; gap: 1.8rem;" id="reviewsList">
          <?php foreach ($allReviews as $rev): ?>
            <div class="review-card" style="margin-bottom: 0;">
              <div>
                <div class="review-stars">
                  <?= str_repeat('★', (int)$rev['rating']) ?>
                </div>
                <p class="review-text">“<?= htmlspecialchars($rev['comment']) ?>”</p>
              </div>
              <div class="reviewer-meta">
                <div>
                  <div class="reviewer-name"><?= htmlspecialchars($rev['patient_name']) ?></div>
                  <div class="reviewer-treatment"><?= htmlspecialchars($rev['treatment']) ?></div>
                </div>
                <div class="verified-badge">
                  <span>✓</span> Verified Visit
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right: Leave a Review Interactive Form -->
      <div style="flex: 1 1 360px; background: #ffffff; border-radius: 18px; border: 1px solid var(--color-slate-200); padding: clamp(1.5rem, 3vw, 2.5rem); box-shadow: var(--shadow-md);">
        <h3 style="font-size: 1.4rem; margin-bottom: 0.5rem; color: var(--color-obsidian);">Visited Us Recently?</h3>
        <p style="color: #64748b; font-size: 0.92rem; margin-bottom: 1.5rem;">
          Share your experience with our dental team to help other patients make confident decisions.
        </p>

        <form id="leaveReviewForm">
          <div class="form-group">
            <label class="form-label" for="reviewName">Your Full Name</label>
            <input type="text" id="reviewName" class="form-control" placeholder="e.g. Amanda Hayes" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="reviewTreatment">Treatment Received</label>
            <select id="reviewTreatment" class="form-control" required>
              <option value="Porcelain Veneers & Aesthetics">Porcelain Veneers & Aesthetics</option>
              <option value="3D Dental Implants">3D Dental Implants</option>
              <option value="Invisalign® Orthodontics">Invisalign® Orthodontics</option>
              <option value="Zoom! Laser Whitening">Zoom! Laser Whitening</option>
              <option value="Microscopic Root Canal">Microscopic Root Canal</option>
              <option value="Routine Preventive Cleaning">Routine Preventive Cleaning</option>
              <option value="Emergency Dental Relief">Emergency Dental Relief</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label">Star Rating</label>
            <div style="display: flex; gap: 0.5rem; font-size: 1.5rem; cursor: pointer; color: #cbd5e1;" id="starRatingGroup">
              <span data-star="1" style="color: #f59e0b;">★</span>
              <span data-star="2" style="color: #f59e0b;">★</span>
              <span data-star="3" style="color: #f59e0b;">★</span>
              <span data-star="4" style="color: #f59e0b;">★</span>
              <span data-star="5" style="color: #f59e0b;">★</span>
            </div>
            <input type="hidden" id="selectedStarValue" value="5">
          </div>

          <div class="form-group">
            <label class="form-label" for="reviewComment">Your Feedback / Story</label>
            <textarea id="reviewComment" class="form-control" rows="4" placeholder="How was the comfort, bedside manner, and outcome of your treatment?" required></textarea>
          </div>

          <div id="reviewSuccessMsg" style="display: none; padding: 0.8rem; background: #d1fae5; color: #065f46; border-radius: 8px; font-size: 0.88rem; margin-bottom: 1rem;"></div>

          <button type="submit" id="submitReviewBtn" class="btn btn-gold" style="width: 100%;">
            Publish Verified Review &rarr;
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- Review Form Interactive Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const starSpans = document.querySelectorAll('#starRatingGroup span');
  const starInput = document.getElementById('selectedStarValue');

  starSpans.forEach(star => {
    star.addEventListener('click', () => {
      const val = parseInt(star.getAttribute('data-star'));
      starInput.value = val;
      starSpans.forEach(s => {
        const sVal = parseInt(s.getAttribute('data-star'));
        s.style.color = (sVal <= val) ? '#f59e0b' : '#cbd5e1';
      });
    });
  });

  const form = document.getElementById('leaveReviewForm');
  const submitBtn = document.getElementById('submitReviewBtn');
  const msgBox = document.getElementById('reviewSuccessMsg');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    submitBtn.disabled = true;
    submitBtn.textContent = 'Submitting...';

    const payload = {
      name: document.getElementById('reviewName').value.trim(),
      treatment: document.getElementById('reviewTreatment').value,
      rating: parseInt(starInput.value),
      comment: document.getElementById('reviewComment').value.trim()
    };

    fetch('api/submit_review.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
      submitBtn.disabled = false;
      submitBtn.textContent = 'Publish Verified Review →';
      if (data.success) {
        msgBox.textContent = data.message;
        msgBox.style.display = 'block';
        form.reset();
        const list = document.getElementById('reviewsList');
        const card = document.createElement('div');
        card.className = 'review-card';
        card.innerHTML = `
          <div>
            <div class="review-stars">${'★'.repeat(payload.rating)}</div>
            <p class="review-text">“${escapeHtml(payload.comment)}”</p>
          </div>
          <div class="reviewer-meta">
            <div>
              <div class="reviewer-name">${escapeHtml(payload.name)}</div>
              <div class="reviewer-treatment">${escapeHtml(payload.treatment)}</div>
            </div>
            <div class="verified-badge"><span>✓</span> Verified Visit</div>
          </div>
        `;
        list.prepend(card);
      } else {
        alert(data.message || 'Error saving review');
      }
    })
    .catch(err => {
      submitBtn.disabled = false;
      submitBtn.textContent = 'Publish Verified Review →';
      alert('Network error');
    });
  });

  function escapeHtml(str) {
    return String(str).replace(/[&<>"']/g, m => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    })[m]);
  }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
