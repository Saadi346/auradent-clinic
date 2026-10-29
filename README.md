# 💎 Aura Dental Atelier & Implant Institute

> **An ultra-modern, high-precision aesthetic dentistry web application featuring a bespoke Swiss/Nordic luxury design system (Champagne Gold, Obsidian & Porcelain White), a floating glassmorphic island navbar, native-style mobile bottom app dock, interactive 5-step online booking wizard, smile concierge treatment finder, before-and-after smile transformation slider, and an administrative dashboard for appointment and doctor roster management.**

---

## 🎨 New Unique Design Architecture & Theme

### 1. Bespoke Luxury Atelier Aesthetics
- **Color Palette**:
  - **Champagne Gold (`#c5a059` / `#e6ca85`)**: Used for brand crests, interactive accents, pricing highlights, and primary CTAs.
  - **Obsidian Black / Deep Slate (`#080c14` / `#131b2e`)**: High-fashion contrast dark sections, hero card frames, and typography.
  - **Porcelain & Alabaster (`#ffffff` / `#f8fafc`)**: Crisp, soothing clinical canvas.
  - **Emerald (`#059669`)**: Live operatory status and verified visit indicators.
- **Typography**: Editorial modern typography pairing **Outfit** and **Plus Jakarta Sans** with clean letter-spacing.

---

### 2. 📱 100% Phone-Screen Friendly Architecture
- **Floating Island Navbar (`.island-nav`)**:
  - Desktop: Centered floating pill with frosted acrylic blur (`backdrop-filter: blur(20px)`), brand crest, neat navigation links with active state pills, and glowing gold CTA.
  - Mobile: Automatically converts to a compact header with emergency dial and animated hamburger toggle.
- **Native-Style Mobile Bottom App Dock (`.mobile-bottom-dock`)**:
  - Automatically appears at the bottom of the screen on smartphones (`<= 768px`).
  - Provides thumb-friendly navigation:
    1. 🏠 **Home**
    2. 🩺 **Services**
    3. 📅 **Elevated Center "Book" Button** with champagne gold halo
    4. 👨‍⚕️ **Doctors**
    5. 📞 **Instant Call**
- **Slide-Out Off-Canvas Drawer Sheet (`.mobile-drawer`)**:
  - Smooth slide-out menu with all website pages, clinical hours, and direct 24/7 emergency hotline.

---

### 3. ✨ Redesigned Homepage Components
- **Asymmetric Luxury Editorial Hero**:
  - Live status chip: *"Midtown Operatory Open • 8:00 AM – 7:00 PM"*.
  - Headline: *"Where Biological Precision Meets Aesthetic Mastery"*.
  - 3-column sensory chips: The Wand® Anesthesia, iTero 5D Optical 3D, and Bose® Sensory Comfort.
  - Interactive on-call specialist card with Dr. Sarah Jensen's photo, qualifications, and direct booking chip.
- **Interactive "Smile Goals Concierge"**:
  - 4 interactive goal selector pills:
    - 💎 *Aesthetic Smile Makeover* (Porcelain Veneers)
    - 🔩 *Restore Missing Teeth* (3D Guided Implants & All-on-4)
    - 🦷 *Discreet Straightening* (Invisalign® Diamond Aligner)
    - 🚨 *Acute Pain Relief* (Same-day emergency relief)
- **High-Tech & Sensory Experience Bento Grid**:
  - 4 asymmetric cards highlighting the Wand® Painless Delivery, Optical 3D In-House Impressions, Acoustic Spa Suites, and Class-B Hospital Cleanroom Sterilization.
- **Before & After Smile Transformation Stage**:
  - Obsidian luxury frame with champagne gold divider handle allowing prospective patients to slide left and right to inspect clinical transformations.

---

