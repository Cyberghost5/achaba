<?php
// Enable error reporting for development
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

// Get survey response ID
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    http_response_code(400);
    $response['message'] = 'Invalid survey response ID';
    echo json_encode($response);
    exit;
}

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    http_response_code(500);
    $response['message'] = 'Database connection failed';
    echo json_encode($response);
    exit;
}

try {
    // Fetch survey response
    $stmt = $conn->prepare("SELECT * FROM survey_responses WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $surveyResponse = $stmt->fetch();
    
    if (!$surveyResponse) {
        http_response_code(404);
        $response['message'] = 'Survey response not found';
        echo json_encode($response);
        exit;
    }
    
    // Format the response
    $response['success'] = true;
    $response['response'] = [
        'id' => $surveyResponse['id'],
        'survey_type' => $surveyResponse['survey_type'],
        'full_name' => $surveyResponse['full_name'],
        'email' => $surveyResponse['email'],
        'phone' => $surveyResponse['phone'],
        'responses' => $surveyResponse['responses'],
        'submitted_at' => date('M d, Y g:i A', strtotime($surveyResponse['submitted_at'])),
        'ip_address' => $surveyResponse['ip_address']
    ];
    
    echo json_encode($response);
    
} catch(PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    http_response_code(500);
    $response['message'] = 'An error occurred while fetching the response';
    echo json_encode($response);
}

exit;
?>
