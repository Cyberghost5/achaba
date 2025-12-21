<?php
// Test script to check survey database setup
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config/database.php';

echo "<h2>Survey Database Test</h2>";

try {
    $conn = getDBConnection();
    
    if (!$conn) {
        die("Failed to connect to database");
    }
    
    echo "<p style='color: green;'>✓ Database connection successful</p>";
    
    // Check if survey_responses table exists
    $stmt = $conn->query("SHOW TABLES LIKE 'survey_responses'");
    $tableExists = $stmt->fetch();
    
    if ($tableExists) {
        echo "<p style='color: green;'>✓ survey_responses table exists</p>";
        
        // Show table structure
        echo "<h3>Table Structure:</h3>";
        $stmt = $conn->query("DESCRIBE survey_responses");
        $columns = $stmt->fetchAll();
        
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        foreach ($columns as $column) {
            echo "<tr>";
            echo "<td>{$column['Field']}</td>";
            echo "<td>{$column['Type']}</td>";
            echo "<td>{$column['Null']}</td>";
            echo "<td>{$column['Key']}</td>";
            echo "<td>{$column['Default']}</td>";
            echo "<td>{$column['Extra']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Count records
        $stmt = $conn->query("SELECT COUNT(*) as count FROM survey_responses");
        $count = $stmt->fetch();
        echo "<p>Total survey responses in database: <strong>{$count['count']}</strong></p>";
        
        // Show recent responses
        if ($count['count'] > 0) {
            echo "<h3>Recent Responses (Last 5):</h3>";
            $stmt = $conn->query("
                SELECT id, survey_type, full_name, email, phone, submitted_at 
                FROM survey_responses 
                ORDER BY submitted_at DESC 
                LIMIT 5
            ");
            $responses = $stmt->fetchAll();
            
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>ID</th><th>Type</th><th>Name</th><th>Email</th><th>Phone</th><th>Submitted At</th></tr>";
            foreach ($responses as $response) {
                echo "<tr>";
                echo "<td>{$response['id']}</td>";
                echo "<td>{$response['survey_type']}</td>";
                echo "<td>{$response['full_name']}</td>";
                echo "<td>{$response['email']}</td>";
                echo "<td>{$response['phone']}</td>";
                echo "<td>{$response['submitted_at']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        
    } else {
        echo "<p style='color: red;'>✗ survey_responses table does not exist</p>";
        echo "<p>The table should be created automatically. Let's try to create it now...</p>";
        
        $sql = "CREATE TABLE IF NOT EXISTS survey_responses (
            id INT AUTO_INCREMENT PRIMARY KEY,
            survey_type ENUM('rider', 'user') NOT NULL,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            responses JSON NOT NULL,
            submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            ip_address VARCHAR(45),
            user_agent TEXT,
            INDEX idx_survey_type (survey_type),
            INDEX idx_submitted_at (submitted_at),
            INDEX idx_email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        
        $conn->exec($sql);
        echo "<p style='color: green;'>✓ Table created successfully</p>";
    }
    
    // Test insert
    echo "<h3>Testing Insert:</h3>";
    $testData = [
        'survey_type' => 'user',
        'full_name' => 'Test User',
        'email' => 'test_' . time() . '@example.com',
        'phone' => '08012345678',
        'responses' => json_encode(['test' => 'data']),
        'ip_address' => '127.0.0.1',
        'user_agent' => 'Test Script'
    ];
    
    $stmt = $conn->prepare("
        INSERT INTO survey_responses (
            survey_type, full_name, email, phone, responses, ip_address, user_agent
        ) VALUES (
            :survey_type, :full_name, :email, :phone, :responses, :ip_address, :user_agent
        )
    ");
    
    if ($stmt->execute($testData)) {
        echo "<p style='color: green;'>✓ Test insert successful! Insert ID: " . $conn->lastInsertId() . "</p>";
    } else {
        echo "<p style='color: red;'>✗ Test insert failed</p>";
        print_r($stmt->errorInfo());
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>Database Error: " . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
} catch (Exception $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}
?>
