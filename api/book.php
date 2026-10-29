<?php
/**
 * API: Handle Online Appointment Booking Submission
 */

header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$data = json_decode($rawInput, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input']);
    exit;
}

$patientName = sanitize($data['patientName'] ?? '');
$patientEmail = filter_var($data['patientEmail'] ?? '', FILTER_VALIDATE_EMAIL);
$patientPhone = sanitize($data['patientPhone'] ?? '');
$patientDob = !empty($data['patientDob']) ? sanitize($data['patientDob']) : null;
$serviceId = !empty($data['serviceId']) ? (int)$data['serviceId'] : null;
$doctorId = !empty($data['doctorId']) ? (int)$data['doctorId'] : null;
$appointmentDate = sanitize($data['appointmentDate'] ?? '');
$appointmentTime = sanitize($data['appointmentTime'] ?? '');
$isNewPatient = !empty($data['isNewPatient']) ? 1 : 0;
$isEmergency = !empty($data['isEmergency']) ? 1 : 0;
$notes = sanitize($data['notes'] ?? '');

if (empty($patientName) || empty($patientEmail) || empty($patientPhone) || empty($appointmentDate) || empty($appointmentTime)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

try {
    $pdo = getDBConnection();

    // Check if slot is already booked for this doctor
    if ($doctorId) {
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE doctor_id = ? AND appointment_date = ? AND appointment_time = ? AND status != 'cancelled'");
        $checkStmt->execute([$doctorId, $appointmentDate, $appointmentTime]);
        if ($checkStmt->fetchColumn() > 0) {
            echo json_encode(['success' => false, 'message' => 'This time slot was just booked by another patient. Please pick an alternative slot.']);
            exit;
        }
    }

    $ref = generateBookingReference();

    $stmt = $pdo->prepare("INSERT INTO bookings (
        booking_reference, doctor_id, service_id, patient_name, patient_email,
        patient_phone, patient_dob, appointment_date, appointment_time,
        is_new_patient, is_emergency, notes, status
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'confirmed')");

    $stmt->execute([
        $ref, $doctorId, $serviceId, $patientName, $patientEmail,
        $patientPhone, $patientDob, $appointmentDate, $appointmentTime,
        $isNewPatient, $isEmergency, $notes
    ]);

    echo json_encode([
        'success' => true,
        'reference' => $ref,
        'message' => 'Appointment scheduled successfully!'
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
}
