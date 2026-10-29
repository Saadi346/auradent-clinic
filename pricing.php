<?php
$currentPage = 'pricing';
$pageTitle = 'Transparent Dental Pricing & Insurance Coverage';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Pricing Hero -->
<div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; padding: 5rem 0 4.5rem; text-align: center; position: relative;">
  <div class="container">
    <div class="section-tag" style="background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light);">100% Price Transparency</div>
    <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
      No Hidden Surcharges. No Unexpected Bills.
    </h1>
    <p style="max-width: 720px; margin: 0 auto; color: #94a3b8; font-size: 1.15rem; line-height: 1.7;">
      We believe extraordinary healthcare begins with complete financial honesty. Review our baseline pricing, insurance benefits, and flexible 0% APR financing options below.
    </p>
  </div>
</div>

<!-- Transparent Treatment Cost Table -->
<section style="padding: 6rem 0; background: #ffffff;">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Fee Schedule</div>
      <h2 class="section-title">Common Procedure Investment Guide</h2>
      <p class="section-subtitle">
        Our fees reflect top-tier dental materials (Swiss zirconia, e.max porcelain) and certified surgical specialists.
      </p>
    </div>

    <div style="max-width: 900px; margin: 0 auto; background: #ffffff; border-radius: 16px; border: 1px solid var(--color-slate-200); overflow: hidden; box-shadow: var(--shadow-md);">
      <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
          <tr style="background: var(--color-alabaster); border-bottom: 1px solid var(--color-slate-200);">
            <th style="padding: 1.2rem 1.5rem; font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Dental Procedure</th>
            <th style="padding: 1.2rem 1.5rem; font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Average Duration</th>
            <th style="padding: 1.2rem 1.5rem; font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Starting Fee</th>
            <th style="padding: 1.2rem 1.5rem; font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Action</th>
          </tr>
        </thead>
        <tbody style="font-size: 0.95rem;">
          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">Comprehensive Exam & Ultrasonic Cleaning</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">60 mins</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-obsidian);">$160.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=7" class="btn btn-outline btn-sm">Book</a></td>
          </tr>
          <tr style="border-bottom: 1px solid #f1f5f9; background: #fafafa;">
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">Zoom!® Laser Teeth Whitening</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">60 mins</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-obsidian);">$349.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=1" class="btn btn-outline btn-sm">Book</a></td>
          </tr>
          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">Custom Handcrafted Porcelain Veneer (Per Tooth)</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">90 mins</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-obsidian);">$950.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=2" class="btn btn-gold btn-sm">Book</a></td>
          </tr>
          <tr style="border-bottom: 1px solid #f1f5f9; background: #fafafa;">
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">3D Computer-Guided Dental Implant (Fixture & Abutment)</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">90 mins</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-obsidian);">$1,850.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=3" class="btn btn-gold btn-sm">Book</a></td>
          </tr>
          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">Invisalign® Clear Aligner Full Treatment</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">45 mins checkups</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-obsidian);">$2,800.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=5" class="btn btn-gold btn-sm">Book</a></td>
          </tr>
          <tr style="border-bottom: 1px solid #f1f5f9; background: #fafafa;">
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">Microscopic Root Canal Therapy</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">75 mins</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-obsidian);">$750.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=6" class="btn btn-outline btn-sm">Book</a></td>
          </tr>
          <tr>
            <td style="padding: 1.1rem 1.5rem; font-weight: 600;">24/7 Same-Day Emergency Relief Exam</td>
            <td style="padding: 1.1rem 1.5rem; color: #64748b;">45 mins</td>
            <td style="padding: 1.1rem 1.5rem; font-weight: 800; color: var(--color-rose);">$195.00</td>
            <td style="padding: 1.1rem 1.5rem;"><a href="booking.php?service=10" class="btn btn-danger btn-sm">Urgent</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Dental Wellness Membership Plan -->
