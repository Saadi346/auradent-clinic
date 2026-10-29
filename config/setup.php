<?php
/**
 * AuraDent Database Auto-Initializer & Seeder
 * Creates tables and seeds initial doctors, services, bookings, and admin account.
 */

function initializeDatabase(PDO $pdo, string $driver = 'sqlite'): void {
    $autoIncrement = ($driver === 'sqlite') ? 'INTEGER PRIMARY KEY AUTOINCREMENT' : 'INT AUTO_INCREMENT PRIMARY KEY';

    // 1. Admins Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id $autoIncrement,
        username VARCHAR(50) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        full_name VARCHAR(100) NOT NULL,
        role VARCHAR(20) DEFAULT 'admin',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 2. Doctors Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS doctors (
        id $autoIncrement,
        name VARCHAR(100) NOT NULL,
        title VARCHAR(100) NOT NULL,
        qualifications VARCHAR(100) NOT NULL,
        specialty VARCHAR(100) NOT NULL,
        experience_years INT DEFAULT 10,
        bio TEXT NOT NULL,
        schedule_days VARCHAR(100) DEFAULT 'Mon, Tue, Wed, Thu, Fri',
        hours_text VARCHAR(100) DEFAULT '8:30 AM - 5:00 PM',
        avatar_url VARCHAR(255) DEFAULT 'assets/images/doctor-sarah.jpg',
        is_active INT DEFAULT 1,
        display_order INT DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 3. Services Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS services (
        id $autoIncrement,
        slug VARCHAR(100) NOT NULL UNIQUE,
        name VARCHAR(150) NOT NULL,
        category VARCHAR(80) NOT NULL,
        short_description TEXT NOT NULL,
        full_description TEXT NOT NULL,
        price_starting DECIMAL(10, 2) NOT NULL,
        duration_mins INT DEFAULT 60,
        icon VARCHAR(50) DEFAULT 'tooth',
        is_featured INT DEFAULT 1,
        display_order INT DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 4. Bookings Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS bookings (
        id $autoIncrement,
        booking_reference VARCHAR(20) NOT NULL UNIQUE,
        doctor_id INT NULL,
        service_id INT NULL,
        patient_name VARCHAR(120) NOT NULL,
        patient_email VARCHAR(120) NOT NULL,
        patient_phone VARCHAR(50) NOT NULL,
        patient_dob DATE NULL,
        appointment_date DATE NOT NULL,
        appointment_time VARCHAR(20) NOT NULL,
        is_new_patient INT DEFAULT 1,
        is_emergency INT DEFAULT 0,
        notes TEXT NULL,
        status VARCHAR(20) DEFAULT 'pending',
        admin_notes TEXT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 5. Patient Reviews Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS reviews (
        id $autoIncrement,
        patient_name VARCHAR(100) NOT NULL,
        treatment VARCHAR(100) NOT NULL,
        rating INT NOT NULL CHECK(rating >= 1 AND rating <= 5),
        comment TEXT NOT NULL,
        is_verified INT DEFAULT 1,
        is_approved INT DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 6. Contact Inquiries Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS inquiries (
        id $autoIncrement,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL,
        phone VARCHAR(50) NULL,
        subject VARCHAR(150) NOT NULL,
        message TEXT NOT NULL,
        status VARCHAR(20) DEFAULT 'unread',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // Check if seeded
    $countAdmins = $pdo->query("SELECT COUNT(*) FROM admins")->fetchColumn();
    if ($countAdmins > 0) {
        return; // Already seeded
    }

    // Seed Default Admin (username: admin, pass: admin123)
    $adminPass = password_hash('admin123', PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO admins (username, password_hash, full_name, role) VALUES (?, ?, ?, ?)");
    $stmt->execute(['admin', $adminPass, 'Dr. Sarah Jensen (Director)', 'superadmin']);

    // Seed Doctors
    $doctors = [
        [
            'name' => 'Dr. Sarah Jensen',
            'title' => 'Clinical Director & Lead Cosmetic Dentist',
            'qualifications' => 'DDS, AACD Accredited Fellow',
            'specialty' => 'Cosmetic Dentistry & Smile Makeovers',
            'experience_years' => 14,
            'bio' => 'Harvard School of Dental Medicine graduate with over 14 years of aesthetic smile design experience. Dr. Jensen combines artistic precision with micro-invasive techniques to sculpt natural, enduring smiles.',
            'schedule_days' => 'Mon, Tue, Wed, Thu',
            'hours_text' => '8:30 AM - 5:00 PM',
            'avatar_url' => 'assets/images/doctor-sarah.jpg',
            'is_active' => 1,
            'display_order' => 1
        ],
        [
            'name' => 'Dr. Marcus Vance',
            'title' => 'Chief Implantologist & Periodontal Surgeon',
            'qualifications' => 'DMD, MS, Board Certified Periodontist',
            'specialty' => 'Dental Implants & All-On-4 Restorations',
            'experience_years' => 16,
            'bio' => 'Columbia University alumnus and pioneer in computer-guided 3D dental implantology. Dr. Vance has placed over 4,500 successful implants with a 99.4% lifetime integration rate.',
            'schedule_days' => 'Tue, Wed, Thu, Fri',
            'hours_text' => '9:00 AM - 5:30 PM',
            'avatar_url' => 'assets/images/doctor-marcus.svg',
            'is_active' => 1,
            'display_order' => 2
        ],
        [
            'name' => 'Dr. Elena Rostova',
            'title' => 'Specialist Orthodontist & Clear Aligner Expert',
            'qualifications' => 'DDS, MS Ortho, Invisalign Diamond Provider',
            'specialty' => 'Invisalign®, Clear Aligners & Adult Orthodontics',
            'experience_years' => 11,
            'bio' => 'NYU College of Dentistry graduate specializing in accelerated invisible orthodontics. Recognized as a Top 1% Invisalign Diamond Provider nationwide with 1,800+ completed aligner cases.',
            'schedule_days' => 'Mon, Wed, Fri, Sat',
            'hours_text' => '9:00 AM - 6:00 PM',
            'avatar_url' => 'assets/images/doctor-elena.svg',
            'is_active' => 1,
            'display_order' => 3
        ],
        [
            'name' => 'Dr. David Chen',
            'title' => 'Micro-Endodontist & Root Canal Specialist',
            'qualifications' => 'DMD, Certificate in Endodontics (UPenn)',
            'specialty' => 'Microscopic Root Canal Therapy & Pain Management',
            'experience_years' => 9,
            'bio' => 'Trained at the University of Pennsylvania, Dr. Chen utilizes 3D Zeiss surgical microscopes to deliver virtually painless single-visit root canal treatments, preserving natural dentition.',
            'schedule_days' => 'Mon, Tue, Thu, Fri',
            'hours_text' => '8:00 AM - 4:30 PM',
            'avatar_url' => 'assets/images/doctor-david.svg',
            'is_active' => 1,
            'display_order' => 4
        ],
        [
            'name' => 'Dr. Maya Patel',
            'title' => 'Pediatric Dentist & Family Wellness Lead',
            'qualifications' => 'DDS, Board Certified Pediatric Dentist',
            'specialty' => 'Pediatric Dentistry & Gentle Preventive Care',
            'experience_years' => 8,
            'bio' => 'UCSF trained pediatric specialist renowned for turning dental anxiety into joyful clinic visits. Dedicated to gentle child dental exams, cavity sealants, and lifelong oral health habits.',
            'schedule_days' => 'Wed, Thu, Fri, Sat',
            'hours_text' => '9:30 AM - 5:00 PM',
            'avatar_url' => 'assets/images/doctor-maya.svg',
            'is_active' => 1,
            'display_order' => 5
        ]
    ];

    $docStmt = $pdo->prepare("INSERT INTO doctors (name, title, qualifications, specialty, experience_years, bio, schedule_days, hours_text, avatar_url, is_active, display_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($doctors as $d) {
        $docStmt->execute([
            $d['name'], $d['title'], $d['qualifications'], $d['specialty'], $d['experience_years'],
            $d['bio'], $d['schedule_days'], $d['hours_text'], $d['avatar_url'], $d['is_active'], $d['display_order']
        ]);
    }

    // Seed Comprehensive Services Catalog
    $services = [
        [
            'slug' => 'teeth-whitening',
            'name' => 'Zoom!® In-Office Laser Teeth Whitening',
            'category' => 'Cosmetic Dentistry',
            'short_description' => 'Brighten your smile up to 8 shades in a single 60-minute relaxing session with zero sensitivity laser technology.',
            'full_description' => 'Our clinical-grade Philips Zoom! WhiteSpeed laser treatment removes deep enamel stains caused by coffee, wine, tea, and aging. Formulated with ACP (Amorphous Calcium Phosphate) to protect tooth enamel and dramatically minimize sensitivity.',
            'price_starting' => 349.00,
            'duration_mins' => 60,
            'icon' => 'sparkles',
            'is_featured' => 1,
            'display_order' => 1
        ],
        [
            'slug' => 'porcelain-veneers',
            'name' => 'Custom Handcrafted Porcelain Veneers',
            'category' => 'Cosmetic Dentistry',
            'short_description' => 'Ultra-thin, custom porcelain laminates crafted to correct chips, gaps, alignment, and severe discoloration permanently.',
            'full_description' => 'Individually sculpted by master ceramists using high-grade e.max lithium disilicate porcelain. In just two visits, achieve a perfectly harmonious, red-carpet smile tailored to your unique facial geometry and skin tone.',
            'price_starting' => 950.00,
            'duration_mins' => 90,
            'icon' => 'smile',
            'is_featured' => 1,
            'display_order' => 2
        ],
        [
            'slug' => 'dental-implants',
            'name' => 'Computer-Guided 3D Dental Implants',
            'category' => 'Restorative & Implants',
            'short_description' => 'Permanent titanium and zirconia tooth replacements with natural chewing strength, lifetime longevity, and aesthetic crown.',
            'full_description' => 'Replace single missing teeth or support full arches with 3D CBCT digital guided surgery. Implants fuse seamlessly with your jawbone to prevent bone loss, restore bite force, and look indistinguishable from natural teeth.',
            'price_starting' => 1850.00,
            'duration_mins' => 90,
            'icon' => 'implant',
            'is_featured' => 1,
            'display_order' => 3
        ],
        [
            'slug' => 'all-on-4-implants',
            'name' => 'All-on-4® Full-Arch Smile Rehabilitation',
            'category' => 'Restorative & Implants',
            'short_description' => 'A complete, fixed full arch of gorgeous replacement teeth anchored securely on 4 to 6 precision implants in a single day.',
            'full_description' => 'The ultimate solution for patients facing failing dentition or loose dentures. Walk out with a fixed, permanent set of non-removable teeth in just one surgical appointment using our revolutionary Immediate Smile protocol.',
            'price_starting' => 9500.00,
            'duration_mins' => 180,
            'icon' => 'arch',
            'is_featured' => 1,
            'display_order' => 4
        ],
        [
            'slug' => 'invisalign-orthodontics',
            'name' => 'Invisalign® Clear Aligner Therapy',
            'category' => 'Orthodontics',
            'short_description' => 'Straighten crowded, gapped, or misaligned teeth discretely with virtually invisible, removable custom aligners.',
            'full_description' => 'Powered by SmartTrack® medical plastic and ClinCheck® 3D predictive simulation. See your future straight smile before even starting treatment. Removable for easy brushing and unrestricted eating.',
            'price_starting' => 2800.00,
            'duration_mins' => 45,
            'icon' => 'aligner',
            'is_featured' => 1,
            'display_order' => 5
        ],
        [
            'slug' => 'root-canal-therapy',
            'name' => 'Microscopic Painless Root Canal Therapy',
            'category' => 'Endodontics',
            'short_description' => 'Save infected or damaged natural teeth with gentle, high-precision micro-endodontic treatment under local anesthesia.',
            'full_description' => 'Forget old dental myths—our microscopic root canal therapy is as painless and comfortable as receiving a simple filling. Advanced rotary instruments and antimicrobial irrigants thoroughly disinfect the pulp chamber.',
            'price_starting' => 750.00,
            'duration_mins' => 75,
            'icon' => 'microscope',
            'is_featured' => 1,
            'display_order' => 6
        ],
        [
            'slug' => 'general-cleanings',
            'name' => 'Comprehensive Oral Exam & Ultrasonic Cleaning',
            'category' => 'Preventive & General',
            'short_description' => 'Gentle ultrasonic tartar debridement, digital low-radiation x-rays, oral cancer screening, and protective fluoride varnish.',
            'full_description' => 'Maintain optimal oral hygiene with gentle piezoelectric ultrasonic scaling, gentle polishing, periodontal pocket depth charting, and comprehensive oral cancer examination by our certified dental hygienists.',
            'price_starting' => 160.00,
            'duration_mins' => 60,
            'icon' => 'shield-check',
            'is_featured' => 1,
            'display_order' => 7
        ],
        [
            'slug' => 'periodontal-gum-therapy',
            'name' => 'Laser Periodontal Care & Deep Scaling',
            'category' => 'Periodontics',
            'short_description' => 'Halt gum disease, reverse bleeding gums, and eliminate deep bacterial pockets with non-surgical laser periodontal therapy.',
            'full_description' => 'Targeted scaling and root planing (deep cleaning) coupled with diode laser disinfection cleans beneath the gumline, promoting natural tissue re-attachment and guarding against tooth loosening.',
            'price_starting' => 420.00,
            'duration_mins' => 60,
            'icon' => 'laser',
            'is_featured' => 0,
            'display_order' => 8
        ],
        [
            'slug' => 'pediatric-dentistry',
            'name' => 'Gentle Pediatric & Children’s Dentistry',
            'category' => 'Pediatric Care',
            'short_description' => 'Fun, warm, fear-free dental visits for toddlers, children, and teens with fluoride treatments and protective tooth sealants.',
            'full_description' => 'We create wonderful first dental impressions! Our child-friendly rooms, gentle terminology, positive reinforcement, and protective dental sealants safeguard growing smiles from early decay.',
            'price_starting' => 120.00,
            'duration_mins' => 45,
            'icon' => 'heart',
            'is_featured' => 0,
            'display_order' => 9
        ],
        [
            'slug' => 'emergency-dental-care',
            'name' => '24/7 Same-Day Emergency Dental Relief',
            'category' => 'Emergency Care',
            'short_description' => 'Immediate emergency triage for severe toothaches, chipped/knocked-out teeth, lost crowns, and acute dental abscesses.',
            'full_description' => 'Dental emergencies cannot wait. We reserve priority daily slots for urgent walk-ins and phone calls. Instant digital diagnostics, immediate pain cessation, and stabilization guarantee rapid relief.',
            'price_starting' => 195.00,
            'duration_mins' => 45,
            'icon' => 'emergency',
            'is_featured' => 1,
            'display_order' => 10
        ],
        [
            'slug' => 'wisdom-teeth-extraction',
            'name' => 'Gentle Wisdom Teeth & Surgical Extractions',
            'category' => 'Oral Surgery',
            'short_description' => 'Minimally invasive extractions of impacted or problematic third molars with comforting sedation options.',
            'full_description' => 'Safe removal of impacted or crowded wisdom teeth using 3D nerve mapping and atraumatic surgical techniques. Rapid recovery protocols minimize post-operative swelling and discomfort.',
            'price_starting' => 380.00,
            'duration_mins' => 60,
            'icon' => 'scissors',
            'is_featured' => 0,
            'display_order' => 11
        ],
        [
            'slug' => 'sedation-sleep-dentistry',
            'name' => 'Comfort Sedation & Sleep Dentistry',
            'category' => 'Patient Comfort',
            'short_description' => 'Relax completely through your appointment with mild nitrous oxide (laughing gas) or calming oral conscious sedation.',
            'full_description' => 'Never let dental phobia stand between you and your optimal health. Our board-certified sedation techniques allow anxious patients to undergo multiple procedures in a dreamlike, anxiety-free state.',
            'price_starting' => 220.00,
            'duration_mins' => 60,
            'icon' => 'moon',
            'is_featured' => 0,
            'display_order' => 12
        ]
    ];

    $srvStmt = $pdo->prepare("INSERT INTO services (slug, name, category, short_description, full_description, price_starting, duration_mins, icon, is_featured, display_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($services as $s) {
        $srvStmt->execute([
            $s['slug'], $s['name'], $s['category'], $s['short_description'], $s['full_description'],
            $s['price_starting'], $s['duration_mins'], $s['icon'], $s['is_featured'], $s['display_order']
        ]);
    }

    // Seed Sample Bookings
    $sampleBookings = [
        [
            'ref' => 'AUR-10492',
            'doc_id' => 1,
            'srv_id' => 1,
            'name' => 'Charlotte Montgomery',
            'email' => 'charlotte.m@gmail.com',
            'phone' => '+1 (555) 234-8901',
            'dob' => '1992-04-15',
            'date' => date('Y-m-d', strtotime('+1 day')),
            'time' => '10:00 AM',
            'is_new' => 1,
            'is_em' => 0,
            'notes' => 'Looking to brighten smile before upcoming wedding ceremony.',
            'status' => 'confirmed'
        ],
        [
            'ref' => 'AUR-29831',
            'doc_id' => 2,
            'srv_id' => 3,
            'name' => 'Alexander Hayes',
            'email' => 'alex.hayes@businesscorp.com',
            'phone' => '+1 (555) 876-1234',
            'dob' => '1984-11-20',
            'date' => date('Y-m-d', strtotime('+2 days')),
            'time' => '02:00 PM',
            'is_new' => 0,
            'is_em' => 0,
            'notes' => 'Follow up consultation for lower molar implant restoration.',
            'status' => 'pending'
        ],
        [
            'ref' => 'AUR-34190',
            'doc_id' => 3,
            'srv_id' => 5,
            'name' => 'Sophia Lin',
            'email' => 'sophia.lin@designlab.io',
            'phone' => '+1 (555) 432-9876',
            'dob' => '1998-07-03',
            'date' => date('Y-m-d', strtotime('+3 days')),
            'time' => '11:30 AM',
            'is_new' => 1,
            'is_em' => 0,
            'notes' => 'Interested in Invisalign for minor crowding on lower teeth.',
            'status' => 'pending'
        ],
        [
            'ref' => 'AUR-48201',
            'doc_id' => 4,
            'srv_id' => 10,
            'name' => 'Michael Sterling',
            'email' => 'msterling@venture.org',
            'phone' => '+1 (555) 789-3210',
            'dob' => '1979-02-18',
            'date' => date('Y-m-d'),
            'time' => '04:00 PM',
            'is_new' => 1,
            'is_em' => 1,
            'notes' => 'Severe throbbing pain in upper left quadrant since last night.',
            'status' => 'confirmed'
        ],
        [
            'ref' => 'AUR-51092',
            'doc_id' => 1,
            'srv_id' => 2,
            'name' => 'Jessica Miller',
            'email' => 'jessica.m@outlook.com',
            'phone' => '+1 (555) 901-2345',
            'dob' => '1995-09-12',
            'date' => date('Y-m-d', strtotime('-2 days')),
            'time' => '09:00 AM',
            'is_new' => 0,
            'is_em' => 0,
            'notes' => 'Completed 6 upper front veneers final placement. Ecstatic with results!',
            'status' => 'completed'
        ]
    ];

    $bookStmt = $pdo->prepare("INSERT INTO bookings (booking_reference, doctor_id, service_id, patient_name, patient_email, patient_phone, patient_dob, appointment_date, appointment_time, is_new_patient, is_emergency, notes, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($sampleBookings as $b) {
        $bookStmt->execute([
            $b['ref'], $b['doc_id'], $b['srv_id'], $b['name'], $b['email'], $b['phone'],
            $b['dob'], $b['date'], $b['time'], $b['is_new'], $b['is_em'], $b['notes'], $b['status']
        ]);
    }

    // Seed Verified Patient Reviews
    $reviews = [
        [
            'name' => 'Evelyn Carter',
            'treatment' => 'Porcelain Veneers & Smile Makeover',
            'rating' => 5,
            'comment' => 'Dr. Sarah Jensen is an absolute cosmetic genius. I was always self-conscious about my smile in photos, but after receiving 8 handcrafted veneers, my confidence has soared. The clinic looks like a 5-star boutique spa and I felt zero pain throughout the entire procedure!',
            'is_verified' => 1,
            'is_approved' => 1
        ],
        [
            'name' => 'Robert K. Vance',
            'treatment' => 'Full Arch Dental Implants',
            'rating' => 5,
            'comment' => 'I cannot thank Dr. Marcus Vance enough. I struggled with loose partial dentures for years. The 3D-guided implant surgery was flawless and I was eating solid foods in no time. Truly world-class medical engineering.',
            'is_verified' => 1,
            'is_approved' => 1
        ],
        [
            'name' => 'Danielle Wu',
            'treatment' => 'Invisalign® Clear Aligners',
            'rating' => 5,
            'comment' => 'Completed my Invisalign program with Dr. Elena in just 7 months! The 3D digital simulation previewed my exact smile outcome before we even started. Scheduling appointments online was so seamless.',
            'is_verified' => 1,
            'is_approved' => 1
        ],
        [
            'name' => 'James Thornton',
            'treatment' => 'Emergency Root Canal',
            'rating' => 5,
            'comment' => 'I had agonizing pain on a Friday evening. AuraDent took me in within 45 minutes as an emergency. Dr. David Chen performed the root canal under the microscope—I literally fell asleep in the chair with their ceiling TV and noise-canceling headphones!',
            'is_verified' => 1,
            'is_approved' => 1
        ]
    ];

    $revStmt = $pdo->prepare("INSERT INTO reviews (patient_name, treatment, rating, comment, is_verified, is_approved) VALUES (?, ?, ?, ?, ?, ?)");
    foreach ($reviews as $r) {
        $revStmt->execute([$r['name'], $r['treatment'], $r['rating'], $r['comment'], $r['is_verified'], $r['is_approved']]);
    }
}