## 🌐 Full Multi-Page Navigation Breakdown
Every navigation option has its own dedicated page:
- 🏠 **Home ([index.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/index.php))**: Redesigned luxury hero, smile concierge, bento box grid, and before/after slider.
- 📖 **The Atelier ([about.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/about.php))**: Founding story by Dr. Sarah Jensen, 4 pillars of patient care, 3D equipment spotlight, and anxiety FAQs.
- 🩺 **Procedures ([services.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/services.php))**: Every single dental service cataloged in depth with category filters, starting fees, and direct booking links.
- 👨‍⚕️ **Specialists ([dentists.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/dentists.php))**: Harvard and Columbia trained doctors roster with consultation hours and experience badges.
- ✨ **Smile Gallery ([gallery.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/gallery.php))**: 60fps hardware-accelerated before/after split slider with case presets, procedure category filters, interactive card Before/After state flip toggles, and clinical case inspection modals.
- 💳 **Pricing & Plans ([pricing.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/pricing.php))**: Fee schedules, insurance partners, 0% APR financing, and VIP Wellness Club ($29/mo).
- ⭐ **Reviews ([reviews.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/reviews.php))**: 4.9-star rating breakdown and interactive review submission form.
- 📍 **Coordinates & Map ([contact.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/contact.php))**: Office directions, emergency line, hours, and interactive inquiry form.
- 📅 **Online Booking ([booking.php](file:///c:/xampp/htdocs/Personal%20work/auradent-clinic/booking.php))**: 5-step automated appointment scheduling wizard.

---

## 🔐 Separate Applications Architecture

The application has been completely separated into two distinct entities:

### 1. 🌐 Public Patient Website
- **Dedicated URL**: [http://localhost:8000/](http://localhost:8000/)
- **Purpose**: Full patient-facing luxury experience with zero admin or staff links visible anywhere in the UI (navbars, drawers, bottom dock, and footers are strictly for patients).
- **Includes**: 10 dedicated pages, interactive 5-step booking wizard, live slot availability, smile goals concierge, before/after slider, and phone-friendly app dock.

### 2. 🎛️ Standalone Admin Control Panel
- **Dedicated URL**: [http://localhost:8080/](http://localhost:8080/)
- **Alternate Route**: [http://localhost:8000/admin/](http://localhost:8000/admin/)
- **Demo Credentials**:
  - **Username**: `admin`
  - **Password**: `admin123`
  - *(Features a 1-click **"Click to Auto-Fill Credentials"** button on the login screen).*

### Admin Control Panel Features:
- **100% Phone-Screen Friendly**: Features a native mobile bottom app dock, topbar hamburger menu with off-canvas slide-out drawer, touch-scrollable filter chips, responsive card view for appointments and procedures, and bottom-sheet modals.
- **Operations Dashboard ([admin/index.php](file:///c:/xampp/htdocs/auradent-clinic/admin/index.php))**: Real-time KPI cards, live search, status filtering, AJAX instant status changer, and clinical patient intake notes modal.
- **Doctors Roster ([admin/doctors.php](file:///c:/xampp/htdocs/auradent-clinic/admin/doctors.php))**: Add/edit dental specialists, manage room schedules, and toggle active/on-leave status.
- **Procedures & Fees Manager ([admin/services.php](file:///c:/xampp/htdocs/auradent-clinic/admin/services.php))**: Add/edit dental procedures, update pricing schedules, and toggle homepage featured status.

---

## 🚀 How to Run Locally

Both servers are currently running and live:
- **Patient Website**: `http://localhost:8000/`
- **Admin Control Panel**: `http://localhost:8080/`

To start or restart both with a single click at any time:
- Double click [`start_both_servers.bat`](file:///c:/xampp/htdocs/auradent-clinic/start_both_servers.bat) in Windows Explorer.
- Or run in terminal:
  ```powershell
  cd "C:\xampp\htdocs\auradent-clinic"

  # Patient Website
  & "C:\xampp\php\php.exe" -S localhost:8000

  # Standalone Admin Control Panel
  & "C:\xampp\php\php.exe" -S localhost:8080 "admin_router.php"
  ```
