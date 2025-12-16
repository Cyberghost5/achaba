<?php
// Email Configuration
// This file contains SMTP settings for sending emails via PHPMailer

// SMTP Server Settings
define('SMTP_HOST', 'mail.achaba.ng'); // Change to your SMTP host 
define('SMTP_PORT', 465); // Common ports: 587 (TLS), 465 (SSL), 25 (non-secure)
define('SMTP_SECURE', 'ssl'); // 'tls' or 'ssl'

// SMTP Authentication
define('SMTP_USERNAME', 'support@achaba.ng'); // Your email address
define('SMTP_PASSWORD', 'Achaba@2025'); // App password (not regular password)

// Sender Information
define('SMTP_FROM_EMAIL', 'noreply@achaba.ng'); // From email address
define('SMTP_FROM_NAME', 'Achaba'); // From name

// Reply-To Information
define('SMTP_REPLY_TO_EMAIL', 'support@achaba.ng'); // Reply-to email
define('SMTP_REPLY_TO_NAME', 'Achaba Support'); // Reply-to name

/*
 * IMPORTANT: Gmail Setup Instructions
 * 
 * If using Gmail:
 * 1. Enable 2-Factor Authentication on your Google Account
 * 2. Generate an App Password:
 *    - Go to: https://myaccount.google.com/apppasswords
 *    - Select "Mail" and "Other (Custom name)"
 *    - Copy the generated 16-character password
 *    - Use this as SMTP_PASSWORD (not your regular Gmail password)
 * 
 * For other email providers:
 * - Check your email provider's SMTP settings
 * - Update SMTP_HOST, SMTP_PORT, and SMTP_SECURE accordingly
 * - Use your email credentials for SMTP_USERNAME and SMTP_PASSWORD
 */
