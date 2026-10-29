<?php
/**
 * Admin API: Manage Doctors (Add, Edit, Toggle, Delete)
 */

header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../../includes/functions.php';

if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true) ?: $_POST;

$action = sanitize($data['action'] ?? 'save');
$pdo = getDBConnection();

try {
    if ($action === 'delete') {
        $id = (int)($data['id'] ?? 0);
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'Invalid Doctor ID']);
            exit;
        }
        $stmt = $pdo->prepare("DELETE FROM doctors WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Doctor deleted successfully']);
        exit;
    }

    if ($action === 'toggle_status') {
        $id = (int)($data['id'] ?? 0);
        $status = (int)($data['status'] ?? 0);
        $stmt = $pdo->prepare("UPDATE doctors SET is_active = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        echo json_encode(['success' => true, 'message' => 'Doctor status updated']);
        exit;
    }

    // Save or Update Doctor
    $id = !empty($data['id']) ? (int)$data['id'] : null;
    $name = sanitize($data['name'] ?? '');
    $title = sanitize($data['title'] ?? '');
    $qualifications = sanitize($data['qualifications'] ?? '');
    $specialty = sanitize($data['specialty'] ?? '');
    $experienceYears = (int)($data['experience_years'] ?? 5);
    $bio = sanitize($data['bio'] ?? '');
    $scheduleDays = sanitize($data['schedule_days'] ?? 'Mon - Fri');
    $hoursText = sanitize($data['hours_text'] ?? '9:00 AM - 5:00 PM');
    $avatarUrl = sanitize($data['avatar_url'] ?? 'assets/images/doctor-sarah.jpg');
    $isActive = isset($data['is_active']) ? (int)$data['is_active'] : 1;

    if (empty($name) || empty($specialty)) {
        echo json_encode(['success' => false, 'message' => 'Doctor Name and Specialty are required.']);
        exit;
    }

    if ($id) {
        $stmt = $pdo->prepare("UPDATE doctors SET name=?, title=?, qualifications=?, specialty=?, experience_years=?, bio=?, schedule_days=?, hours_text=?, avatar_url=?, is_active=? WHERE id=?");
        $stmt->execute([$name, $title, $qualifications, $specialty, $experienceYears, $bio, $scheduleDays, $hoursText, $avatarUrl, $isActive, $id]);
        echo json_encode(['success' => true, 'message' => 'Doctor updated successfully!']);
    } else {
        $stmt = $pdo->prepare("INSERT INTO doctors (name, title, qualifications, specialty, experience_years, bio, schedule_days, hours_text, avatar_url, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $title, $qualifications, $specialty, $experienceYears, $bio, $scheduleDays, $hoursText, $avatarUrl, $isActive]);
        echo json_encode(['success' => true, 'message' => 'New Doctor added successfully!']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
