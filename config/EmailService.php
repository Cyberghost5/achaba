<?php
/**
 * Email Service
 * Handles sending emails using PHPMailer and SMTP
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService {
    private $mailer;
    
    public function __construct() {
        require_once __DIR__ . '/../vendor/autoload.php';
        require_once __DIR__ . '/email.php';
        
        $this->mailer = new PHPMailer(true);
        $this->configureMailer();
    }
    
    private function configureMailer() {
        try {
            // Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host = SMTP_HOST;
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = SMTP_USERNAME;
            $this->mailer->Password = SMTP_PASSWORD;
            $this->mailer->SMTPSecure = SMTP_SECURE;
            $this->mailer->Port = SMTP_PORT;
            
            // Set charset
            $this->mailer->CharSet = 'UTF-8';
            
            // Default sender
            $this->mailer->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
            $this->mailer->addReplyTo(SMTP_REPLY_TO_EMAIL, SMTP_REPLY_TO_NAME);
            
        } catch (Exception $e) {
            error_log("Email configuration error: " . $e->getMessage());
            throw $e;
        }
    }
    
    /**
     * Send partner welcome email
     */
    public function sendPartnerWelcomeEmail($recipientEmail) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($recipientEmail);
            
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Welcome to Achaba Partnership Program';
            
            $this->mailer->Body = $this->getPartnerEmailTemplate();
            $this->mailer->AltBody = $this->getPartnerEmailPlainText();
            
            $this->mailer->send();
            return true;
            
        } catch (Exception $e) {
            error_log("Failed to send partner email: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send waitlist welcome email
     */
    public function sendWaitlistWelcomeEmail($recipientEmail) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($recipientEmail);
            
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Welcome to Achaba Waitlist';
            
            $this->mailer->Body = $this->getWaitlistEmailTemplate();
            $this->mailer->AltBody = $this->getWaitlistEmailPlainText();
            
            $this->mailer->send();
            return true;
            
        } catch (Exception $e) {
            error_log("Failed to send waitlist email: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Partner email HTML template
     */
    private function getPartnerEmailTemplate() {
        return '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome to Achaba Partnership</title>
        </head>
        <body style="margin: 0; padding: 0; font-family: \'Inter\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif; background-color: #f5f5f5;">
            <table role="presentation" style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td align="center" style="padding: 40px 0;">
                        <table role="presentation" style="width: 600px; max-width: 90%; background-color: #ffffff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <!-- Header -->
                            <tr>
                                <td style="padding: 40px 40px 20px; text-align: center; background: linear-gradient(135deg, #00A551 0%, #008F46 100%); border-radius: 12px 12px 0 0;">
                                    <h1 style="margin: 0; color: #ffffff; font-size: 32px; font-weight: 700;">Welcome to Achaba!</h1>
                                </td>
                            </tr>
                            
                            <!-- Content -->
                            <tr>
                                <td style="padding: 40px;">
                                    <h2 style="margin: 0 0 20px; color: #1A1A1A; font-size: 24px; font-weight: 600;">Thank You for Your Interest!</h2>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        We\'re thrilled to have you join our partnership program. Your interest in collaborating with Achaba marks the beginning of an exciting journey together.
                                    </p>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        Our team will review your submission and get back to you within 2-3 business days with next steps and partnership opportunities.
                                    </p>
                                    
                                    <!-- Benefits Box -->
                                    <div style="background-color: #E8F5E9; border-left: 4px solid #00A551; padding: 20px; margin: 30px 0; border-radius: 4px;">
                                        <h3 style="margin: 0 0 15px; color: #00A551; font-size: 18px; font-weight: 600;">What\'s Next?</h3>
                                        <ul style="margin: 0; padding-left: 20px; color: #4A4A4A; font-size: 15px; line-height: 1.8;">
                                            <li>Our partnership team will review your information</li>
                                            <li>We\'ll schedule a call to discuss opportunities</li>
                                            <li>You\'ll receive customized partnership options</li>
                                            <li>Start earning with Achaba\'s growing network</li>
                                        </ul>
                                    </div>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        In the meantime, feel free to explore our platform and learn more about how we\'re revolutionizing commuter transportation.
                                    </p>
                                    
                                    <!-- CTA Button -->
                                    <div style="text-align: center; margin: 30px 0;">
                                        <a href="https://achaba.ng" style="display: inline-block; padding: 14px 32px; background-color: #00A551; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px;">Visit Our Website</a>
                                    </div>
                                    
                                    <p style="margin: 30px 0 0; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        Best regards,<br>
                                        <strong style="color: #00A551;">The Achaba Team</strong>
                                    </p>
                                </td>
                            </tr>
                            
                            <!-- Footer -->
                            <tr>
                                <td style="padding: 30px 40px; background-color: #FAFAFA; border-radius: 0 0 12px 12px; text-align: center;">
                                    <p style="margin: 0 0 10px; color: #7A7A7A; font-size: 14px;">
                                        <strong>Achaba</strong> - Smarter Commutes, Better Connections
                                    </p>
                                    <p style="margin: 0; color: #7A7A7A; font-size: 12px;">
                                        Have questions? Contact us at <a href="mailto:support@achaba.ng" style="color: #00A551; text-decoration: none;">support@achaba.ng</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ';
    }
    
    /**
     * Partner email plain text version
     */
    private function getPartnerEmailPlainText() {
        return "Welcome to Achaba Partnership Program!

Thank you for your interest in partnering with Achaba. We're thrilled to have you join our partnership program.

Our team will review your submission and get back to you within 2-3 business days with next steps and partnership opportunities.

What's Next?
- Our partnership team will review your information
- We'll schedule a call to discuss opportunities
- You'll receive customized partnership options
- Start earning with Achaba's growing network

In the meantime, feel free to explore our platform at https://achaba.ng

Best regards,
The Achaba Team

Have questions? Contact us at support@achaba.ng";
    }
    
    /**
     * Waitlist email HTML template
     */
    private function getWaitlistEmailTemplate() {
        return '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome to Achaba Waitlist</title>
        </head>
        <body style="margin: 0; padding: 0; font-family: \'Inter\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif; background-color: #f5f5f5;">
            <table role="presentation" style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td align="center" style="padding: 40px 0;">
                        <table role="presentation" style="width: 600px; max-width: 90%; background-color: #ffffff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <!-- Header -->
                            <tr>
                                <td style="padding: 40px 40px 20px; text-align: center; background: linear-gradient(135deg, #00A551 0%, #008F46 100%); border-radius: 12px 12px 0 0;">
                                    <h1 style="margin: 0; color: #ffffff; font-size: 32px; font-weight: 700;">You\'re on the List! 🎉</h1>
                                </td>
                            </tr>
                            
                            <!-- Content -->
                            <tr>
                                <td style="padding: 40px;">
                                    <h2 style="margin: 0 0 20px; color: #1A1A1A; font-size: 24px; font-weight: 600;">Thank You for Joining!</h2>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        Welcome to the Achaba waitlist! You\'re now part of an exclusive group that will get first access to our revolutionary commuter transportation platform.
                                    </p>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        We\'re working hard to launch soon, and you\'ll be among the first to know when we go live.
                                    </p>
                                    
                                    <!-- Benefits Box -->
                                    <div style="background-color: #E8F5E9; border-left: 4px solid #00A551; padding: 20px; margin: 30px 0; border-radius: 4px;">
                                        <h3 style="margin: 0 0 15px; color: #00A551; font-size: 18px; font-weight: 600;">What You\'ll Get:</h3>
                                        <ul style="margin: 0; padding-left: 20px; color: #4A4A4A; font-size: 15px; line-height: 1.8;">
                                            <li>Early access to our platform before public launch</li>
                                            <li>Exclusive launch promotions and discounts</li>
                                            <li>Priority support during your first rides</li>
                                            <li>Direct input into feature development</li>
                                        </ul>
                                    </div>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        We\'re building something special, and your support means everything to us. Stay tuned for updates!
                                    </p>
                                    
                                    <!-- CTA Button -->
                                    <div style="text-align: center; margin: 30px 0;">
                                        <a href="https://achaba.ng" style="display: inline-block; padding: 14px 32px; background-color: #00A551; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px;">Learn More About Achaba</a>
                                    </div>
                                    
                                    <p style="margin: 30px 0 0; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        Excited to have you on board!<br>
                                        <strong style="color: #00A551;">The Achaba Team</strong>
                                    </p>
                                </td>
                            </tr>
                            
                            <!-- Footer -->
                            <tr>
                                <td style="padding: 30px 40px; background-color: #FAFAFA; border-radius: 0 0 12px 12px; text-align: center;">
                                    <p style="margin: 0 0 10px; color: #7A7A7A; font-size: 14px;">
                                        <strong>Achaba</strong> - Smarter Commutes, Better Connections
                                    </p>
                                    <p style="margin: 0; color: #7A7A7A; font-size: 12px;">
                                        Have questions? Contact us at <a href="mailto:support@achaba.ng" style="color: #00A551; text-decoration: none;">support@achaba.ng</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ';
    }
    
    /**
     * Waitlist email plain text version
     */
    private function getWaitlistEmailPlainText() {
        return "You're on the Achaba Waitlist!

Thank you for joining the Achaba waitlist! You're now part of an exclusive group that will get first access to our revolutionary commuter transportation platform.

We're working hard to launch soon, and you'll be among the first to know when we go live.

What You'll Get:
- Early access to our platform before public launch
- Exclusive launch promotions and discounts
- Priority support during your first rides
- Direct input into feature development

We're building something special, and your support means everything to us. Stay tuned for updates!

Visit us at https://achaba.ng

Excited to have you on board!
The Achaba Team

Have questions? Contact us at support@achaba.ng";
    }
    
    /**
     * Send survey thank you email
     */
    public function sendSurveyThankYouEmail($recipientEmail, $recipientName, $surveyType) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($recipientEmail);
            
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Thank You for Your Feedback - Achaba Survey';
            
            $this->mailer->Body = $this->getSurveyEmailTemplate($recipientName, $surveyType);
            $this->mailer->AltBody = $this->getSurveyEmailPlainText($recipientName, $surveyType);
            
            $this->mailer->send();
            return true;
            
        } catch (Exception $e) {
            error_log("Failed to send survey email: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Survey thank you email HTML template
     */
    private function getSurveyEmailTemplate($name, $surveyType) {
        $typeLabel = ucfirst($surveyType);
        
        return '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thank You for Your Feedback</title>
        </head>
        <body style="margin: 0; padding: 0; font-family: \'Inter\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif; background-color: #f5f5f5;">
            <table role="presentation" style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td align="center" style="padding: 40px 0;">
                        <table role="presentation" style="width: 600px; max-width: 90%; background-color: #ffffff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <!-- Header -->
                            <tr>
                                <td style="padding: 40px 40px 20px; text-align: center; background: linear-gradient(135deg, #00A551 0%, #008F46 100%); border-radius: 12px 12px 0 0;">
                                    <h1 style="margin: 0; color: #ffffff; font-size: 32px; font-weight: 700;">Thank You! 🙏</h1>
                                </td>
                            </tr>
                            
                            <!-- Content -->
                            <tr>
                                <td style="padding: 40px;">
                                    <h2 style="margin: 0 0 20px; color: #1A1A1A; font-size: 24px; font-weight: 600;">Hi ' . htmlspecialchars($name) . ',</h2>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        Thank you so much for taking the time to complete our ' . $typeLabel . ' survey! Your insights are incredibly valuable to us.
                                    </p>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        Your feedback helps us understand the real challenges and opportunities in Bauchi\'s transportation landscape. We\'re using responses like yours to build a platform that truly serves the needs of our community.
                                    </p>
                                    
                                    <!-- Impact Box -->
                                    <div style="background-color: #E8F5E9; border-left: 4px solid #00A551; padding: 20px; margin: 30px 0; border-radius: 4px;">
                                        <h3 style="margin: 0 0 15px; color: #00A551; font-size: 18px; font-weight: 600;">Your Voice Matters</h3>
                                        <p style="margin: 0; color: #4A4A4A; font-size: 15px; line-height: 1.8;">
                                            Every response we receive helps us make better decisions about features, pricing, safety measures, and how we can best serve the Bauchi community. You\'re helping us build something truly meaningful.
                                        </p>
                                    </div>
                                    
                                    <p style="margin: 0 0 20px; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        We\'re working hard to launch Achaba and make commuter transportation better for everyone in Bauchi. Stay tuned for updates!
                                    </p>
                                    
                                    <!-- CTA Button -->
                                    <div style="text-align: center; margin: 30px 0;">
                                        <a href="https://achaba.ng" style="display: inline-block; padding: 14px 32px; background-color: #00A551; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px;">Visit Our Website</a>
                                    </div>
                                    
                                    <p style="margin: 30px 0 0; color: #4A4A4A; font-size: 16px; line-height: 1.6;">
                                        With gratitude,<br>
                                        <strong style="color: #00A551;">The Achaba Team</strong>
                                    </p>
                                </td>
                            </tr>
                            
                            <!-- Footer -->
                            <tr>
                                <td style="padding: 30px 40px; background-color: #FAFAFA; border-radius: 0 0 12px 12px; text-align: center;">
                                    <p style="margin: 0 0 10px; color: #7A7A7A; font-size: 14px;">
                                        <strong>Achaba</strong> - Smarter Commutes, Better Connections
                                    </p>
                                    <p style="margin: 0; color: #7A7A7A; font-size: 12px;">
                                        Have questions? Contact us at <a href="mailto:support@achaba.ng" style="color: #00A551; text-decoration: none;">support@achaba.ng</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ';
    }
    
    /**
     * Survey thank you email plain text version
     */
    private function getSurveyEmailPlainText($name, $surveyType) {
        $typeLabel = ucfirst($surveyType);
        
        return "Thank You for Your Feedback!

Hi $name,

Thank you so much for taking the time to complete our $typeLabel survey! Your insights are incredibly valuable to us.

Your feedback helps us understand the real challenges and opportunities in Bauchi's transportation landscape. We're using responses like yours to build a platform that truly serves the needs of our community.

Your Voice Matters:
Every response we receive helps us make better decisions about features, pricing, safety measures, and how we can best serve the Bauchi community. You're helping us build something truly meaningful.

We're working hard to launch Achaba and make commuter transportation better for everyone in Bauchi. Stay tuned for updates!

Visit us at https://achaba.ng

With gratitude,
The Achaba Team

Have questions? Contact us at support@achaba.ng";
    }
}
