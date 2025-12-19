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
    <title>How ACHABA Works - Motorcycle Ride & Delivery System | Achaba</title>
    <meta name="title" content="How ACHABA Works - Motorcycle Ride & Delivery System | Achaba">
    <meta name="description" content="Discover how ACHABA connects riders and users in Bauchi. A clear, human system for motorcycle movement in cities like Bauchi.">
    <meta name="keywords" content="how achaba works, motorcycle booking system, Bauchi transport, ride hailing process">
    <meta name="author" content="Achaba">
    <meta name="robots" content="index, follow">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://achaba.ng/how-it-works">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://achaba.ng/how-it-works">
    <meta property="og:title" content="How ACHABA Works - Motorcycle Ride & Delivery System">
    <meta property="og:description" content="A clear, human system for motorcycle movement in cities like Bauchi">
    <meta property="og:image" content="https://achaba.ng/assets/images/og-image.png">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://achaba.ng/how-it-works">
    <meta property="twitter:title" content="How ACHABA Works - Motorcycle Ride & Delivery System">
    <meta property="twitter:description" content="A clear, human system for motorcycle movement in cities like Bauchi">
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
    
    <style>
        .how-it-works-hero {
            background: linear-gradient(135deg, #00A551 0%, #008F46 100%);
            color: white;
            padding: 80px 0 60px;
        }
        
        .process-section {
            background: white;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 30px;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        
        .process-section:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }
        
        .process-icon-box {
            width: 60px;
            height: 60px;
            background: #e8f5e9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .process-icon-box i {
            font-size: 1.75rem;
            color: #00A551;
        }
        
        .step-indicator {
            font-size: 0.9rem;
            color: #00A551;
            font-weight: 600;
            margin-bottom: 12px;
        }
        
        .process-section h4 {
            color: #212529;
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .process-section p {
            color: #495057;
            line-height: 1.7;
            margin-bottom: 20px;
        }
        
        .process-section .subtitle {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 25px;
        }
        
        .process-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .process-list li {
            padding: 8px 0 8px 30px;
            position: relative;
            color: #495057;
            line-height: 1.6;
        }
        
        .process-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #00A551;
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .sub-list {
            list-style: none;
            padding-left: 20px;
            margin-top: 8px;
        }
        
        .sub-list li {
            padding: 4px 0 4px 20px;
            font-size: 0.95rem;
        }
        
        .sub-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #00A551;
        }
        
        .highlight-box {
            background: transparent;
            border: none;
            padding: 0;
            margin-top: 30px;
        }
        
        .highlight-box p {
            margin: 0;
            color: #495057;
            font-style: italic;
            font-weight: 400;
            font-size: 1rem;
        }
        
        .closing-section {
            background: linear-gradient(135deg, #00A551 0%, #008F46 100%);
            color: white;
            padding: 60px 40px;
            border-radius: 16px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .closing-section h3 {
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .closing-section p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        /* Button Custom Styles */
        .btn-primary {
            background-color: #00A551 !important;
            border-color: #00A551 !important;
        }
        
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active {
            background-color: #008F46 !important;
            border-color: #008F46 !important;
            box-shadow: 0 0 0 0.25rem rgba(0, 165, 81, 0.25) !important;
        }
        
        .btn-outline-primary {
            color: #00A551 !important;
            border-color: #00A551 !important;
        }
        
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active {
            background-color: #00A551 !important;
            border-color: #00A551 !important;
            color: white !important;
            box-shadow: 0 0 0 0.25rem rgba(0, 165, 81, 0.25) !important;
        }
        
        .btn-outline-light:hover,
        .btn-outline-light:focus,
        .btn-outline-light:active,
        .btn-outline-light.active {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border-color: white !important;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25) !important;
        }
        
        .btn-success {
            background-color: #00A551 !important;
            border-color: #00A551 !important;
        }
        
        .btn-success:hover,
        .btn-success:focus,
        .btn-success:active,
        .btn-success.active {
            background-color: #008F46 !important;
            border-color: #008F46 !important;
            box-shadow: 0 0 0 0.25rem rgba(0, 165, 81, 0.25) !important;
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
                        <a class="nav-link active" href="how-it-works">How it Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="survey">Survey</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#waitlist">Waitlist</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary px-4" href="partner">Partner with us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="how-it-works-hero">
        <div class="container">
            <div class="text-center">
                <h1 class="display-4 mb-3">How ACHABA Is Proposed to Work</h1>
                <p class="lead mb-0" style="font-size: 1.2rem; opacity: 0.95;">
                    A clear, human system for motorcycle movement in cities like Bauchi
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <!-- Introduction -->
                    <div class="mb-5 pb-4">
                        <div class="p-4 bg-white rounded-3 shadow-sm" style="border-left: 4px solid #00A551;">
                            <p class="mb-3" style="line-height: 1.8; color: #495057;">
                                Achaba is proposed as a simple, dependable way for people to move from where they live to where they need to be, especially in places where road access does not reach homes directly.
                            </p>
                            <p class="mb-0" style="line-height: 1.8; color: #495057;">
                                This section explains, step by step, <strong>how Achaba is intended to be experienced by users</strong>, and <strong>how the system is proposed to respond</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- Section 01 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="step-indicator">Step 1 of 12</div>
                        <h4>ENTRY: HOW PEOPLE ENCOUNTER ACHABA</h4>
                        <p class="subtitle">Achaba is designed for people who need to move, not people looking to explore an app.</p>
                        
                        <p class="fw-semibold mb-2">People encounter Achaba through:</p>
                        <ul class="process-list mb-4">
                            <li>Community awareness</li>
                            <li>Word of mouth</li>
                            <li>A simple public landing page</li>
                            <li>Field engagement and research activities</li>
                        </ul>
                        
                        <p class="fw-semibold mb-2">From there, people interact with Achaba through:</p>
                        <ul class="process-list">
                            <li>A mobile application</li>
                            <li>Assisted onboarding where necessary</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The focus is access, not discovery.</p>
                        </div>
                    </div>

                    <!-- Section 02 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div class="step-indicator">Step 2 of 12</div>
                        <h4>ONBOARDING: FIRST INTERACTION</h4>
                        <p class="subtitle">Users (people) arrive at Achaba for the first time. Very easy. Very welcoming. Very fast. It is designed for rapid access, not exploration.</p>
                        
                        <p class="fw-semibold mb-2">The user is guided by:</p>
                        <ul class="process-list mb-4">
                            <li>Quick login (phone number)</li>
                            <li>Quick terms review</li>
                            <li>Instant access to ride booking (one tap away using Achaba)</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The purpose would understand entry steps and start thinking: Price compared, bike pulls ahead.</p>
                        </div>
                    </div>

                    <!-- Section 03 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <div class="step-indicator">Step 3 of 12</div>
                        <h4>USER DASHBOARD: PRIMARY CONTROL POINT</h4>
                        <p class="subtitle">Users land on a homescreen that serves as their primary control point.</p>
                        
                        <ul class="process-list">
                            <li>Request a ride</li>
                            <li>Support/help</li>
                            <li>Manage saved places (origin)</li>
                            <li>Profile settings</li>
                            <li>Recent rides</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The interface smells calm, simple, not cluttered, with Achaba feel.</p>
                        </div>
                    </div>

                    <!-- Section 04 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-route"></i>
                        </div>
                        <div class="step-indicator">Step 4 of 12</div>
                        <h4>REQUESTING A RIDE: USER FLOW</h4>
                        
                        <p class="fw-semibold mb-2">1. Pickup point (auto-detect)</p>
                        <ul class="process-list mb-3">
                            <li>GPS sets current location</li>
                            <li>Search location</li>
                            <li>Distance and expected fare</li>
                        </ul>
                        
                        <p class="fw-semibold mb-2">2. Destination (picked)</p>
                        <ul class="process-list mb-3">
                            <li>Search location</li>
                            <li>Trip pricing</li>
                            <li>Rider matched (location)</li>
                        </ul>
                        
                        <p class="fw-semibold mb-2">3. Confirmation (trip set of pitch)</p>
                        <ul class="process-list">
                            <li>Confirm booking</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The user submits the request without registration or uncertainty.</p>
                        </div>
                    </div>

                    <!-- Section 05 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="step-indicator">Step 5 of 12</div>
                        <h4>SYSTEM RESPONSE: MATCHING PROCESS</h4>
                        <p class="subtitle">ACHABA processes the request.</p>
                        
                        <p class="fw-semibold mb-2">The matching process:</p>
                        <ul class="process-list">
                            <li>Identifies available riders within the relevant area (within X km)</li>
                            <li>Prioritizes nearest riders</li>
                            <li>Notifies available riders (push alert with ride request)</li>
                            <li>Rider accepts (first come basis when fair proximity)</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>This process is designed to balance proximity, familiarity, and availability.</p>
                        </div>
                    </div>

                    <!-- Section 06 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="step-indicator">Step 6 of 12</div>
                        <h4>MATCH CONFIRMATION: USER FEEDBACK</h4>
                        <p class="subtitle">Once a rider accepts.</p>
                        
                        <ul class="process-list">
                            <li>Rider name</li>
                            <li>Rider photo (where available)</li>
                            <li>The rider approach is confirmed!</li>
                            <li>Rider's rating (e.g., 4.7 out of 5)</li>
                            <li>Estimated time of arrival</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The user feels informed, safe, confirmed—communication.</p>
                        </div>
                    </div>

                    <!-- Section 07 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="step-indicator">Step 7 of 12</div>
                        <h4>PICKUP PHASE: DOORSTEP ORIENTED</h4>
                        
                        <p class="fw-semibold mb-2">The system supports:</p>
                        <ul class="process-list">
                            <li>Live rider location tracking (distance, ETA updates)</li>
                            <li>Direct communication between user and rider (call or message)</li>
                            <li>Pickup confirmation prompt when rider arrives</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The rider comes to the user's location (after they sent the journey to the area).</p>
                        </div>
                    </div>

                    <!-- Section 08 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <div class="step-indicator">Step 8 of 12</div>
                        <h4>THE RIDE EXPERIENCE</h4>
                        <p class="subtitle">During the ride.</p>
                        
                        <ul class="process-list">
                            <li>Live location tracking</li>
                            <li>Expected arrival updates</li>
                            <li>In-ride support (call, report issue)</li>
                            <li>Route transparency (users see path to destination)</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The goal is a predictable, stress-free ride.</p>
                        </div>
                    </div>

                    <!-- Section 09 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-flag-checkered"></i>
                        </div>
                        <div class="step-indicator">Step 9 of 12</div>
                        <h4>COMPLETION AND CLOSURE</h4>
                        <p class="subtitle">At trip end.</p>
                        
                        <ul class="process-list">
                            <li>The rider confirms arrival</li>
                            <li>Payment is processed in the system</li>
                            <li>User rates the trip (1-5 stars)</li>
                            <li>Optional feedback (5 max comments)</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>The transaction ends clearly and without confusion.</p>
                        </div>
                    </div>

                    <!-- Section 10 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="step-indicator">Step 10 of 12</div>
                        <h4>TRUST AND ACCOUNTABILITY STRUCTURE</h4>
                        
                        <p class="fw-semibold mb-2">For riders:</p>
                        <ul class="process-list mb-4">
                            <li>ID verification (required)</li>
                            <li>Guarantor system (community based)</li>
                            <li>Rating visibility (users see history)</li>
                            <li>Breach protocol (suspension for misconduct)</li>
                        </ul>
                        
                        <p class="fw-semibold mb-2">For users:</p>
                        <ul class="process-list">
                            <li>Account creation (with verification)</li>
                            <li>Ride history</li>
                            <li>Mutual ratings (riders rate users too)</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>Trust is maintained through clarity and consequence.</p>
                        </div>
                    </div>

                    <!-- Section 11 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="step-indicator">Step 11 of 12</div>
                        <h4>CONTINUOUS LEARNING AND FEEDBACK</h4>
                        
                        <p class="fw-semibold mb-2">Achaba system learns by:</p>
                        <ul class="process-list">
                            <li>Rating and reviews</li>
                            <li>Pickup and completion rates</li>
                            <li>User complaints</li>
                            <li>Rider group check-ins</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>Learning from the road this way keeps the system rooted in what actually works.</p>
                        </div>
                    </div>

                    <!-- Section 12 -->
                    <div class="process-section">
                        <div class="process-icon-box">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="step-indicator">Step 12 of 12</div>
                        <h4>FUTURE EXTENSIONS SEPARATE FROM CORE</h4>
                        <p class="subtitle">Only after core is solid.</p>
                        
                        <ul class="process-list">
                            <li>Errands (pickups)</li>
                            <li>Scheduled rides</li>
                            <li>Vendor partnerships</li>
                            <li>Multi-point trips</li>
                        </ul>
                        
                        <div class="highlight-box">
                            <p>These extensions are earned not additions, and depend on platform trust and operational strength.</p>
                        </div>
                    </div>

                    <!-- Closing Section -->
                    <div class="closing-section">
                        <h3>Closing Summary</h3>
                        <p>
                            ACHABA is not built on assumptions or external blueprints. It's shaped by <strong>real feedback from Bauchi riders, real survey responses from users, and respect for the streets where movement already happens.</strong>
                        </p>
                        <p>
                            This is how ACHABA is <em>proposed</em> to work. It's not a promise of perfection, it's a framework designed to evolve with trust, feedback, and operational learning. If it works, it will be because it listens.
                        </p>
                        <a href="./#waitlist" class="btn btn-light btn-lg px-5 me-3 mb-3">Join the Waitlist</a>
                        <!-- <button type="button" class="btn btn-outline-light btn-lg px-5 mb-3" data-bs-toggle="modal" data-bs-target="#prdRequestModal">Request for PRD</button> -->
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- PRD Request Modal -->
    <div class="modal fade" id="prdRequestModal" tabindex="-1" aria-labelledby="prdRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="prdRequestModalLabel">Request Product Requirements Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-muted mb-4">Enter your email address and we'll send you the full Product Requirements Document (PRD) for Achaba.</p>
                    <form id="prdRequestForm">
                        <div class="mb-3">
                            <label for="prdEmail" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-lg" id="prdEmail" name="email" placeholder="yourname@example.com" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100" id="prdSubmitBtn">
                            <i class="fas fa-paper-plane me-2"></i>Request PRD
                        </button>
                    </form>
                    <div id="prdResponseMessage" class="mt-3 alert" role="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-primary" style="display: none; position: fixed; bottom: 30px; right: 30px; z-index: 1000; width: 50px; height: 50px; border-radius: 50%; box-shadow: 0 4px 12px rgba(0, 165, 81, 0.3);">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Back to Top Script -->
    <script>
        // Back to Top Button
        const backToTopBtn = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });
        
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // PRD Request Form Handler
        document.getElementById('prdRequestForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('prdEmail').value;
            const submitBtn = document.getElementById('prdSubmitBtn');
            const responseMessage = document.getElementById('prdResponseMessage');
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';
            responseMessage.style.display = 'none';
            
            // Create FormData object
            const formData = new FormData();
            formData.append('email', email);
            
            try {
                const response = await fetch('submit_prd_request.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                // Show response message
                responseMessage.style.display = 'block';
                responseMessage.textContent = data.message;
                
                if (data.success) {
                    responseMessage.className = 'mt-3 alert alert-success';
                    document.getElementById('prdRequestForm').reset();
                    
                    // Close modal after 10 seconds
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('prdRequestModal'));
                        modal.hide();
                        responseMessage.style.display = 'none';
                    }, 10000);
                } else {
                    responseMessage.className = 'mt-3 alert alert-danger';
                }
                
            } catch (error) {
                console.error('Error:', error);
                responseMessage.style.display = 'block';
                responseMessage.className = 'mt-3 alert alert-danger';
                responseMessage.textContent = 'Connection error. Please check your internet and try again.';
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Request PRD';
            }
        });
    </script>
</body>
</html>
