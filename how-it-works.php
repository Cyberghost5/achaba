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
            background: #f8f9fa;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 30px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .process-section:hover {
            box-shadow: 0 10px 30px rgba(0, 165, 81, 0.1);
            transform: translateY(-2px);
        }
        
        .process-number {
            position: absolute;
            top: -15px;
            left: 30px;
            background: #00A551;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 165, 81, 0.3);
        }
        
        .process-section h4 {
            margin-top: 20px;
            color: #212529;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .process-section p {
            color: #6c757d;
            line-height: 1.7;
            margin-bottom: 20px;
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
            content: "→";
            position: absolute;
            left: 0;
            color: #00A551;
            font-weight: 700;
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
            background: #e8f5e9;
            border-left: 4px solid #00A551;
            padding: 15px 20px;
            margin-top: 20px;
            border-radius: 4px;
        }
        
        .highlight-box p {
            margin: 0;
            color: #2e7d32;
            font-weight: 500;
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
                <h1 class="display-4 fw-bold mb-3">How ACHABA Is Proposed to Work</h1>
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
                        <p class="lead text-muted" style="line-height: 1.8;">
                            ACHABA is proposed as a simple, trustworthy way for people to <strong>book verified motorcycle riders from their doorsteps</strong> in cities like Bauchi, where inner streets are hard to navigate and riders already move people daily but without structure. The system connects what already exists into an organized flow where both users and riders benefit.
                        </p>
                        <p class="text-muted" style="line-height: 1.8;">
                            This section outlines <em>how ACHABA is intended to be experienced by users, from discovery to completion.</em> It is not final — it evolves with <strong>rider feedback, user surveys, and operational learning.</strong>
                        </p>
                    </div>

                    <!-- Section 01 -->
                    <div class="process-section">
                        <div class="process-number">01</div>
                        <h4>ENTRY: HOW PEOPLE ENCOUNTER ACHABA</h4>
                        <p>ACHABA is proposed to be discovered not through billboards but through daily life and trusted community connections:</p>
                        <ul class="process-list">
                            <li>Word of mouth</li>
                            <li>A neighbor who used it and arrived early</li>
                            <li>A vendor whose delivery went smoothly</li>
                            <li>Local listings (Google search, social channels)</li>
                            <li>Rider groups and community leaders</li>
                        </ul>
                        <div class="highlight-box">
                            <p>The brand is not flashy—just dependable.</p>
                        </div>
                    </div>

                    <!-- Section 02 -->
                    <div class="process-section">
                        <div class="process-number">02</div>
                        <h4>ONBOARDING: FIRST INTERACTION</h4>
                        <p>Users open the app and complete a simple registration:</p>
                        <ul class="process-list">
                            <li>No wait time. No lengthy forms.</li>
                            <li>Just the essentials.</li>
                            <li>Name and phone number</li>
                            <li>Optional: Email for ride receipts</li>
                            <li>Simple FAQ about how the system works (What is ACHABA? How do I book?)</li>
                        </ul>
                        <div class="highlight-box">
                            <p>The experience is welcoming, simple, and reassuring.</p>
                        </div>
                    </div>

                    <!-- Section 03 -->
                    <div class="process-section">
                        <div class="process-number">03</div>
                        <h4>USER DASHBOARD: PRIMARY CONTROL POINT</h4>
                        <p>Users land on a straightforward dashboard that feels intuitive:</p>
                        <ul class="process-list">
                            <li>Green "Book a Ride" button—large, clear</li>
                            <li>Recent rides (if any)</li>
                            <li>Support button</li>
                            <li>Payment cards</li>
                        </ul>
                        <div class="highlight-box">
                            <p>No overwhelming features. Just what users need. When they're ready to move, it takes one tap.</p>
                        </div>
                    </div>

                    <!-- Section 04 -->
                    <div class="process-section">
                        <div class="process-number">04</div>
                        <h4>REQUESTING A RIDE: USER FLOW</h4>
                        <p>The user taps "Book a Ride" and follows a simple, structured process:</p>
                        <ul class="process-list">
                            <li><strong>1. Pickup point (auto-detect)</strong>
                                <ul class="sub-list">
                                    <li>GPS sets current location (users can adjust if off by a few meters)</li>
                                    <li>Add location note if necessary (e.g., "Near blue gate")</li>
                                </ul>
                            </li>
                            <li><strong>2. Destination (typed or tapped)</strong>
                                <ul class="sub-list">
                                    <li>Search by name or pin on map</li>
                                    <li>Saved locations show (e.g., Home, Office)</li>
                                </ul>
                            </li>
                            <li><strong>3. Estimated price shows</strong>
                                <ul class="sub-list">
                                    <li>Clear, transparent fare</li>
                                    <li>No surge pricing surprises (or clearly explained if dynamic)</li>
                                </ul>
                            </li>
                            <li><strong>4. Confirm ride request</strong>
                                <ul class="sub-list">
                                    <li>User taps "Request Ride"</li>
                                    <li>A confirmation note (e.g., "Finding a rider near you...")</li>
                                </ul>
                            </li>
                        </ul>
                        <div class="highlight-box">
                            <p>The user submits the request with peace of mind—no haggling or uncertainty.</p>
                        </div>
                    </div>

                    <!-- Section 05 -->
                    <div class="process-section">
                        <div class="process-number">05</div>
                        <h4>SYSTEM RESPONSE: MATCHING PROCESS</h4>
                        <p>ACHABA processes the request and finds a suitable rider:</p>
                        <ul class="process-list">
                            <li>The matching algorithm
                                <ul class="sub-list">
                                    <li>Nearest riders in the area (within X km)</li>
                                    <li>Availability status (online, idle, busy)</li>
                                    <li>Rider rating (users prioritize well-rated riders when equal distance)</li>
                                </ul>
                            </li>
                            <li>Notify available riders (push alert with ride request)</li>
                        </ul>
                        <div class="highlight-box">
                            <p>The first rider to accept is assigned to the user (unless proximity and rating pull another rider forward).</p>
                        </div>
                    </div>

                    <!-- Section 06 -->
                    <div class="process-section">
                        <div class="process-number">06</div>
                        <h4>MATCH CONFIRMATION: USER FEEDBACK</h4>
                        <p>Once a rider accepts, the user sees:</p>
                        <ul class="process-list">
                            <li>Rider name</li>
                            <li>Rider photo (not required but encouraged)</li>
                            <li>The rider approach is confirmed!</li>
                            <li>Rider's rating (e.g., 4.7 stars)</li>
                            <li>Estimated time of arrival (e.g., "Abdullahi is 3 minutes away")</li>
                        </ul>
                        <div class="highlight-box">
                            <p>The user feels informed, safe, and in control—communication is clear.</p>
                        </div>
                    </div>

                    <!-- Section 07 -->
                    <div class="process-section">
                        <div class="process-number">07</div>
                        <h4>PICKUP PHASE: DOORSTEP-ORIENTED</h4>
                        <p>This is where ACHABA stands apart:</p>
                        <ul class="process-list">
                            <li>The rider navigates
                                <ul class="sub-list">
                                    <li>Using in-app navigation or their local knowledge</li>
                                    <li>If riders need help, users receive a polite prompt or can send a note</li>
                                </ul>
                            </li>
                            <li>Doorstep pickup (not roadside)</li>
                            <li>Users do not have to trek to the main road</li>
                        </ul>
                        <div class="highlight-box">
                            <p>The rider finds the user's location (not the other way around), and the ride begins.</p>
                        </div>
                    </div>

                    <!-- Section 08 -->
                    <div class="process-section">
                        <div class="process-number">08</div>
                        <h4>THE RIDE EXPERIENCE</h4>
                        <p>During the ride, the system is minimally intrusive:</p>
                        <ul class="process-list">
                            <li>Live tracking (user's friends/family can track)</li>
                            <li>Safe ride experience
                                <ul class="sub-list">
                                    <li>Users trust the rider because they were verified</li>
                                    <li>Riders respect users because they know they're being tracked</li>
                                </ul>
                            </li>
                            <li>In-ride support (users can call support for emergencies, but it rarely happens)</li>
                        </ul>
                        <div class="highlight-box">
                            <p>Riders navigate the city with local knowledge. The experience is smooth.</p>
                        </div>
                    </div>

                    <!-- Section 09 -->
                    <div class="process-section">
                        <div class="process-number">09</div>
                        <h4>COMPLETION AND CLOSURE</h4>
                        <p>When the ride ends, users are guided through simple steps:</p>
                        <ul class="process-list">
                            <li>Arrival notification (You've arrived!)</li>
                            <li>Payment is automatically deducted</li>
                            <li>Optional tip (users can reward good service)</li>
                            <li>Rate the ride (1-5 stars, quick and painless)</li>
                        </ul>
                        <div class="highlight-box">
                            <p>Post-ride clarity keeps trust intact and makes it effortless.</p>
                        </div>
                    </div>

                    <!-- Section 10 -->
                    <div class="process-section">
                        <div class="process-number">10</div>
                        <h4>TRUST AND ACCOUNTABILITY STRUCTURE</h4>
                        <p>ACHABA is designed to maintain trust at every step. Both riders and users are accountable:</p>
                        <ul class="process-list">
                            <li>For riders:
                                <ul class="sub-list">
                                    <li>ID verification (National ID or Driver's License)</li>
                                    <li>Community referrals (preferably local associations)</li>
                                    <li>Behavior tracking (cancellations, complaints, low ratings reviewed)</li>
                                    <li>Performance accountability</li>
                                </ul>
                            </li>
                            <li>For users:
                                <ul class="sub-list">
                                    <li>Account creation with phone verification</li>
                                    <li>Ride history (misbehavior documented)</li>
                                    <li>Mutual respect (riders can rate users too)</li>
                                </ul>
                            </li>
                        </ul>
                        <div class="highlight-box">
                            <p>This balance is what creates trust on both sides of the platform.</p>
                        </div>
                    </div>

                    <!-- Section 11 -->
                    <div class="process-section">
                        <div class="process-number">11</div>
                        <h4>CONTINUOUS LEARNING AND FEEDBACK</h4>
                        <p>ACHABA is not static. It learns and improves by:</p>
                        <ul class="process-list">
                            <li>Rider group check-ins</li>
                            <li>Vendor feedback</li>
                            <li>In-app behavior analysis</li>
                            <li>Community polls and surveys</li>
                        </ul>
                        <div class="highlight-box">
                            <p>Learning from the road this way keeps the system rooted in what actually works.</p>
                        </div>
                    </div>

                    <!-- Section 12 -->
                    <div class="process-section">
                        <div class="process-number">12</div>
                        <h4>FUTURE EXTENSIONS SEPARATE FROM CORE</h4>
                        <p>Only after the ride experience is solid, ACHABA may offer:</p>
                        <ul class="process-list">
                            <li>Errands (pickups)
                                <ul class="sub-list">
                                    <li>Users can send riders to collect pre-ordered items</li>
                                    <li>Rider collects, user receives, transparent fees</li>
                                </ul>
                            </li>
                            <li>Vendor partnerships
                                <ul class="sub-list">
                                    <li>Trusted local vendors can integrate with ACHABA</li>
                                    <li>Orders placed, riders notified, pickup handled smoothly</li>
                                </ul>
                            </li>
                            <li>Scheduled rides</li>
                        </ul>
                        <div class="highlight-box">
                            <p>These extensions are earned, not automatic, and depend on platform trust, and operational strength.</p>
                        </div>
                    </div>

                    <!-- Closing Section -->
                    <div class="closing-section">
                        <h3>Closing Summary</h3>
                        <p>
                            ACHABA is not built on assumptions or external blueprints. It's shaped by <strong>real feedback from Bauchi riders, real survey responses from users, and respect for the streets where movement already happens.</strong>
                        </p>
                        <p>
                            This is how ACHABA is <em>proposed</em> to work. It's not a promise of perfection — it's a framework designed to evolve with trust, feedback, and operational learning. If it works, it will be because it listens.
                        </p>
                        <a href="./#waitlist" class="btn btn-light btn-lg px-5">Join the Waitlist</a>
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
</body>
</html>
