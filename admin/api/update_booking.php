<?php
/**
 * Admin API: Update Booking Status & Notes
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

$id = (int)($data['id'] ?? 0);
$status = sanitize($data['status'] ?? '');
$adminNotes = isset($data['admin_notes']) ? sanitize($data['admin_notes']) : null;

$validStatuses = ['pending', 'confirmed', 'completed', 'cancelled'];
if (!$id || !in_array($status, $validStatuses)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
    exit;
}

try {
    $pdo = getDBConnection();
    if ($adminNotes !== null) {
        $stmt = $pdo->prepare("UPDATE bookings SET status = ?, admin_notes = ? WHERE id = ?");
        $stmt->execute([$status, $adminNotes, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE bookings SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
    }

    echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