<section style="padding: 6rem 0; background: var(--color-alabaster);">
  <div class="container">
    <div style="background: linear-gradient(135deg, #080c14, #131b2e); color: #ffffff; border-radius: 24px; padding: 3.5rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 3rem; align-items: center; border: 1px solid rgba(197, 160, 89, 0.3);">
      <div>
        <div style="display: inline-block; background: rgba(197, 160, 89, 0.2); color: var(--color-gold-light); padding: 0.35rem 0.85rem; border-radius: 20px; font-weight: 700; font-size: 0.82rem; margin-bottom: 1rem;">
          NO INSURANCE? NO PROBLEM.
        </div>
        <h2 style="font-size: 2.3rem; color: #ffffff; margin-bottom: 1rem;">Aura Atelier VIP Wellness Club</h2>
        <p style="color: #94a3b8; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
          Our in-house membership plan replaces confusing dental insurance deductibles and waiting periods with straightforward comprehensive coverage.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.95rem;">
          <li style="display: flex; gap: 0.5rem; align-items: center;">✓ <strong>2 Free Preventive Cleanings & Exams</strong> annually</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;">✓ <strong>Unlimited Low-Radiation Digital X-Rays</strong> included</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;">✓ <strong>1 Free Emergency Exam</strong> per year</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;">✓ <strong>20% Flat Discount</strong> on all cosmetic veneers, crowns, and implants</li>
        </ul>
      </div>

      <!-- Pricing Card -->
      <div style="background: #ffffff; color: var(--color-obsidian); padding: 2.5rem; border-radius: 18px; text-align: center; box-shadow: var(--shadow-xl); border: 1px solid var(--color-slate-200);">
        <div style="font-size: 0.88rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Individual Membership</div>
        <div style="font-family: var(--font-display); font-size: 3.5rem; font-weight: 800; color: var(--color-gold-dark); margin: 0.5rem 0;">
          $29<span style="font-size: 1.2rem; color: #64748b; font-weight: 500;">/mo</span>
        </div>
        <p style="font-size: 0.88rem; color: #64748b; margin-bottom: 1.5rem;">Or $319 billed annually (Save $29). No waiting periods. Active immediately upon sign up.</p>
        <a href="booking.php" class="btn btn-gold" style="width: 100%;">Enroll in VIP Club Today</a>
      </div>
    </div>
  </div>
</section>

<!-- Accepted Insurances & 0% Financing -->
<section style="padding: 6rem 0; background: #ffffff;">
  <div class="container" style="text-align: center;">
    <div class="section-header">
      <div class="section-tag">Insurance & Payment Partners</div>
      <h2 class="section-title">We Maximize Your Benefits</h2>
      <p class="section-subtitle">
        We are in-network with premier PPO providers and handle all claims processing directly with your insurer.
      </p>
    </div>

    <!-- Insurance Badges -->
    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; justify-content: center; align-items: center; margin-bottom: 3.5rem;">
      <div style="padding: 1rem 1.8rem; border: 1.5px solid var(--color-slate-200); border-radius: 12px; font-weight: 700; color: #334155;">Delta Dental PPO</div>
      <div style="padding: 1rem 1.8rem; border: 1.5px solid var(--color-slate-200); border-radius: 12px; font-weight: 700; color: #334155;">MetLife Dental</div>
      <div style="padding: 1rem 1.8rem; border: 1.5px solid var(--color-slate-200); border-radius: 12px; font-weight: 700; color: #334155;">Cigna Healthcare</div>
      <div style="padding: 1rem 1.8rem; border: 1.5px solid var(--color-slate-200); border-radius: 12px; font-weight: 700; color: #334155;">Aetna Dental</div>
      <div style="padding: 1rem 1.8rem; border: 1.5px solid var(--color-slate-200); border-radius: 12px; font-weight: 700; color: #334155;">Guardian Life</div>
      <div style="padding: 1rem 1.8rem; border: 1.5px solid var(--color-slate-200); border-radius: 12px; font-weight: 700; color: #334155;">BlueCross BlueShield</div>
    </div>

    <!-- 0% Financing Card -->
    <div style="max-width: 800px; margin: 0 auto; background: var(--color-alabaster); border: 1px solid var(--color-slate-200); border-radius: 16px; padding: 2rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem; text-align: left;">
      <div>
        <h4 style="font-size: 1.25rem; color: var(--color-obsidian); margin-bottom: 0.35rem;">0% APR Interest Financing via CareCredit®</h4>
        <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Break treatments into manageable 6, 12, or 24 monthly installments with zero interest.</p>
      </div>
      <a href="booking.php" class="btn btn-obsidian">Apply in 60 Seconds</a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
