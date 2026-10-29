<?php
/**
 * AuraDent Helper Functions & Security Utilities
 */

require_once __DIR__ . '/../config/db.php';

function sanitize(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function formatPrice(float|int|string $val): string {
    return '$' . number_format((float)$val, 2);
}

function formatDate(string $dateStr, string $format = 'M j, Y'): string {
    $ts = strtotime($dateStr);
    return $ts ? date($format, $ts) : $dateStr;
}

function generateBookingReference(): string {
    return 'AUR-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
}

function getCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(?string $token): bool {
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

function setFlashMessage(string $type, string $message): void {
    $_SESSION['flash'] = [
        'type' => $type, // 'success', 'error', 'info', 'warning'
        'message' => $message
    ];
}

function getFlashMessage(): ?array {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function isLoggedIn(): bool {
    return isset($_SESSION['admin_user_id']) && !empty($_SESSION['admin_user_id']);
}

function requireAuth(): void {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

// Data retrieval helpers
function getActiveDoctors(): array {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM doctors WHERE is_active = 1 ORDER BY display_order ASC");
    return $stmt->fetchAll();
}

function getAllDoctors(): array {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM doctors ORDER BY display_order ASC");
    return $stmt->fetchAll();
}

function getDoctorById(int $id): ?array {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM doctors WHERE id = ?");
    $stmt->execute([$id]);
    $doc = $stmt->fetch();
    return $doc ?: null;
}

function getAllServices(): array {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM services ORDER BY display_order ASC");
    return $stmt->fetchAll();
}

function getFeaturedServices(): array {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM services WHERE is_featured = 1 ORDER BY display_order ASC");
    return $stmt->fetchAll();
}

function getServiceById(int $id): ?array {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->execute([$id]);
    $srv = $stmt->fetch();
    return $srv ?: null;
}

function getServiceBySlug(string $slug): ?array {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM services WHERE slug = ?");
    $stmt->execute([$slug]);
    $srv = $stmt->fetch();
    return $srv ?: null;
}

function getApprovedReviews(int $limit = 10): array {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM reviews WHERE is_approved = 1 ORDER BY created_at DESC LIMIT ?");
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getPublicSiteUrl(): string {
    if (isset($_SERVER['SERVER_PORT']) && (string)$_SERVER['SERVER_PORT'] === '8080') {
        return 'http://localhost:8000/';
    }
    return '../index.php';
}
