<?php
/**
 * Admin API: Manage Dental Services (Add, Edit, Delete)
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
        $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Service removed']);
        exit;
    }

    $id = !empty($data['id']) ? (int)$data['id'] : null;
    $name = sanitize($data['name'] ?? '');
    $category = sanitize($data['category'] ?? 'General Dentistry');
    $price = (float)($data['price_starting'] ?? 100);
    $duration = (int)($data['duration_mins'] ?? 45);
    $shortDesc = sanitize($data['short_description'] ?? '');
    $fullDesc = sanitize($data['full_description'] ?? '');
    $isFeatured = !empty($data['is_featured']) ? 1 : 0;
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    if (empty($name) || empty($shortDesc)) {
        echo json_encode(['success' => false, 'message' => 'Service Name and Description are required.']);
        exit;
    }

    if ($id) {
        $stmt = $pdo->prepare("UPDATE services SET name=?, category=?, price_starting=?, duration_mins=?, short_description=?, full_description=?, is_featured=? WHERE id=?");
        $stmt->execute([$name, $category, $price, $duration, $shortDesc, $fullDesc, $isFeatured, $id]);
        echo json_encode(['success' => true, 'message' => 'Service updated successfully!']);
    } else {
        $stmt = $pdo->prepare("INSERT INTO services (slug, name, category, price_starting, duration_mins, short_description, full_description, is_featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$slug, $name, $category, $price, $duration, $shortDesc, $fullDesc, $isFeatured]);
        echo json_encode(['success' => true, 'message' => 'New Service created successfully!']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
