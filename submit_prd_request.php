<?php
header('Content-Type: application/json');

// Include database configuration
require_once 'config/database.php';
require_once 'config/EmailService.php';

// Initialize response array
$response = [
    'success' => false,
    'message' => ''
];

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    http_response_code(500);
    $response['message'] = 'Database connection failed. Please try again later.';
    echo json_encode($response);
    exit;
}

try {
    // Validate email
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        throw new Exception('Email address is required.');
    }

    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    
    if (!$email) {
        throw new Exception('Please provide a valid email address.');
    }

    // Check if email already requested PRD
    $checkStmt = $conn->prepare("SELECT id FROM prd_requests WHERE email = :email");
    $checkStmt->execute(['email' => $email]);
    $result = $checkStmt->fetch();
    
    if ($result) {
        $response['message'] = 'You have already requested the PRD. Check your email inbox (and spam folder).';
        echo json_encode($response);
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO prd_requests (email, request_date) VALUES (:email, NOW())");
    
    if ($stmt->execute(['email' => $email])) {
        // Send thank you email
        $emailService = new EmailService();
        
        $subject = "Your Achaba PRD Request - Thank You!";
        
        $message = "
        <html>
        <head>
            <style>
                body { font-family: 'Inter', Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #00A551 0%, #008F46 100%); color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { background: #ffffff; padding: 30px; border: 1px solid #e0e0e0; border-top: none; }
                .footer { background: #f8f9fa; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; font-size: 14px; color: #6c757d; }
                .button { display: inline-block; padding: 12px 30px; background: #00A551; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
                h1 { margin: 0; font-size: 28px; }
                h2 { color: #00A551; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Thank You for Your Interest!</h1>
                </div>
                <div class='content'>
                    <h2>PRD Request Received</h2>
                    <p>Hello,</p>
                    <p>Thank you for requesting the <strong>Achaba Product Requirements Document (PRD)</strong>.</p>
                    <p>We're excited about your interest in understanding how Achaba is designed to transform motorcycle transportation in cities like Bauchi.</p>
                    
                    <p><strong>What happens next:</strong></p>
                    <ul>
                        <li>Our team will review your request</li>
                        <li>You'll receive the full PRD document within 24-48 hours</li>
                        <li>The document will include detailed specifications, user flows, and technical architecture</li>
                    </ul>
                    
                    <p>In the meantime, you can:</p>
                    <ul>
                        <li><a href='https://achaba.ng/how-it-works' style='color: #00A551;'>Learn more about how Achaba works</a></li>
                        <li><a href='https://achaba.ng/survey' style='color: #00A551;'>Share your feedback through our survey</a></li>
                        <li><a href='https://achaba.ng/#waitlist' style='color: #00A551;'>Join our waitlist for early access</a></li>
                    </ul>
                    
                    <p>If you have any questions or need immediate assistance, feel free to reach out to us at <a href='mailto:hello@achaba.ng' style='color: #00A551;'>hello@achaba.ng</a></p>
                    
                    <p>Best regards,<br>
                    <strong>The Achaba Team</strong></p>
                </div>
                <div class='footer'>
                    <p><strong>Achaba</strong> - Anything to pick. Anywhere to go.</p>
                    <p>Built for Bauchi • Powered by Achaba</p>
                    <p style='font-size: 12px; margin-top: 15px;'>
                        © 2025 ACHABA. All rights reserved.
                    </p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $emailSent = $emailService->sendEmail($email, $subject, $message);
        
        if ($emailSent) {
            $response['success'] = true;
            $response['message'] = 'Thank you! Check your email for confirmation. We\'ll send you the PRD within 24-48 hours.';
        } else {
            $response['success'] = true;
            $response['message'] = 'Request received! We\'ll send you the PRD within 24-48 hours.';
        }
    } else {
        throw new Exception('Database error. Please try again later.');
    }
    
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
