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
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://achaba.ng/survey.php">
    
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
                        <a class="nav-link active" href="survey">Survey</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#waitlist">Waitlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#contact">Contact</a>
                    </li>
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
                <h1 class="display-4 fw-bold mb-3">Bauchi Mobility Survey</h1>
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
                                            <small class="text-muted">I need transportation or delivery services</small>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="surveyType" id="typeRider" value="rider" required>
                                        <label class="btn btn-outline-primary w-100 py-4" for="typeRider">
                                            <i class="fas fa-motorcycle fa-2x d-block mb-3"></i>
                                            <h5 class="mb-2">Rider</h5>
                                            <small class="text-muted">I am a motorcycle rider or want to become one</small>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-primary btn-lg px-5" onclick="nextStep(2)">
                                        Continue <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
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
                                    
                                    <!-- User Questions -->
                                    <div class="user-questions" style="display: none;">
                                        <!-- Note: Questions 1-3 (name, phone, email) already collected in Step 2 -->
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">4. Can we contact you for follow-up or pilot testing? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="contact_followup" id="contact_yes" value="Yes" required>
                                                    <label class="form-check-label" for="contact_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="contact_followup" id="contact_no" value="No">
                                                    <label class="form-check-label" for="contact_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label for="user_location" class="form-label fw-semibold">5. Where do you live? <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="user_location" name="user_location" placeholder="Your area or neighborhood..." required>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">6. Which best describes you? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="type_student" value="Student" required>
                                                    <label class="form-check-label" for="type_student">Student</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="type_worker" value="Worker / Office staff">
                                                    <label class="form-check-label" for="type_worker">Worker / Office staff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="type_vendor" value="Vendor / Business owner">
                                                    <label class="form-check-label" for="type_vendor">Vendor / Business owner</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="type_artisan" value="Artisan / Freelancer">
                                                    <label class="form-check-label" for="type_artisan">Artisan / Freelancer</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="type_other" value="Other">
                                                    <label class="form-check-label" for="type_other">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">7. How often do you move from your area to another location daily? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="movement_frequency" id="freq_daily" value="Daily" required>
                                                    <label class="form-check-label" for="freq_daily">Daily</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="movement_frequency" id="freq_few_times" value="A few times a week">
                                                    <label class="form-check-label" for="freq_few_times">A few times a week</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="movement_frequency" id="freq_occasionally" value="Occasionally">
                                                    <label class="form-check-label" for="freq_occasionally">Occasionally</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="movement_frequency" id="freq_rarely" value="Rarely">
                                                    <label class="form-check-label" for="freq_rarely">Rarely</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">8. How do you usually get transport from your area? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport_method" id="trans_trek" value="Trek to main road" required>
                                                    <label class="form-check-label" for="trans_trek">Trek to main road</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport_method" id="trans_motorcycle" value="Motorcycle (Achaba / Okada)">
                                                    <label class="form-check-label" for="trans_motorcycle">Motorcycle (Achaba / Okada)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport_method" id="trans_car" value="Car">
                                                    <label class="form-check-label" for="trans_car">Car</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport_method" id="trans_tricycle" value="Tricycle">
                                                    <label class="form-check-label" for="trans_tricycle">Tricycle</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport_method" id="trans_combination" value="Combination">
                                                    <label class="form-check-label" for="trans_combination">Combination</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label for="movement_challenge" class="form-label fw-semibold">9. What is the biggest challenge with movement in your area? <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="movement_challenge" name="movement_challenge" rows="3" placeholder="Tell us about your biggest challenge..." required></textarea>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">10. Have you ever been late to school, work, or an important appointment due to transport? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ever_late" id="late_yes" value="Yes" required>
                                                    <label class="form-check-label" for="late_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ever_late" id="late_no" value="No">
                                                    <label class="form-check-label" for="late_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">11. How often do you use motorcycles for transport? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_frequency" id="moto_very_often" value="Very often" required>
                                                    <label class="form-check-label" for="moto_very_often">Very often</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_frequency" id="moto_often" value="Often">
                                                    <label class="form-check-label" for="moto_often">Often</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_frequency" id="moto_sometimes" value="Sometimes">
                                                    <label class="form-check-label" for="moto_sometimes">Sometimes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_frequency" id="moto_rarely" value="Rarely">
                                                    <label class="form-check-label" for="moto_rarely">Rarely</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">12. How do you usually find a rider? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="find_rider" id="find_road" value="On the road" required>
                                                    <label class="form-check-label" for="find_road">On the road</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="find_rider" id="find_call" value="By calling someone">
                                                    <label class="form-check-label" for="find_call">By calling someone</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="find_rider" id="find_referral" value="Through referrals">
                                                    <label class="form-check-label" for="find_referral">Through referrals</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="find_rider" id="find_struggle" value="I struggle to find one">
                                                    <label class="form-check-label" for="find_struggle">I struggle to find one</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">13. What concerns you most when using motorcycles? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_concern" id="concern_safety" value="Safety" required>
                                                    <label class="form-check-label" for="concern_safety">Safety</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_concern" id="concern_pricing" value="Pricing">
                                                    <label class="form-check-label" for="concern_pricing">Pricing</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_concern" id="concern_trust" value="Trust">
                                                    <label class="form-check-label" for="concern_trust">Trust</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_concern" id="concern_availability" value="Availability">
                                                    <label class="form-check-label" for="concern_availability">Availability</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="motorcycle_concern" id="concern_none" value="None">
                                                    <label class="form-check-label" for="concern_none">None</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">14. Have you ever needed someone to pick up items for you? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="needed_pickup" id="pickup_yes" value="Yes" required>
                                                    <label class="form-check-label" for="pickup_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="needed_pickup" id="pickup_no" value="No">
                                                    <label class="form-check-label" for="pickup_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">15. What type of items do you usually need picked up? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_items" id="items_food" value="Food items" required>
                                                    <label class="form-check-label" for="items_food">Food items</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_items" id="items_market" value="Market goods">
                                                    <label class="form-check-label" for="items_market">Market goods</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_items" id="items_cakes" value="Cakes or fragile items">
                                                    <label class="form-check-label" for="items_cakes">Cakes or fragile items</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_items" id="items_documents" value="Documents">
                                                    <label class="form-check-label" for="items_documents">Documents</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_items" id="items_other" value="Other">
                                                    <label class="form-check-label" for="items_other">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">16. What makes pickups difficult today? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_difficulty" id="diff_trust" value="Trust" required>
                                                    <label class="form-check-label" for="diff_trust">Trust</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_difficulty" id="diff_damage" value="Damage risk">
                                                    <label class="form-check-label" for="diff_damage">Damage risk</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_difficulty" id="diff_directions" value="Poor directions">
                                                    <label class="form-check-label" for="diff_directions">Poor directions</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_difficulty" id="diff_cost" value="Cost">
                                                    <label class="form-check-label" for="diff_cost">Cost</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_difficulty" id="diff_prefer_myself" value="I prefer to go myself">
                                                    <label class="form-check-label" for="diff_prefer_myself">I prefer to go myself</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">17. How useful would doorstep motorcycle pickup be for you? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_usefulness" id="useful_very" value="Very useful" required>
                                                    <label class="form-check-label" for="useful_very">Very useful</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_usefulness" id="useful_yes" value="Useful">
                                                    <label class="form-check-label" for="useful_yes">Useful</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_usefulness" id="useful_not_sure" value="Not sure">
                                                    <label class="form-check-label" for="useful_not_sure">Not sure</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pickup_usefulness" id="useful_not" value="Not useful">
                                                    <label class="form-check-label" for="useful_not">Not useful</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">18. Would you use a service that lets you book a rider for errands or pickups? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="use_booking_service" id="use_yes" value="Yes" required>
                                                    <label class="form-check-label" for="use_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="use_booking_service" id="use_maybe" value="Maybe">
                                                    <label class="form-check-label" for="use_maybe">Maybe</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="use_booking_service" id="use_no" value="No">
                                                    <label class="form-check-label" for="use_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">19. What would make you trust Achaba? (Select all that apply) <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="trust_factors[]" id="trust_verified" value="Verified riders">
                                                    <label class="form-check-label" for="trust_verified">Verified riders</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="trust_factors[]" id="trust_pricing" value="Clear pricing">
                                                    <label class="form-check-label" for="trust_pricing">Clear pricing</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="trust_factors[]" id="trust_nocash" value="No cash handling">
                                                    <label class="form-check-label" for="trust_nocash">No cash handling</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="trust_factors[]" id="trust_support" value="Support access">
                                                    <label class="form-check-label" for="trust_support">Support access</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="trust_factors[]" id="trust_recommendations" value="Recommendations">
                                                    <label class="form-check-label" for="trust_recommendations">Recommendations</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">20. What phone do you use most? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="phone_type" id="phone_android" value="Android smartphone" required>
                                                    <label class="form-check-label" for="phone_android">Android smartphone</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="phone_type" id="phone_iphone" value="iPhone">
                                                    <label class="form-check-label" for="phone_iphone">iPhone</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="phone_type" id="phone_feature" value="Feature phone">
                                                    <label class="form-check-label" for="phone_feature">Feature phone</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">21. How would you prefer to book a ride? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_preference" id="book_call" value="Phone call" required>
                                                    <label class="form-check-label" for="book_call">Phone call</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_preference" id="book_app" value="App">
                                                    <label class="form-check-label" for="book_app">App</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_preference" id="book_whatsapp" value="WhatsApp">
                                                    <label class="form-check-label" for="book_whatsapp">WhatsApp</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="booking_preference" id="book_sms" value="SMS / USSD">
                                                    <label class="form-check-label" for="book_sms">SMS / USSD</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">22. If Achaba launched today, would you try it? <span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="would_try" id="try_yes" value="Yes" required>
                                                    <label class="form-check-label" for="try_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="would_try" id="try_maybe" value="Maybe">
                                                    <label class="form-check-label" for="try_maybe">Maybe</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="would_try" id="try_no" value="No">
                                                    <label class="form-check-label" for="try_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label for="must_get_right" class="form-label fw-semibold">23. What is one thing Achaba must get right to work in Bauchi? <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="must_get_right" name="must_get_right" rows="3" placeholder="Tell us what's most important..." required></textarea>
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
            <!-- Logo and Tagline -->
            <div class="text-center mb-5">
                <img src="assets/images/logo.png" alt="achaba" width="250px" class="img-fluid mb-3">
                <p class="text-light mb-0" style="font-size: 1.1rem;">Anything to pick. Anywhere to go.</p>
            </div>

            <!-- Contact and Social Links -->
            <div class="row justify-content-between mb-5 pb-4">
                <div class="col-md-6 text-md-start text-center mb-4 mb-md-0">
                    <h6 class="text-light mb-3">Get in Touch</h6>
                    <a href="mailto:hello@achaba.ng" class="text-light text-decoration-none d-inline-flex align-items-center">
                        <i class="far fa-envelope me-2"></i>
                        hello@achaba.ng
                    </a>
                </div>
                <div class="col-md-6 text-md-end text-center">
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
                    Launching soon on Play Store and App Store
                </p>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">
                    Built for Bauchi • Powered by community
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
