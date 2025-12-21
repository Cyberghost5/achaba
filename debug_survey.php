<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config/database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Survey Debug</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Survey Responses Debug</h1>
    
    <?php
    try {
        $conn = getDBConnection();
        
        if (!$conn) {
            echo "<p class='error'>✗ Failed to connect to database</p>";
            exit;
        }
        
        echo "<p class='success'>✓ Database connection successful</p>";
        
        // Check table
        $stmt = $conn->query("SHOW TABLES LIKE 'survey_responses'");
        if (!$stmt->fetch()) {
            echo "<p class='error'>✗ Table 'survey_responses' does not exist!</p>";
            echo "<p>The table should be created automatically by getDBConnection(). Try refreshing this page.</p>";
            exit;
        }
        
        echo "<p class='success'>✓ Table 'survey_responses' exists</p>";
        
        // Get count
        $stmt = $conn->query("SELECT COUNT(*) as total FROM survey_responses");
        $result = $stmt->fetch();
        $total = $result['total'];
        
        echo "<h2>Total Responses: {$total}</h2>";
        
        if ($total > 0) {
            // Get latest responses
            $stmt = $conn->query("
                SELECT 
                    id, 
                    survey_type, 
                    full_name, 
                    email, 
                    phone, 
                    submitted_at,
                    JSON_LENGTH(responses) as response_count
                FROM survey_responses 
                ORDER BY submitted_at DESC 
                LIMIT 20
            ");
            
            echo "<h3>Latest 20 Responses:</h3>";
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Submitted</th>
                    <th>Response Fields</th>
                    <th>Action</th>
                  </tr>";
            
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['survey_type']}</td>";
                echo "<td>{$row['full_name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['submitted_at']}</td>";
                echo "<td>{$row['response_count']} fields</td>";
                echo "<td><a href='?view={$row['id']}'>View Details</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            
            // Show detailed view if requested
            if (isset($_GET['view'])) {
                $id = (int)$_GET['view'];
                $stmt = $conn->prepare("SELECT * FROM survey_responses WHERE id = :id");
                $stmt->execute(['id' => $id]);
                $detail = $stmt->fetch();
                
                if ($detail) {
                    echo "<h3>Response Details (ID: {$id})</h3>";
                    echo "<table>";
                    echo "<tr><th>Field</th><th>Value</th></tr>";
                    
                    foreach ($detail as $key => $value) {
                        if ($key === 'responses') {
                            echo "<tr><td><strong>{$key}</strong></td><td><pre>" . 
                                 json_encode(json_decode($value), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . 
                                 "</pre></td></tr>";
                        } else {
                            echo "<tr><td><strong>{$key}</strong></td><td>" . htmlspecialchars($value) . "</td></tr>";
                        }
                    }
                    echo "</table>";
                    echo "<p><a href='?'>← Back to list</a></p>";
                }
            }
        } else {
            echo "<p>No survey responses found in the database.</p>";
            echo "<p><strong>Troubleshooting:</strong></p>";
            echo "<ol>";
            echo "<li>Check if the survey form is submitting data correctly</li>";
            echo "<li>Check PHP error logs: <code>" . ini_get('error_log') . "</code></li>";
            echo "<li>Check the custom error log: <code>" . __DIR__ . "/survey_errors.log</code></li>";
            echo "<li>Try submitting a test survey and refresh this page</li>";
            echo "</ol>";
        }
        
        // Show table structure
        echo "<h3>Table Structure:</h3>";
        $stmt = $conn->query("DESCRIBE survey_responses");
        echo "<table>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['Field']}</td>";
            echo "<td>{$row['Type']}</td>";
            echo "<td>{$row['Null']}</td>";
            echo "<td>{$row['Key']}</td>";
            echo "<td>{$row['Default']}</td>";
            echo "<td>{$row['Extra']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } catch (PDOException $e) {
        echo "<p class='error'>Database Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    }
    ?>
    
    <hr>
    <p><a href="survey.php">← Back to Survey</a> | <a href="?">Refresh</a></p>
</body>
</html>
