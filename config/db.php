<?php
/**
 * AuraDent Dental Clinic & Implant Center
 * Database Configuration & Connection Engine
 * Supports SQLite (Zero-config default) and MySQL (Production toggle)
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database Driver Toggle: 'sqlite' or 'mysql'
define('DB_DRIVER', 'sqlite');

// SQLite Settings
define('SQLITE_FILE', __DIR__ . '/../data/auradent.sqlite');

// MySQL Settings (if user configures MySQL)
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'auradent_clinic');
define('DB_USER', 'root');
define('DB_PASS', '');

// App Meta Constants
define('APP_NAME', 'Aura Dental Atelier & Implant Institute');
define('APP_TAGLINE', 'High-Precision Aesthetic & Surgical Dentistry');
define('APP_PHONE', '+1 (800) 555-DENT');
define('APP_EMERGENCY_PHONE', '+1 (800) 911-SMILE');
define('APP_EMAIL', 'concierge@auradentalatelier.com');
define('APP_ADDRESS', '450 Lexington Ave, Suite 1200, New York, NY 10017');
define('APP_HOURS', 'Mon - Sat: 8:00 AM - 7:00 PM | Sun: Emergency Only');

/**
 * Returns a singleton PDO connection
 */
function getDBConnection(): PDO {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    try {
        if (DB_DRIVER === 'sqlite') {
            $dataDir = dirname(SQLITE_FILE);
            if (!is_dir($dataDir)) {
                mkdir($dataDir, 0777, true);
            }

            $firstTime = !file_exists(SQLITE_FILE);
            $pdo = new PDO('sqlite:' . SQLITE_FILE);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec('PRAGMA foreign_keys = ON;');

            if ($firstTime || filesize(SQLITE_FILE) === 0) {
                require_once __DIR__ . '/setup.php';
                initializeDatabase($pdo, 'sqlite');
            }
        } else {
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection error: " . htmlspecialchars($e->getMessage()));
    }
}
