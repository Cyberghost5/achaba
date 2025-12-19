<?php
// Enable error reporting for development (disable in production)
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Include database configuration
require_once __DIR__ . '/config/database.php';

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
$surveyType = $_POST['surveyType'] ?? '';
$fullName = trim($_POST['fullName'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');

// Validate required fields
if (empty($surveyType) || empty($fullName) || empty($email) || empty($phone)) {
    http_response_code(400);
    $response['message'] = 'All personal information fields are required';
    echo json_encode($response);
    exit;
}

// Validate survey type
if (!in_array($surveyType, ['rider', 'user'])) {
    http_response_code(400);
    $response['message'] = 'Invalid survey type';
    echo json_encode($response);
    exit;
}

// Validate email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    $response['message'] = 'Invalid email address';
    echo json_encode($response);
    exit;
}

// Validate phone (basic validation)
$phone = preg_replace('/[^0-9+]/', '', $phone);
if (strlen($phone) < 10) {
    http_response_code(400);
    $response['message'] = 'Invalid phone number';
    echo json_encode($response);
    exit;
}

// Collect survey responses (questions)
$surveyResponses = [];

// For rider surveys, collect all 24 questions
if ($surveyType === 'rider') {
    // Questions 1-7 (simple text)
    for ($i = 1; $i <= 7; $i++) {
        $questionKey = "q{$i}";
        $surveyResponses[$questionKey] = trim($_POST[$questionKey] ?? '');
    }
    
    // Question 8: What are your biggest daily or weekly expenses? (multi-part)
    $q8_expenses = [];
    if (isset($_POST['q8_expenses']) && is_array($_POST['q8_expenses'])) {
        $q8_expenses = $_POST['q8_expenses'];
    }
    $surveyResponses['q8_expenses'] = $q8_expenses;
    $surveyResponses['q8_other_specify'] = trim($_POST['q8_other_specify'] ?? '');
    $surveyResponses['q8_cost'] = $_POST['q8_cost'] ?? '';
    
    // Question 9: Do your earnings change a lot from week to week? (multi-part)
    $surveyResponses['q9'] = $_POST['q9'] ?? '';
    $surveyResponses['q9_followup'] = $_POST['q9_followup'] ?? '';
    
    // Question 10: Are you usually able to save anything? (multi-part)
    $surveyResponses['q10'] = $_POST['q10'] ?? '';
    $surveyResponses['q10_amount'] = $_POST['q10_amount'] ?? '';
    $surveyResponses['q10_reason'] = $_POST['q10_reason'] ?? '';
    
    // Questions 11-24 (simple text)
    for ($i = 11; $i <= 24; $i++) {
        $questionKey = "q{$i}";
        $surveyResponses[$questionKey] = trim($_POST[$questionKey] ?? '');
    }
} else {
    // For user surveys, collect all user questions
    $surveyResponses['contact_followup'] = $_POST['contact_followup'] ?? '';
    $surveyResponses['user_location'] = trim($_POST['user_location'] ?? '');
    $surveyResponses['user_type'] = $_POST['user_type'] ?? '';
    $surveyResponses['movement_frequency'] = $_POST['movement_frequency'] ?? '';
    $surveyResponses['transport_method'] = $_POST['transport_method'] ?? '';
    $surveyResponses['movement_challenge'] = trim($_POST['movement_challenge'] ?? '');
    $surveyResponses['ever_late'] = $_POST['ever_late'] ?? '';
    $surveyResponses['motorcycle_frequency'] = $_POST['motorcycle_frequency'] ?? '';
    $surveyResponses['find_rider'] = $_POST['find_rider'] ?? '';
    $surveyResponses['motorcycle_concern'] = $_POST['motorcycle_concern'] ?? '';
    $surveyResponses['needed_pickup'] = $_POST['needed_pickup'] ?? '';
    $surveyResponses['pickup_items'] = $_POST['pickup_items'] ?? '';
    $surveyResponses['pickup_difficulty'] = $_POST['pickup_difficulty'] ?? '';
    $surveyResponses['pickup_usefulness'] = $_POST['pickup_usefulness'] ?? '';
    $surveyResponses['use_booking_service'] = $_POST['use_booking_service'] ?? '';
    
    // Trust factors is a multi-select checkbox array
    $trustFactors = [];
    if (isset($_POST['trust_factors']) && is_array($_POST['trust_factors'])) {
        $trustFactors = $_POST['trust_factors'];
    }
    $surveyResponses['trust_factors'] = $trustFactors;
    
    $surveyResponses['phone_type'] = $_POST['phone_type'] ?? '';
    $surveyResponses['booking_preference'] = $_POST['booking_preference'] ?? '';
    $surveyResponses['would_try'] = $_POST['would_try'] ?? '';
    $surveyResponses['must_get_right'] = trim($_POST['must_get_right'] ?? '');
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
    // Check if this email has already submitted this survey type recently (within 24 hours)
    $stmt = $conn->prepare("
        SELECT id, submitted_at 
        FROM survey_responses 
        WHERE email = :email 
        AND survey_type = :survey_type 
        AND submitted_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)
    ");
    
    $stmt->execute([
        'email' => $email,
        'survey_type' => $surveyType
    ]);
    
    $existing = $stmt->fetch();
    
    if ($existing) {
        http_response_code(409);
        $response['message'] = 'You have already submitted this survey recently. Please try again after 24 hours.';
        echo json_encode($response);
        exit;
    }
    
    // Insert survey response
    $stmt = $conn->prepare("
        INSERT INTO survey_responses (
            survey_type, 
            full_name, 
            email, 
            phone, 
            responses, 
            ip_address, 
            user_agent
        ) VALUES (
            :survey_type,
            :full_name,
            :email,
            :phone,
            :responses,
            :ip_address,
            :user_agent
        )
    ");
    
    $stmt->execute([
        'survey_type' => $surveyType,
        'full_name' => $fullName,
        'email' => $email,
        'phone' => $phone,
        'responses' => json_encode($surveyResponses, JSON_UNESCAPED_UNICODE),
        'ip_address' => $ip_address,
        'user_agent' => $user_agent
    ]);
    
    http_response_code(201);
    $response['success'] = true;
    $response['message'] = 'Thank you for completing the survey! Your feedback is valuable to us.';
    
    // Send thank you email
    try {
        require_once __DIR__ . '/config/EmailService.php';
        $emailService = new EmailService();
        $emailService->sendSurveyThankYouEmail($email, $fullName, $surveyType);
    } catch (Exception $e) {
        error_log("Failed to send survey thank you email: " . $e->getMessage());
        // Don't fail the request if email fails
    }

} catch(PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    http_response_code(500);
    $response['message'] = 'An error occurred while saving your responses. Please try again later.';
}

echo json_encode($response);
exit;
?>
