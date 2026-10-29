<?php
/**
 * Aura Dental Atelier - Unique Floating Island Header & Mobile App Dock
 */

require_once __DIR__ . '/functions.php';
$currentPage = $currentPage ?? 'home';
$pageTitle = $pageTitle ?? 'Aura Dental Atelier | High-Precision Aesthetic Dentistry';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="Aura Dental Atelier provides high-precision cosmetic dentistry, 3D dental implants, porcelain veneers, and Invisalign in New York.">
  <meta name="theme-color" content="#080c14">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>💎</text></svg>">
</head>
<body>

  <!-- Floating Luxury Island Navbar -->
  <div class="island-nav-wrapper">
    <header class="island-nav" id="islandNav">
      <!-- Brand Crest & Logo -->
      <a href="index.php" class="brand-island" aria-label="Aura Dental Atelier Home">
        <div class="brand-crest">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2C8.5 2 6 4.5 6 8c0 3 1.5 5.5 2.5 8 .8 2 1.5 4 3.5 4s2.7-2 3.5-4c1-2.5 2.5-5 2.5-8 0-3.5-2.5-6-6-6z"/>
            <path d="M10 9a2 2 0 0 1 4 0"/>
          </svg>
        </div>
        <div class="brand-title">
          <span class="brand-name">AURA <span class="gold-text">ATELIER</span></span>
          <span class="brand-sub">Aesthetic & Implants</span>
        </div>
      </a>

      <!-- Desktop Nav Menu (Every Option Has Its Own Dedicated Page) -->
      <nav aria-label="Primary Navigation">
        <ul class="nav-island-menu">
          <li><a href="index.php" class="nav-island-link <?= ($currentPage === 'home') ? 'active' : '' ?>">Home</a></li>
          <li><a href="about.php" class="nav-island-link <?= ($currentPage === 'about') ? 'active' : '' ?>">Atelier</a></li>
          <li><a href="services.php" class="nav-island-link <?= ($currentPage === 'services') ? 'active' : '' ?>">Services</a></li>
          <li><a href="dentists.php" class="nav-island-link <?= ($currentPage === 'dentists') ? 'active' : '' ?>">Specialists</a></li>
          <li><a href="gallery.php" class="nav-island-link <?= ($currentPage === 'gallery') ? 'active' : '' ?>">Gallery</a></li>
          <li><a href="pricing.php" class="nav-island-link <?= ($currentPage === 'pricing') ? 'active' : '' ?>">Pricing</a></li>
          <li><a href="reviews.php" class="nav-island-link <?= ($currentPage === 'reviews') ? 'active' : '' ?>">Reviews</a></li>
          <li><a href="contact.php" class="nav-island-link <?= ($currentPage === 'contact') ? 'active' : '' ?>">Contact</a></li>
        </ul>
      </nav>

      <!-- Right Actions: Phone + Gold Booking Button -->
      <div class="nav-island-actions">
        <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_PHONE) ?>" class="btn btn-outline btn-sm" style="display: none; @media(min-width: 900px){display: inline-flex;}">
          <span>📞</span>
          <span><?= APP_PHONE ?></span>
        </a>
        <a href="booking.php" class="btn btn-gold btn-sm">
          <span>📅</span>
          <span>Book Appointment</span>
        </a>
        <button class="mobile-hamburger" id="mobileDrawerOpen" aria-label="Open mobile navigation menu">
          &#9776;
        </button>
      </div>
    </header>
  </div>

  <!-- Mobile Slide-Out Drawer Sheet -->
  <div class="mobile-drawer-overlay" id="mobileDrawerOverlay"></div>
  <aside class="mobile-drawer" id="mobileDrawer" aria-label="Mobile Navigation Drawer">
    <div class="drawer-header">
      <div class="brand-island">
        <div class="brand-crest">💎</div>
        <div class="brand-title">
          <span class="brand-name">AURA <span class="gold-text">ATELIER</span></span>
          <span class="brand-sub">Dental Medicine</span>
        </div>
      </div>
      <button class="drawer-close" id="mobileDrawerClose" aria-label="Close menu">&times;</button>
    </div>

    <ul class="drawer-links">
      <li><a href="index.php" class="drawer-link <?= ($currentPage === 'home') ? 'active' : '' ?>"><span>🏠 Home</span> <span>&rarr;</span></a></li>
      <li><a href="about.php" class="drawer-link <?= ($currentPage === 'about') ? 'active' : '' ?>"><span>🏛️ The Atelier & Tech</span> <span>&rarr;</span></a></li>
      <li><a href="services.php" class="drawer-link <?= ($currentPage === 'services') ? 'active' : '' ?>"><span>🩺 Dental Procedures</span> <span>&rarr;</span></a></li>
      <li><a href="dentists.php" class="drawer-link <?= ($currentPage === 'dentists') ? 'active' : '' ?>"><span>👨‍⚕️ Specialists Directory</span> <span>&rarr;</span></a></li>
      <li><a href="gallery.php" class="drawer-link <?= ($currentPage === 'gallery') ? 'active' : '' ?>"><span>✨ Smile Gallery</span> <span>&rarr;</span></a></li>
      <li><a href="pricing.php" class="drawer-link <?= ($currentPage === 'pricing') ? 'active' : '' ?>"><span>💳 Fees & Membership</span> <span>&rarr;</span></a></li>
      <li><a href="reviews.php" class="drawer-link <?= ($currentPage === 'reviews') ? 'active' : '' ?>"><span>⭐ Patient Stories</span> <span>&rarr;</span></a></li>
      <li><a href="contact.php" class="drawer-link <?= ($currentPage === 'contact') ? 'active' : '' ?>"><span>📍 Office & Coordinates</span> <span>&rarr;</span></a></li>
      <li><a href="booking.php" class="drawer-link <?= ($currentPage === 'booking') ? 'active' : '' ?>"><span>📅 Online Booking Wizard</span> <span>&rarr;</span></a></li>
    </ul>

    <div class="drawer-footer">
      <div style="font-size: 0.82rem; color: #64748b; margin-bottom: 0.75rem;">
        📍 <?= APP_ADDRESS ?><br>
        ⏰ Mon - Sat: 8:00 AM - 7:00 PM
      </div>
      <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_EMERGENCY_PHONE) ?>" class="btn btn-danger btn-sm" style="width: 100%;">
        🚨 Emergency: <?= APP_EMERGENCY_PHONE ?>
      </a>
    </div>
  </aside>

  <!-- Mobile Native Bottom App Dock (100% Phone Friendly) -->
  <nav class="mobile-bottom-dock" aria-label="Mobile Bottom App Bar">
    <div class="mobile-dock-inner">
      <a href="index.php" class="mobile-dock-item <?= ($currentPage === 'home') ? 'active' : '' ?>">
        <span class="mobile-dock-icon">🏠</span>
        <span>Home</span>
      </a>
      <a href="services.php" class="mobile-dock-item <?= ($currentPage === 'services') ? 'active' : '' ?>">
        <span class="mobile-dock-icon">🩺</span>
        <span>Services</span>
      </a>
      
      <!-- Elevated Center Booking Button -->
      <a href="booking.php" class="mobile-dock-item dock-center-book" aria-label="Book Appointment">
        <div class="dock-center-btn">
          <span>📅</span>
        </div>
        <span style="font-weight: 700; color: var(--color-gold);">Book</span>
      </a>

      <a href="dentists.php" class="mobile-dock-item <?= ($currentPage === 'dentists') ? 'active' : '' ?>">
        <span class="mobile-dock-icon">👨‍⚕️</span>
        <span>Doctors</span>
      </a>
      <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', APP_PHONE) ?>" class="mobile-dock-item">
        <span class="mobile-dock-icon">📞</span>
        <span>Call</span>
      </a>
    </div>
  </nav>
