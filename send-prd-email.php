<?php
session_start();
header('Content-Type: application/json');

// Simple authentication check
if (!isset($_SESSION['prd_admin_logged_in'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

require_once 'config/database.php';
require_once 'config/EmailService.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$response = ['success' => false, 'message' => ''];

try {
    if (!isset($_POST['id'])) {
        throw new Exception('Missing request ID');
    }
    
    $id = intval($_POST['id']);
    
    // Get the email address from database
    $stmt = $conn->prepare("SELECT email FROM prd_requests WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $request = $stmt->fetch();
    
    if (!$request) {
        throw new Exception('Request not found');
    }
    
    $recipientEmail = $request['email'];
    
    // Check if PRD.pdf exists
    $prdPath = __DIR__ . '/PRD.pdf';
    if (!file_exists($prdPath)) {
        throw new Exception('PRD.pdf file not found. Please upload the file to the root directory.');
    }
    
    // Send email with PRD attachment
    $emailService = new EmailService();
    
    $subject = "Achaba Product Requirements Document (PRD)";
    
    $message = "
    <html>
    <head>
        <style>
            body { font-family: 'Inter', Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #00A551 0%, #008F46 100%); color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { background: #ffffff; padding: 30px; border: 1px solid #e0e0e0; border-top: none; }
            .footer { background: #f8f9fa; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; font-size: 14px; color: #6c757d; }
            .attachment-box { background: #f0f9f4; border-left: 4px solid #00A551; padding: 15px; margin: 20px 0; border-radius: 4px; }
            h1 { margin: 0; font-size: 28px; }
            h2 { color: #00A551; }
            .icon { font-size: 24px; margin-right: 10px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>📄 Your Achaba PRD is Here!</h1>
            </div>
            <div class='content'>
                <h2>Product Requirements Document Attached</h2>
                <p>Hello,</p>
                <p>Thank you for your interest in Achaba! As promised, we're excited to share our comprehensive <strong>Product Requirements Document (PRD)</strong> with you.</p>
                
                <div class='attachment-box'>
                    <strong>📎 Attachment:</strong> PRD.pdf<br>
                    <small>The complete Achaba Product Requirements Document is attached to this email.</small>
                </div>
                
                <p><strong>What's inside the PRD:</strong></p>
                <ul>
                    <li>Complete product vision and objectives</li>
                    <li>Detailed feature specifications</li>
                    <li>User flows and journey maps</li>
                    <li>Technical architecture and requirements</li>
                    <li>Safety and security measures</li>
                    <li>Market analysis and competitive landscape</li>
                    <li>Implementation roadmap and timeline</li>
                </ul>
                
                <p>We've designed Achaba to transform motorcycle transportation in Bauchi and beyond. This document provides deep insights into our approach, technology, and vision for the future.</p>
                
                <p><strong>What's next?</strong></p>
                <ul>
                    <li>Review the PRD and explore our vision</li>
                    <li>Visit <a href='https://achaba.ng/how-it-works' style='color: #00A551;'>How It Works</a> to see the system in action</li>
                    <li>Join our <a href='https://achaba.ng/#waitlist' style='color: #00A551;'>waitlist</a> for early access</li>
                    <li>Share your feedback and questions with us</li>
                </ul>
                
                <p>We'd love to hear your thoughts! If you have any questions or would like to discuss partnership opportunities, feel free to reach out to us at <a href='mailto:hello@achaba.ng' style='color: #00A551;'>hello@achaba.ng</a></p>
                
                <p>Thank you for being part of our journey to revolutionize transportation!</p>
                
                <p>Best regards,<br>
                <strong>The Achaba Team</strong></p>
            </div>
            <div class='footer'>
                <p><strong>Achaba</strong> - Anything to pick. Anywhere to go.</p>
                <p>Built for Bauchi • Powered by Innovation</p>
                <p style='font-size: 12px; margin-top: 15px;'>
                    © 2025 ACHABA. All rights reserved.
                </p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $emailSent = $emailService->sendEmailWithAttachment(
        $recipientEmail, 
        $subject, 
        $message, 
        $prdPath,
        'Achaba_PRD.pdf'
    );
    
    if ($emailSent) {
        // Update database to mark as sent
        $updateStmt = $conn->prepare("UPDATE prd_requests SET prd_sent = 1, prd_sent_date = NOW() WHERE id = :id");
        
        if ($updateStmt->execute(['id' => $id])) {
            $response['success'] = true;
            $response['message'] = 'PRD sent successfully to ' . $recipientEmail;
        } else {
            throw new Exception('Email sent but database update failed');
        }
    } else {
        throw new Exception('Failed to send email. Please check email configuration.');
    }
    
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
