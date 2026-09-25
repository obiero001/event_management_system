<?php
// database connect
require_once 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize input
    $full_name        = trim($_POST['full_name'] ?? '');
    $admission_number = trim($_POST['admission_number'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $phone            = trim($_POST['phone'] ?? '');
    $course           = trim($_POST['course'] ?? '');
    $event_name       = trim($_POST['event_name'] ?? '');

    // 2. Server-side validation
    if (empty($full_name) || empty($admission_number) || empty($email) || empty($phone) || empty($course) || empty($event_name)) {
        header("Location: register.php?status=error&msg=" . urlencode("All fields are required."));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?status=error&msg=" . urlencode("Invalid email format."));
        exit();
    }

    // 3. Database Insertion via Prepared Statements
    try {
        $sql = "INSERT INTO registrations (full_name, admission_number, email, phone, course, event_name) 
                VALUES (:full_name, :admission_number, :email, :phone, :course, :event_name)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':full_name'        => $full_name,
            ':admission_number' => $admission_number,
            ':email'            => $email,
            ':phone'            => $phone,
            ':course'           => $course,
            ':event_name'       => $event_name
        ]);

        header("Location: register.php?status=success");
        exit();

    } catch (\PDOException $e) {
        // Handle Duplicate Admission Number or query failure
        if ($e->getCode() == 23000) {
            $error_msg = "This Admission Number has already registered for an event.";
        } else {
            $error_msg = "Database error: " . $e->getMessage();
        }
        header("Location: register.php?status=error&msg=" . urlencode($error_msg));
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}