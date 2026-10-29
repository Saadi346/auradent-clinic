<?php
/**
 * API: Submit Patient Review
 */

header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true) ?: $_POST;

$patientName = sanitize($data['name'] ?? '');
$treatment = sanitize($data['treatment'] ?? 'General Consultation');
$rating = (int)($data['rating'] ?? 5);
$comment = sanitize($data['comment'] ?? '');

if (empty($patientName) || empty($comment) || $rating < 1 || $rating > 5) {
    echo json_encode(['success' => false, 'message' => 'Please provide your name, star rating, and review text.']);
    exit;
}

try {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("INSERT INTO reviews (patient_name, treatment, rating, comment, is_verified, is_approved) VALUES (?, ?, ?, ?, 1, 1)");
    $stmt->execute([$patientName, $treatment, $rating, $comment]);

    echo json_encode(['success' => true, 'message' => 'Thank you! Your verified review has been published.']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error saving review: ' . $e->getMessage()]);
}
