<?php
session_start();
header('Content-Type: application/json');

// Simple authentication check
if (!isset($_SESSION['prd_admin_logged_in'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

require_once 'config/database.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$response = ['success' => false, 'message' => ''];

try {
    if (!isset($_POST['id']) || !isset($_POST['status'])) {
        throw new Exception('Missing parameters');
    }
    
    $id = intval($_POST['id']);
    $status = $_POST['status'];
    
    if ($status === 'sent') {
        $stmt = $conn->prepare("UPDATE prd_requests SET prd_sent = 1, prd_sent_date = NOW() WHERE id = :id");
        
        if ($stmt->execute(['id' => $id])) {
            $response['success'] = true;
            $response['message'] = 'Status updated successfully';
        } else {
            throw new Exception('Database update failed');
        }
    } else {
        throw new Exception('Invalid status');
    }
    
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
