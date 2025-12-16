<?php
// Enable error reporting for development (disable in production)
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Include database configuration
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/EmailService.php';

// Set JSON response header
header('Content-Type: application/json');

// Initialize response
$response = [
    'success' => false,
    'message' => ''
];

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response['message'] = 'Method not allowed';
    echo json_encode($response);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

// If JSON parsing failed, try to get data from POST
if (!$data) {
    $data = $_POST;
}

// Validate email
if (empty($data['email'])) {
    http_response_code(400);
    $response['message'] = 'Email address is required';
    echo json_encode($response);
    exit;
}

$email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    $response['message'] = 'Invalid email address';
    echo json_encode($response);
    exit;
}

// Get additional data
$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    http_response_code(500);
    $response['message'] = 'Database connection failed. Please try again later.';
    echo json_encode($response);
    exit;
}

try {
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id, status FROM partner_subscriptions WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $existing = $stmt->fetch();

    if ($existing) {
        if ($existing['status'] === 'active') {
            http_response_code(409);
            $response['message'] = 'This email is already subscribed to our partnership program.';
        } else {
            // Reactivate inactive subscription
            $stmt = $conn->prepare("UPDATE partner_subscriptions SET status = 'active', subscribed_at = NOW() WHERE email = :email");
            $stmt->execute(['email' => $email]);
            
            http_response_code(200);
            $response['success'] = true;
            $response['message'] = 'Welcome back! Your subscription has been reactivated.';
        }
    } else {
        // Insert new subscription
        $stmt = $conn->prepare("
            INSERT INTO partner_subscriptions (email, ip_address, user_agent) 
            VALUES (:email, :ip_address, :user_agent)
        ");
        
        $stmt->execute([
            'email' => $email,
            'ip_address' => $ip_address,
            'user_agent' => $user_agent
        ]);

        http_response_code(201);
        $response['success'] = true;
        $response['message'] = 'Thank you for your interest! We will contact you soon at ' . $email;
        
        // Send welcome email
        try {
            $emailService = new EmailService();
            $emailService->sendPartnerWelcomeEmail($email);
        } catch (Exception $e) {
            error_log("Failed to send welcome email: " . $e->getMessage());
            // Don't fail the request if email fails
        }
    }

} catch(PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    http_response_code(500);
    $response['message'] = 'An error occurred. Please try again later.';
}

echo json_encode($response);
exit;
?>
