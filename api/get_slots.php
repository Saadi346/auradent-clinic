<?php
/**
 * API: Get Real-Time Available Time Slots
 */

header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../includes/functions.php';

$doctorId = !empty($_GET['doctor_id']) ? (int)$_GET['doctor_id'] : null;
$date = !empty($_GET['date']) ? sanitize($_GET['date']) : date('Y-m-d');

$standardSlots = [
    '09:00 AM',
    '09:45 AM',
    '10:30 AM',
    '11:15 AM',
    '01:00 PM',
    '01:45 PM',
    '02:30 PM',
    '03:15 PM',
    '04:00 PM',
    '04:45 PM',
    '05:30 PM'
];

try {
    $pdo = getDBConnection();

    $bookedTimes = [];
    if ($doctorId) {
        $stmt = $pdo->prepare("SELECT appointment_time FROM bookings WHERE doctor_id = ? AND appointment_date = ? AND status != 'cancelled'");
        $stmt->execute([$doctorId, $date]);
        $bookedTimes = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } else {
        // If "Any Doctor", only block if more than 3 bookings exist at that exact slot
        $stmt = $pdo->prepare("SELECT appointment_time, COUNT(*) as cnt FROM bookings WHERE appointment_date = ? AND status != 'cancelled' GROUP BY appointment_time HAVING cnt >= 4");
        $stmt->execute([$date]);
        $bookedTimes = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    $slots = [];
    foreach ($standardSlots as $slot) {
        $slots[] = [
            'time' => $slot,
            'available' => !in_array($slot, $bookedTimes)
        ];
    }

    echo json_encode([
        'date' => $date,
        'doctor_id' => $doctorId,
        'slots' => $slots
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
