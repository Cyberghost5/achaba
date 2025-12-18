<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Primary Meta Tags -->
    <title>Bauchi Mobility Survey - Share Your Experience | Achaba</title>
    <meta name="title" content="Bauchi Mobility Survey - Share Your Experience | Achaba">
    <meta name="description" content="Help us improve mobility in Bauchi by sharing your transportation experience. Your feedback shapes the future of Achaba.">
    <meta name="keywords" content="Bauchi survey, mobility survey, transportation feedback, Achaba survey, rider survey, user survey">
    <meta name="author" content="Achaba">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://achaba.ng/survey">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://achaba.ng/">
    <meta property="og:title" content="Achaba - Motorcycle Ride & Delivery Service in Bauchi, Nigeria">
    <meta property="og:description" content="Book verified motorcycle riders in Bauchi for doorstep pickups and trusted deliveries. Navigate inner streets with ease.">
    <meta property="og:image" content="https://achaba.ng/assets/images/og-image.png">
    <meta property="og:site_name" content="Achaba">
    <meta property="og:locale" content="en_NG">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://achaba.ng/">
    <meta property="twitter:title" content="Achaba - Motorcycle Ride & Delivery Service in Bauchi, Nigeria">
    <meta property="twitter:description" content="Book verified motorcycle riders in Bauchi for doorstep pickups and trusted deliveries. Navigate inner streets with ease.">
    <meta property="twitter:image" content="https://achaba.ng/assets/images/twitter-image.png">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Structured Data / JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Achaba",
      "image": "https://achaba.ng/assets/images/logo.png",
      "@id": "https://achaba.ng",
      "url": "https://achaba.ng",
      "telephone": "",
      "email": "hello@achaba.ng",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "",
        "addressLocality": "Bauchi",
        "addressRegion": "Bauchi State",
        "postalCode": "",
        "addressCountry": "NG"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 10.3158,
        "longitude": 9.8442
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
          "Sunday"
        ],
        "opens": "00:00",
        "closes": "23:59"
      },
      "sameAs": [
        "https://twitter.com/achaba",
        "https://instagram.com/achaba",
        "https://linkedin.com/company/achaba"
      ],
      "priceRange": "₦₦",
      "description": "Book verified motorcycle riders in Bauchi for doorstep pickups and trusted deliveries. Navigate inner streets with ease."
    }
    </script>
    
    <style>
        /* Override Bootstrap primary colors with Achaba green */
        .survey-form-section .btn-primary {
            background-color: #00A551;
            border-color: #00A551;
        }
        
        .survey-form-section .btn-primary:hover,
        .survey-form-section .btn-primary:focus,
        .survey-form-section .btn-primary:active {
            background-color: #008F46;
            border-color: #008F46;
        }
        
        .survey-form-section .btn-outline-primary {
            color: #00A551;
            border-color: #00A551;
        }
        
        .survey-form-section .btn-outline-primary:hover,
        .survey-form-section .btn-check:checked + .btn-outline-primary {
            background-color: #00A551;
            border-color: #00A551;
            color: white !important;
        }
        
        .survey-form-section .badge.bg-primary {
            background-color: #00A551 !important;
        }
        
        .survey-form-section .form-control:focus,
        .survey-form-section .form-check-input:focus {
            border-color: #00A551;
            box-shadow: 0 0 0 0.25rem rgba(0, 165, 81, 0.25);
        }
        
        .survey-form-section .form-check-input:checked {
            background-color: #00A551;
            border-color: #00A551;
        }
        
        .survey-form-section .spinner-border {
            color: #00A551;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="./">
                <img src="assets/images/logo.png" alt="achaba">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="how-it-works">How it Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="survey">Survey</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#waitlist">Waitlist</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#contact">Contact</a>
                    </li> -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary px-4" href="partner">Partner with us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Survey Hero Section -->
    <section class="survey-hero-section py-5 mt-4">
        <div class="container">
            <div class="text-center mb-4">
                <h1 class="display-4 mb-3">Bauchi Mobility Survey</h1>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Your voice matters! Help us understand transportation challenges in Bauchi<br>
                    and shape the future of mobility in our community.
                </p>
            </div>
        </div>
    </section>

    <!-- Survey Form Section -->
    <section class="survey-form-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4">
                        <form id="surveyForm">
                            
                            <!-- Step 1: Survey Type Selection -->
                            <div class="survey-step active" id="step1">
                                <div class="text-center mb-4">
                                    <div class="step-indicator mb-3">
                                        <span class="badge bg-primary px-3 py-2">Step 1 of 3</span>
                                    </div>
                                    <h3 class="fw-bold mb-3">I want to take this survey as:</h3>
                                    <p class="text-muted">Select the option that best describes you</p>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="surveyType" id="typeUser" value="user" required>
                                        <label class="btn btn-outline-primary w-100 py-4" for="typeUser">
                                            <i class="fas fa-user fa-2x d-block mb-3"></i>
                                            <h5 class="mb-2">User</h5>
                                            <small>I need transportation or delivery services</small>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="surveyType" id="typeRider" value="rider" required>
                                        <label class="btn btn-outline-primary w-100 py-4" for="typeRider">
                                            <i class="fas fa-motorcycle fa-2x d-block mb-3"></i>
                                            <h5 class="mb-2">Rider</h5>
                                            <small>I am a motorcycle rider or want to become one</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Personal Information -->
                            <div class="survey-step" id="step2">
                                <div class="text-center mb-4">
                                    <div class="step-indicator mb-3">
                                        <span class="badge bg-primary px-3 py-2">Step 2 of 3</span>
                                    </div>
                                    <h3 class="fw-bold mb-3">Your Information</h3>
                                    <p class="text-muted">Please provide your contact details</p>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="fullName" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="fullName" name="fullName" placeholder="Enter your full name" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="yourname@example.com" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="phone" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="080XXXXXXXX" required>
                                </div>
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="prevStep(1)">
                                        <i class="fas fa-arrow-left me-2"></i>Back
                                    </button>
                                    <button type="button" class="btn btn-primary btn-lg px-5" onclick="nextStep(3)">
                                        Continue <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Survey Questions (Placeholder) -->
                            <div class="survey-step" id="step3">
                                <div class="text-center mb-4">
                                    <div class="step-indicator mb-3">
                                        <span class="badge bg-primary px-3 py-2">Step 3 of 3</span>
                                    </div>
                                    <h3 class="fw-bold mb-3">Survey Questions</h3>
                                    <p class="text-muted">Please answer the following questions</p>
                                </div>
                                
                                <!-- Survey questions will be added here -->
                                <div id="surveyQuestions">
                                    <!-- Rider Questions -->
                                    <div class="rider-questions" style="display: none;">
                                        
                                        <!-- SECTION 1: BACKGROUND (WARM-UP) -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 1: Background</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q1" class="form-label fw-semibold">1. How long have you been riding motorcycles for work?</label>
                                                <textarea class="form-control" id="q1" name="q1" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q2" class="form-label fw-semibold">2. Is this your main source of income? What else do you do?</label>
                                                <textarea class="form-control" id="q2" name="q2" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q3" class="form-label fw-semibold">3. Which areas in Bauchi do you mostly operate in?</label>
                                                <textarea class="form-control" id="q3" name="q3" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 2: DAILY WORK REALITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 2: Daily Work Reality</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q4" class="form-label fw-semibold">4. Walk me through a typical workday, from when you start to when you stop.</label>
                                                <textarea class="form-control" id="q4" name="q4" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q5" class="form-label fw-semibold">5. What time of day is usually best for you? Why?</label>
                                                <textarea class="form-control" id="q5" name="q5" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q6" class="form-label fw-semibold">6. What usually makes a day go badly?</label>
                                                <textarea class="form-control" id="q6" name="q6" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q7" class="form-label fw-semibold">7. On a good day, what makes you feel satisfied with your work?</label>
                                                <textarea class="form-control" id="q7" name="q7" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 3: MONEY & STABILITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 3: Money & Stability</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q8" class="form-label fw-semibold">8. What are your biggest daily or weekly expenses?</label>
                                                <textarea class="form-control" id="q8" name="q8" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q9" class="form-label fw-semibold">9. Do your earnings change a lot from week to week?</label>
                                                <textarea class="form-control" id="q9" name="q9" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q10" class="form-label fw-semibold">10. Are you usually able to save anything?</label>
                                                <textarea class="form-control" id="q10" name="q10" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 4: SAFETY & DIGNITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 4: Safety & Dignity</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q11" class="form-label fw-semibold">11. Have you ever felt unsafe or uncomfortable while working? What happened?</label>
                                                <textarea class="form-control" id="q11" name="q11" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q12" class="form-label fw-semibold">12. Which types of passengers or trips are most difficult for you?</label>
                                                <textarea class="form-control" id="q12" name="q12" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q13" class="form-label fw-semibold">13. What do you personally do to stay safe?</label>
                                                <textarea class="form-control" id="q13" name="q13" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q14" class="form-label fw-semibold">14. Do you feel this work is respected in your community? Why or why not?</label>
                                                <textarea class="form-control" id="q14" name="q14" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 5: TECH & ACCESS -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 5: Tech & Access</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q15" class="form-label fw-semibold">15. How do passengers usually find or contact you?</label>
                                                <textarea class="form-control" id="q15" name="q15" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q16" class="form-label fw-semibold">16. How important is your phone to your work?</label>
                                                <textarea class="form-control" id="q16" name="q16" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q17" class="form-label fw-semibold">17. Are there things your phone cannot do that limit your work?</label>
                                                <textarea class="form-control" id="q17" name="q17" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 6: PLATFORM FIT (VERY IMPORTANT) -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 6: Platform Fit</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q18" class="form-label fw-semibold">18. If passengers could book you to come pick them from inside streets, how would you feel about that?</label>
                                                <textarea class="form-control" id="q18" name="q18" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q19" class="form-label fw-semibold">19. How would you feel about pickup-only errands where the customer has already paid the vendor?</label>
                                                <textarea class="form-control" id="q19" name="q19" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q20" class="form-label fw-semibold">20. What would make you trust or distrust such a system?</label>
                                                <textarea class="form-control" id="q20" name="q20" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 7: FUTURE & SUPPORT -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 7: Future & Support</h5>
                                            
                                            <div class="mb-4">
                                                <label for="q21" class="form-label fw-semibold">21. Are you part of any rider group or association? How does it help?</label>
                                                <textarea class="form-control" id="q21" name="q21" rows="2" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q22" class="form-label fw-semibold">22. What would make this work more secure or dignified for you?</label>
                                                <textarea class="form-control" id="q22" name="q22" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q23" class="form-label fw-semibold">23. If a company wanted to genuinely support riders in Bauchi, where should they start?</label>
                                                <textarea class="form-control" id="q23" name="q23" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q24" class="form-label fw-semibold">24. Is there anything important about your work we haven't talked about?</label>
                                                <textarea class="form-control" id="q24" name="q24" rows="3" placeholder="Your answer..."></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- User Questions -->
                                    <div class="user-questions" style="display: none;">
                                        <!-- Note: Name, phone, email already collected in Step 2 -->
                                        
                                        <!-- SECTION 1 -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 1: Usage Pattern</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">1. How often do you use motorcycle transport? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_daily" value="Daily" required>
                                                        <label class="form-check-label" for="usage_daily">Daily</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_few_times" value="A few times a week">
                                                        <label class="form-check-label" for="usage_few_times">A few times a week</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_occasionally" value="Occasionally">
                                                        <label class="form-check-label" for="usage_occasionally">Occasionally</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_rarely" value="Rarely">
                                                        <label class="form-check-label" for="usage_rarely">Rarely</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">2. What is your primary reason for using motorcycle transport? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_speed" value="Speed / avoiding traffic" required>
                                                        <label class="form-check-label" for="reason_speed">Speed / avoiding traffic</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_accessibility" value="Accessibility">
                                                        <label class="form-check-label" for="reason_accessibility">Accessibility</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_cost" value="Cost">
                                                        <label class="form-check-label" for="reason_cost">Cost</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_convenience" value="Convenience">
                                                        <label class="form-check-label" for="reason_convenience">Convenience</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_alternatives" value="Lack of alternatives">
                                                        <label class="form-check-label" for="reason_alternatives">Lack of alternatives</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_other" value="Other">
                                                        <label class="form-check-label" for="reason_other">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 2: USAGE BEHAVIOUR -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 2: Usage Behaviour</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">3. When do you most often use motorcycle transport? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_morning" value="Morning" required>
                                                        <label class="form-check-label" for="time_morning">Morning</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_afternoon" value="Afternoon">
                                                        <label class="form-check-label" for="time_afternoon">Afternoon</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_evening" value="Evening">
                                                        <label class="form-check-label" for="time_evening">Evening</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_late" value="Late night">
                                                        <label class="form-check-label" for="time_late">Late night</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">4. Where do you usually get motorcycle rides? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_roadside" value="Roadside / junction" required>
                                                        <label class="form-check-label" for="loc_roadside">Roadside / junction</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_park" value="Motorcycle park">
                                                        <label class="form-check-label" for="loc_park">Motorcycle park</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_near" value="Near home or workplace">
                                                        <label class="form-check-label" for="loc_near">Near home or workplace</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_contact" value="Through a personal contact">
                                                        <label class="form-check-label" for="loc_contact">Through a personal contact</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">5. Do you usually ride with the same rider or different riders? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rider_consistency" id="rider_same" value="Mostly the same" required>
                                                        <label class="form-check-label" for="rider_same">Mostly the same</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rider_consistency" id="rider_different" value="Different riders">
                                                        <label class="form-check-label" for="rider_different">Different riders</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rider_consistency" id="rider_no_pref" value="No preference">
                                                        <label class="form-check-label" for="rider_no_pref">No preference</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 3: BOOKING & COMMUNICATION PATTERNS -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 3: Booking & Communication Patterns</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">6. How do you usually find or contact a rider? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_walk" value="Walk to rider location" required>
                                                        <label class="form-check-label" for="find_walk">Walk to rider location</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_call" value="Call a rider directly">
                                                        <label class="form-check-label" for="find_call">Call a rider directly</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_contacts" value="Rider contacts me">
                                                        <label class="form-check-label" for="find_contacts">Rider contacts me</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_third_party" value="Through a third party">
                                                        <label class="form-check-label" for="find_third_party">Through a third party</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">7. Have you ever struggled to find a rider when needed? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_often" value="Yes, often" required>
                                                        <label class="form-check-label" for="struggle_often">Yes, often</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_sometimes" value="Yes, sometimes">
                                                        <label class="form-check-label" for="struggle_sometimes">Yes, sometimes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_rarely" value="Rarely">
                                                        <label class="form-check-label" for="struggle_rarely">Rarely</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_never" value="Never">
                                                        <label class="form-check-label" for="struggle_never">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">8. What usually causes this difficulty? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_time" value="Time of day" required>
                                                        <label class="form-check-label" for="cause_time">Time of day</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_location" value="Location">
                                                        <label class="form-check-label" for="cause_location">Location</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_weather" value="Weather">
                                                        <label class="form-check-label" for="cause_weather">Weather</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_availability" value="Rider availability">
                                                        <label class="form-check-label" for="cause_availability">Rider availability</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_other" value="Other">
                                                        <label class="form-check-label" for="cause_other">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 4: PRICING & PAYMENT EXPERIENCE -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 4: Pricing & Payment Experience</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">9. Do you usually agree on fare before the trip? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="fare_agreement" id="fare_always" value="Always" required>
                                                        <label class="form-check-label" for="fare_always">Always</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="fare_agreement" id="fare_sometimes" value="Sometimes">
                                                        <label class="form-check-label" for="fare_sometimes">Sometimes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="fare_agreement" id="fare_rarely" value="Rarely">
                                                        <label class="form-check-label" for="fare_rarely">Rarely</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">10. Have you experienced disagreements over pricing? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_yes_often" value="Yes, often" required>
                                                        <label class="form-check-label" for="disagree_yes_often">Yes, often</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_yes_sometimes" value="Yes, sometimes">
                                                        <label class="form-check-label" for="disagree_yes_sometimes">Yes, sometimes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_rarely" value="Rarely">
                                                        <label class="form-check-label" for="disagree_rarely">Rarely</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_never" value="Never">
                                                        <label class="form-check-label" for="disagree_never">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">11. What payment method do you usually use? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_cash" value="Cash only" required>
                                                        <label class="form-check-label" for="payment_cash">Cash only</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_transfer" value="Mobile transfer">
                                                        <label class="form-check-label" for="payment_transfer">Mobile transfer</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_both" value="Both">
                                                        <label class="form-check-label" for="payment_both">Both</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 5: SAFETY & TRUST PERCEPTION -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 5: Safety & Trust Perception</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">12. How do you generally feel about your safety using motorcycles? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_very_safe" value="Very safe" required>
                                                        <label class="form-check-label" for="safety_very_safe">Very safe</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_somewhat_safe" value="Somewhat safe">
                                                        <label class="form-check-label" for="safety_somewhat_safe">Somewhat safe</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_neutral" value="Neutral">
                                                        <label class="form-check-label" for="safety_neutral">Neutral</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_somewhat_unsafe" value="Somewhat unsafe">
                                                        <label class="form-check-label" for="safety_somewhat_unsafe">Somewhat unsafe</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_very_unsafe" value="Very unsafe">
                                                        <label class="form-check-label" for="safety_very_unsafe">Very unsafe</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">13. What safety concerns do you have? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_reckless" value="Reckless driving" required>
                                                        <label class="form-check-label" for="concern_reckless">Reckless driving</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_accidents" value="Accidents">
                                                        <label class="form-check-label" for="concern_accidents">Accidents</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_theft" value="Theft / robbery">
                                                        <label class="form-check-label" for="concern_theft">Theft / robbery</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_stranger" value="Riding with strangers">
                                                        <label class="form-check-label" for="concern_stranger">Riding with strangers</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_harassment" value="Harassment">
                                                        <label class="form-check-label" for="concern_harassment">Harassment</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_none_safety" value="None">
                                                        <label class="form-check-label" for="concern_none_safety">None</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">14. If something goes wrong, how confident are you in getting help? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="help_confidence" id="help_confident" value="Confident" required>
                                                        <label class="form-check-label" for="help_confident">Confident</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="help_confidence" id="help_unsure" value="Unsure">
                                                        <label class="form-check-label" for="help_unsure">Unsure</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="help_confidence" id="help_not_confident" value="Not confident">
                                                        <label class="form-check-label" for="help_not_confident">Not confident</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 6: RELIABILITY & EXPERIENCE QUALITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 6: Reliability & Experience Quality</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">15. How would you rate the reliability of motorcycle transport? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="reliability" id="reliability_very" value="Very reliable" required>
                                                        <label class="form-check-label" for="reliability_very">Very reliable</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="reliability" id="reliability_somewhat" value="Somewhat reliable">
                                                        <label class="form-check-label" for="reliability_somewhat">Somewhat reliable</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="reliability" id="reliability_unreliable" value="Unreliable">
                                                        <label class="form-check-label" for="reliability_unreliable">Unreliable</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">16. Have you had any memorable experiences (good or bad)? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_mostly_good" value="Mostly good" required>
                                                        <label class="form-check-label" for="exp_mostly_good">Mostly good</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_mostly_bad" value="Mostly bad">
                                                        <label class="form-check-label" for="exp_mostly_bad">Mostly bad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_mixed" value="Mixed">
                                                        <label class="form-check-label" for="exp_mixed">Mixed</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_neutral" value="Neutral">
                                                        <label class="form-check-label" for="exp_neutral">Neutral</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_none" value="None">
                                                        <label class="form-check-label" for="exp_none">None</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 7: REFLECTION & EXPECTATIONS -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 7: Reflection & Expectations</h5>
                                            
                                            <div class="mb-4">
                                                <label for="frustration" class="form-label fw-semibold">17. What frustrates you most about the current experience? <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="frustration" name="frustration" rows="3" placeholder="Tell us what frustrates you..." required></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="improvement" class="form-label fw-semibold">18. What would improve your experience with motorcycles? <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="improvement" name="improvement" rows="3" placeholder="Tell us what would make it better..." required></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">19. Would you switch to a safer, more reliable option if available? <span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="would_switch" id="switch_yes" value="Yes" required>
                                                        <label class="form-check-label" for="switch_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="would_switch" id="switch_maybe" value="Maybe">
                                                        <label class="form-check-label" for="switch_maybe">Maybe</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="would_switch" id="switch_no" value="No">
                                                        <label class="form-check-label" for="switch_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 8: DEMOGRAPHICS (OPTIONAL) -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">Section 8: Demographics (Optional)</h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">20. What is your age range?</label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age_range" id="age_under18" value="Under 18">
                                                        <label class="form-check-label" for="age_under18">Under 18</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age_range" id="age_18_24" value="18-24">
                                                        <label class="form-check-label" for="age_18_24">18-24</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age_range" id="age_25_34" value="25-34">
                                                        <label class="form-check-label" for="age_25_34">25-34</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age_range" id="age_35_44" value="35-44">
                                                        <label class="form-check-label" for="age_35_44">35-44</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age_range" id="age_45_plus" value="45+">
                                                        <label class="form-check-label" for="age_45_plus">45+</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">21. What type of phone do you use?</label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="phone_type" id="phone_smartphone" value="Smartphone">
                                                        <label class="form-check-label" for="phone_smartphone">Smartphone</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="phone_type" id="phone_basic" value="Basic phone">
                                                        <label class="form-check-label" for="phone_basic">Basic phone</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="prevStep(2)">
                                        <i class="fas fa-arrow-left me-2"></i>Back
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                        Submit Survey <i class="fas fa-check ms-2"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                        
                        <!-- Response Message -->
                        <div id="responseMessage" class="mt-4 alert" role="alert" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-5" id="contact">
        <div class="container">
            <!-- Contact and Social Links -->
            <div class="row justify-content-between mb-5 pb-4 align-items-start">
                <div class="col-md-4 text-md-start text-center mb-4 mb-md-0">
                    <h6 class="text-light mb-3">Get in Touch</h6>
                    <a href="mailto:hello@achaba.ng" class="text-light text-decoration-none d-inline-flex align-items-center">
                        <i class="far fa-envelope me-2"></i>
                        hello@achaba.ng
                    </a>
                </div>
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <div class="text-center">
                        <!-- <h2 class="fw-bold mb-3 text-primary" style="font-size: 3rem; letter-spacing: -2px;">achaba</h2> -->
                        <img src="assets/images/logo.png" alt="achaba" width="250px" class="img-fluid mb-3">
                        <p class="text-light mb-0" style="font-size: 1.1rem;">Anything to pick. Anywhere to go.</p>
                    </div>
                </div>
                <div class="col-md-4 text-md-end text-center">
                    <h6 class="text-light mb-3">Follow Us</h6>
                    <div class="social-links d-inline-flex gap-3">
                        <a href="#" class="text-white d-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white d-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-white d-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">

            <!-- App Launch Info -->
            <div class="text-center py-4">
                <div class="mb-3">
                    <i class="fas fa-mobile-alt text-primary" style="font-size: 2rem;"></i>
                </div>
                <p class="text-light mb-2" style="font-size: 1rem;">
                    Launching soon on Play Store and Apple Store, join the waitlist <a href="./#waitlist" class="text-primary text-decoration-underline">here</a>
                </p>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">
                    Built for Bauchi • Powered by Achaba
                </p>
            </div>

            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">

            <!-- Copyright -->
            <div class="text-center py-3">
                <small class="text-muted">© 2025 ACHABA. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Survey Form Handler -->
    <script>
        // Auto-advance from Step 1 when survey type is selected
        document.addEventListener('DOMContentLoaded', function() {
            const surveyTypeRadios = document.querySelectorAll('input[name="surveyType"]');
            
            surveyTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Small delay for smooth transition
                    setTimeout(() => {
                        nextStep(2);
                    }, 300);
                });
            });
        });
        
        // Step navigation
        function nextStep(stepNumber) {
            // Validate current step
            const currentStep = document.querySelector('.survey-step.active');
            const inputs = currentStep.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.reportValidity();
                    isValid = false;
                }
            });
            
            if (!isValid) return;
            
            // If moving to step 3, load appropriate questions
            if (stepNumber === 3) {
                const surveyType = document.querySelector('input[name="surveyType"]:checked').value;
                const riderQuestions = document.querySelector('.rider-questions');
                const userQuestions = document.querySelector('.user-questions');
                
                if (surveyType === 'rider') {
                    riderQuestions.style.display = 'block';
                    userQuestions.style.display = 'none';
                } else {
                    riderQuestions.style.display = 'none';
                    userQuestions.style.display = 'block';
                }
            }
            
            // Hide current step
            currentStep.classList.remove('active');
            
            // Show next step
            document.getElementById('step' + stepNumber).classList.add('active');
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        function prevStep(stepNumber) {
            document.querySelector('.survey-step.active').classList.remove('active');
            document.getElementById('step' + stepNumber).classList.add('active');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        // Form submission
        document.getElementById('surveyForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const responseMessage = document.getElementById('responseMessage');
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';
            responseMessage.style.display = 'none';
            
            // Collect form data
            const formData = new FormData(this);
            
            try {
                const response = await fetch('submit_survey.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                // Show response message
                responseMessage.style.display = 'block';
                responseMessage.textContent = data.message;
                
                if (data.success) {
                    responseMessage.className = 'mt-4 alert alert-success';
                    document.getElementById('surveyForm').reset();
                    // Go back to step 1
                    document.querySelector('.survey-step.active').classList.remove('active');
                    document.getElementById('step1').classList.add('active');
                } else {
                    responseMessage.className = 'mt-4 alert alert-danger';
                }
                
            } catch (error) {
                responseMessage.style.display = 'block';
                responseMessage.className = 'mt-4 alert alert-danger';
                responseMessage.textContent = 'Connection error. Please try again.';
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Submit Survey <i class="fas fa-check ms-2"></i>';
            }
        });
    </script>
</body>
</html>
