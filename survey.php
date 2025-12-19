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
                    <!-- Language Selector -->
                    <div class="text-center mb-3">
                        <div class="btn-group" role="group" aria-label="Language Selector">
                            <input type="radio" class="btn-check" name="language" id="langEnglish" value="english" checked>
                            <label class="btn btn-outline-primary" for="langEnglish">
                                <i class="fas fa-globe me-1"></i>English
                            </label>
                            <input type="radio" class="btn-check" name="language" id="langHausa" value="hausa">
                            <label class="btn btn-outline-primary" for="langHausa">
                                <i class="fas fa-globe me-1"></i>Hausa
                            </label>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm p-4">
                        <form id="surveyForm">
                            <input type="hidden" name="surveyLanguage" id="surveyLanguage" value="english">
                            
                            <!-- Step 1: Survey Type Selection -->
                            <div class="survey-step active" id="step1">
                                <div class="text-center mb-4">
                                    <div class="step-indicator mb-3">
                                        <span class="badge bg-primary px-3 py-2">
                                            <span class="lang-en">Step 1 of 3</span>
                                            <span class="lang-ha" style="display:none;">Mataki 1 na 3</span>
                                        </span>
                                    </div>
                                    <h3 class="fw-bold mb-3">
                                        <span class="lang-en">I want to take this survey as:</span>
                                        <span class="lang-ha" style="display:none;">Ina son amsa wannan tambayoyin a matsayin:</span>
                                    </h3>
                                    <p class="text-muted">
                                        <span class="lang-en">Select the option that best describes you</span>
                                        <span class="lang-ha" style="display:none;">Zaɓi zaɓin da ya dace da ku</span>
                                    </p>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="surveyType" id="typeUser" value="user">
                                        <label class="btn btn-outline-primary w-100 py-4" for="typeUser">
                                            <i class="fas fa-user fa-2x d-block mb-3"></i>
                                            <h5 class="mb-2">
                                                <span class="lang-en">User</span>
                                                <span class="lang-ha" style="display:none;">Mai Amfani</span>
                                            </h5>
                                            <small>
                                                <span class="lang-en">I need transportation or delivery services</span>
                                                <span class="lang-ha" style="display:none;">Ina bukatar hanyar sufuri ko isar da kaya</span>
                                            </small>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="surveyType" id="typeRider" value="rider">
                                        <label class="btn btn-outline-primary w-100 py-4" for="typeRider">
                                            <i class="fas fa-motorcycle fa-2x d-block mb-3"></i>
                                            <h5 class="mb-2">
                                                <span class="lang-en">Rider</span>
                                                <span class="lang-ha" style="display:none;">Dan Achaba</span>
                                            </h5>
                                            <small>
                                                <span class="lang-en">I am a motorcycle rider or want to become one</span>
                                                <span class="lang-ha" style="display:none;">Ni dan achaba ne ko ina son zama dan achaba</span>
                                            </small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Personal Information -->
                            <div class="survey-step" id="step2">
                                <div class="text-center mb-4">
                                    <div class="step-indicator mb-3">
                                        <span class="badge bg-primary px-3 py-2">
                                            <span class="lang-en">Step 2 of 3</span>
                                            <span class="lang-ha" style="display:none;">Mataki 2 na 3</span>
                                        </span>
                                    </div>
                                    <h3 class="fw-bold mb-3">
                                        <span class="lang-en">Your Information</span>
                                        <span class="lang-ha" style="display:none;">Bayanin Ka</span>
                                    </h3>
                                    <p class="text-muted">
                                        <span class="lang-en">Please provide your contact details</span>
                                        <span class="lang-ha" style="display:none;">Don Allah bayar da bayanin sadarwa</span>
                                    </p>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="fullName" class="form-label fw-semibold">
                                        <span class="lang-en">Full Name</span>
                                        <span class="lang-ha" style="display:none;">Cikakken Suna</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="fullName" name="fullName">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">
                                        <span class="lang-en">Email Address</span>
                                        <span class="lang-ha" style="display:none;">Adireshin Email</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="yourname@example.com">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="phone" class="form-label fw-semibold">
                                        <span class="lang-en">Phone Number</span>
                                        <span class="lang-ha" style="display:none;">Lambar Waya</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="080XXXXXXXX">
                                </div>
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="prevStep(1)">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        <span class="lang-en">Back</span>
                                        <span class="lang-ha" style="display:none;">Komawa</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-lg px-5" onclick="nextStep(3)">
                                        <span class="lang-en">Continue</span>
                                        <span class="lang-ha" style="display:none;">Ci gaba</span>
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Survey Questions (Placeholder) -->
                            <div class="survey-step" id="step3">
                                <div class="text-center mb-4">
                                    <div class="step-indicator mb-3">
                                        <span class="badge bg-primary px-3 py-2">
                                            <span class="lang-en">Step 3 of 3</span>
                                            <span class="lang-ha" style="display:none;">Mataki 3 na 3</span>
                                        </span>
                                    </div>
                                    <h3 class="fw-bold mb-3">
                                        <span class="lang-en">Survey Questions</span>
                                        <span class="lang-ha" style="display:none;">Tambayoyin Bincike</span>
                                    </h3>
                                    <p class="text-muted">
                                        <span class="lang-en">Please answer the following questions</span>
                                        <span class="lang-ha" style="display:none;">Don Allah amsa tambayoyin da ke nan</span>
                                    </p>
                                </div>
                                
                                <!-- Survey questions will be added here -->
                                <div id="surveyQuestions">
                                    <!-- Rider Questions -->
                                    <div class="rider-questions" style="display: none;">
                                        
                                        <!-- SECTION 1: BACKGROUND (WARM-UP) -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 1: Background</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 1: Bayani</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label for="q1" class="form-label fw-semibold">
                                                    <span class="lang-en">1. How long have you been riding motorcycles for work?</span>
                                                    <span class="lang-ha" style="display:none;">1. Yaushe ka fara yin aikin babur?</span>
                                                </label>
                                                <textarea class="form-control" id="q1" name="q1" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q2" class="form-label fw-semibold">
                                                    <span class="lang-en">2. Is this your main source of income? What else do you do?</span>
                                                    <span class="lang-ha" style="display:none;">2. Wannan shine babban hanyar samun kuɗin ka? Wane irin aiki kake yi kuma?</span>
                                                </label>
                                                <textarea class="form-control" id="q2" name="q2" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q3" class="form-label fw-semibold">
                                                    <span class="lang-en">3. Which areas in Bauchi do you mostly operate in?</span>
                                                    <span class="lang-ha" style="display:none;">3. A wane yanki ne ka fi yin aiki a Bauchi?</span>
                                                </label>
                                                <textarea class="form-control" id="q3" name="q3" rows="2"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 2: DAILY WORK REALITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 2: Daily Work Reality</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 2: Yanayin Aiki na Yau da Kullun</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label for="q4" class="form-label fw-semibold">
                                                    <span class="lang-en">4. Walk me through a typical workday, from when you start to when you stop.</span>
                                                    <span class="lang-ha" style="display:none;">4. Bayyana yadda kake yi aikin ka na yau da kullun, daga farko har ƙarshe.</span>
                                                </label>
                                                <textarea class="form-control" id="q4" name="q4" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q5" class="form-label fw-semibold">
                                                    <span class="lang-en">5. What time of day is usually best for you? Why?</span>
                                                    <span class="lang-ha" style="display:none;">5. Wane lokaci na rana yake fi dacewa da kai? Don me?</span>
                                                </label>
                                                <textarea class="form-control" id="q5" name="q5" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q6" class="form-label fw-semibold">
                                                    <span class="lang-en">6. What usually makes a day go badly?</span>
                                                    <span class="lang-ha" style="display:none;">6. Menene yake sa ranar ta yi mugu?</span>
                                                </label>
                                                <textarea class="form-control" id="q6" name="q6" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q7" class="form-label fw-semibold">
                                                    <span class="lang-en">7. On a good day, what makes you feel satisfied with your work?</span>
                                                    <span class="lang-ha" style="display:none;">7. A ranar da ta yi kyau, me yake sa ka ji ɗaƙin aiki?</span>
                                                </label>
                                                <textarea class="form-control" id="q7" name="q7" rows="2"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 3: MONEY & STABILITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 3: Money & Stability</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 3: Kudi da Kwanciyar Hankali</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">8. What are your biggest daily or weekly expenses?</span>
                                                    <span class="lang-ha" style="display:none;">8. Menene manyan kuɗin da kake kashewa kullum ko mako-mako?</span>
                                                </label>
                                                <p class="text-muted small">
                                                    <span class="lang-en">(Select all that apply, then estimate total cost)</span>
                                                    <span class="lang-ha" style="display:none;">(Zaɓi duk abin da ya shafe ka, sannan ka ƙiɗɗara jimlar kuɗin)</span>
                                                </p>
                                                
                                                <div class="mb-3">
                                                    <p class="fw-semibold mb-2">
                                                        <span class="lang-en">Expense Types (Select all that apply)</span>
                                                        <span class="lang-ha" style="display:none;">Nau'o'in Kuɗi (Zaɓi duk abin da ya shafe ka)</span>
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Fuel" id="q8_fuel">
                                                        <label class="form-check-label" for="q8_fuel">
                                                            <span class="lang-en">Fuel</span>
                                                            <span class="lang-ha" style="display:none;">Man fetur</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Union dues / levies" id="q8_union">
                                                        <label class="form-check-label" for="q8_union">
                                                            <span class="lang-en">Union dues / levies</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗin ƙungiya / haraji</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Police or road-related payments" id="q8_police">
                                                        <label class="form-check-label" for="q8_police">
                                                            <span class="lang-en">Police or road-related payments</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗin 'yan sanda ko hanya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Bike maintenance / repairs" id="q8_maintenance">
                                                        <label class="form-check-label" for="q8_maintenance">
                                                            <span class="lang-en">Bike maintenance / repairs</span>
                                                            <span class="lang-ha" style="display:none;">Gyaran babur</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Phone & data" id="q8_phone">
                                                        <label class="form-check-label" for="q8_phone">
                                                            <span class="lang-en">Phone & data</span>
                                                            <span class="lang-ha" style="display:none;">Waya da data</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Food / personal expenses" id="q8_food">
                                                        <label class="form-check-label" for="q8_food">
                                                            <span class="lang-en">Food / personal expenses</span>
                                                            <span class="lang-ha" style="display:none;">Abinci / kuɗin kansu</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="q8_expenses[]" value="Other" id="q8_other">
                                                        <label class="form-check-label" for="q8_other">
                                                            <span class="lang-en">Other (please specify)</span>
                                                            <span class="lang-ha" style="display:none;">Wani abu (bayyana)</span>
                                                        </label>
                                                    </div>
                                                    <input type="text" class="form-control mt-2" name="q8_other_specify" id="q8_other_specify">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="fw-semibold mb-2">
                                                        <span class="lang-en">Estimated Total Cost (₦ range)</span>
                                                        <span class="lang-ha" style="display:none;">Jimlar Kuɗin (₦)</span>
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q8_cost" value="Less than ₦1,000 per day" id="q8_cost1">
                                                        <label class="form-check-label" for="q8_cost1">
                                                            <span class="lang-en">Less than ₦1,000 per day</span>
                                                            <span class="lang-ha" style="display:none;">Ƙasa da Naira dubu daya a rana</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q8_cost" value="₦1,000 – ₦3,000 per day" id="q8_cost2">
                                                        <label class="form-check-label" for="q8_cost2">
                                                            <span class="lang-en">₦1,000 – ₦3,000 per day</span>
                                                            <span class="lang-ha" style="display:none;">Naira dubu daya zuwa dubu uku a rana</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q8_cost" value="₦3,001 – ₦5,000 per day" id="q8_cost3">
                                                        <label class="form-check-label" for="q8_cost3">
                                                            <span class="lang-en">₦3,001 – ₦5,000 per day</span>
                                                            <span class="lang-ha" style="display:none;">Naira dubu uku zuwa biyar a rana</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q8_cost" value="Above ₦5,000 per day" id="q8_cost4">
                                                        <label class="form-check-label" for="q8_cost4">
                                                            <span class="lang-en">Above ₦5,000 per day</span>
                                                            <span class="lang-ha" style="display:none;">Fiye da Naira dubu biyar a rana</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">9. Do your earnings change a lot from week to week?</span>
                                                    <span class="lang-ha" style="display:none;">9. Kuɗin da kake samu yana canzawa sosai daga mako zuwa mako?</span>
                                                </label>
                                                <p class="text-muted small">
                                                    <span class="lang-en">(Income stability measure)</span>
                                                    <span class="lang-ha" style="display:none;">(Auna kwanciyar hankali na kuɗi)</span>
                                                </p>
                                                
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9" value="Yes, very much (big changes every week)" id="q9_1">
                                                        <label class="form-check-label" for="q9_1">
                                                            <span class="lang-en">Yes, very much (big changes every week)</span>
                                                            <span class="lang-ha" style="display:none;">E, sosai (canje-canje masu yawa kowane mako)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9" value="Yes, somewhat (some weeks are clearly better than others)" id="q9_2">
                                                        <label class="form-check-label" for="q9_2">
                                                            <span class="lang-en">Yes, somewhat (some weeks are clearly better than others)</span>
                                                            <span class="lang-ha" style="display:none;">E, kaɗan (wasu makonni sun fi wasu</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9" value="A little (mostly stable with small changes)" id="q9_3">
                                                        <label class="form-check-label" for="q9_3">
                                                            <span class="lang-en">A little (mostly stable with small changes)</span>
                                                            <span class="lang-ha" style="display:none;">Kaɗan (galibi yana kwanciyar hankali)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9" value="Not really (almost the same every week)" id="q9_4">
                                                        <label class="form-check-label" for="q9_4">
                                                            <span class="lang-en">Not really (almost the same every week)</span>
                                                            <span class="lang-ha" style="display:none;">A'a (kusan daya kowane mako)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="fw-semibold mb-2">
                                                        <span class="lang-en">Optional Follow-up: When earnings change, about how big is the difference between a good week and a bad week?</span>
                                                        <span class="lang-ha" style="display:none;">Ƙari (zaɓi): Lokacin da kuɗi ya canza, nawa ne bambanci tsakanin mako mai kyau da mako mara kyau?</span>
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9_followup" value="Less than ₦5,000" id="q9_f1">
                                                        <label class="form-check-label" for="q9_f1">
                                                            <span class="lang-en">Less than ₦5,000</span>
                                                            <span class="lang-ha" style="display:none;">Ƙasa da Naira dubu biyar</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9_followup" value="₦5,000 – ₦10,000" id="q9_f2">
                                                        <label class="form-check-label" for="q9_f2">
                                                            <span class="lang-en">₦5,000 – ₦10,000</span>
                                                            <span class="lang-ha" style="display:none;">Naira dubu biyar zuwa goma</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9_followup" value="₦10,001 – ₦20,000" id="q9_f3">
                                                        <label class="form-check-label" for="q9_f3">
                                                            <span class="lang-en">₦10,001 – ₦20,000</span>
                                                            <span class="lang-ha" style="display:none;">Naira dubu goma zuwa ashirin</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q9_followup" value="Above ₦20,000" id="q9_f4">
                                                        <label class="form-check-label" for="q9_f4">
                                                            <span class="lang-en">Above ₦20,000</span>
                                                            <span class="lang-ha" style="display:none;">Fiye da Naira dubu ashirin</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">10. Are you usually able to save anything?</span>
                                                    <span class="lang-ha" style="display:none;">10. Kana iya ajiye kuɗi?</span>
                                                </label>
                                                <p class="text-muted small">
                                                    <span class="lang-en">(Savings capacity, not behaviour judgement)</span>
                                                    <span class="lang-ha" style="display:none;">(Ikon ajiyar kuɗi, ba yin hukunci ba)</span>
                                                </p>
                                                
                                                <div class="mb-3">
                                                    <p class="fw-semibold mb-2">
                                                        <span class="lang-en">Primary Question</span>
                                                        <span class="lang-ha" style="display:none;">Tambaya Ta Farko</span>
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10" value="Yes, regularly" id="q10_1">
                                                        <label class="form-check-label" for="q10_1">
                                                            <span class="lang-en">Yes, regularly</span>
                                                            <span class="lang-ha" style="display:none;">E, kullum</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10" value="Yes, sometimes" id="q10_2">
                                                        <label class="form-check-label" for="q10_2">
                                                            <span class="lang-en">Yes, sometimes</span>
                                                            <span class="lang-ha" style="display:none;">E, wani lokaci</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10" value="Rarely" id="q10_3">
                                                        <label class="form-check-label" for="q10_3">
                                                            <span class="lang-en">Rarely</span>
                                                            <span class="lang-ha" style="display:none;">Da wuya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10" value="Never" id="q10_4">
                                                        <label class="form-check-label" for="q10_4">
                                                            <span class="lang-en">Never</span>
                                                            <span class="lang-ha" style="display:none;">Ba na iya</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="fw-semibold mb-2">
                                                        <span class="lang-en">If yes, how much do you usually save? (₦ range)</span>
                                                        <span class="lang-ha" style="display:none;">Idan e, nawa kake ajiye a mako?</span>
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_amount" value="Less than ₦2,000 per week" id="q10_a1">
                                                        <label class="form-check-label" for="q10_a1">
                                                            <span class="lang-en">Less than ₦2,000 per week</span>
                                                            <span class="lang-ha" style="display:none;">Ƙasa da Naira dubu biyu a mako</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_amount" value="₦2,000 – ₦5,000 per week" id="q10_a2">
                                                        <label class="form-check-label" for="q10_a2">
                                                            <span class="lang-en">₦2,000 – ₦5,000 per week</span>
                                                            <span class="lang-ha" style="display:none;">Naira dubu biyu zuwa biyar a mako</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_amount" value="₦5,001 – ₦10,000 per week" id="q10_a3">
                                                        <label class="form-check-label" for="q10_a3">
                                                            <span class="lang-en">₦5,001 – ₦10,000 per week</span>
                                                            <span class="lang-ha" style="display:none;">Naira dubu biyar zuwa goma a mako</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_amount" value="More than ₦10,000 per week" id="q10_a4">
                                                        <label class="form-check-label" for="q10_a4">
                                                            <span class="lang-en">More than ₦10,000 per week</span>
                                                            <span class="lang-ha" style="display:none;">Fiye da Naira dubu goma a mako</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="fw-semibold mb-2">
                                                        <span class="lang-en">If no, what is the main reason?</span>
                                                        <span class="lang-ha" style="display:none;">Idan a'a, menene babban dalili?</span>
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_reason" value="Earnings are too unpredictable" id="q10_r1">
                                                        <label class="form-check-label" for="q10_r1">
                                                            <span class="lang-en">Earnings are too unpredictable</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗin da nake samu ba shi da tabbas</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_reason" value="Expenses are too high" id="q10_r2">
                                                        <label class="form-check-label" for="q10_r2">
                                                            <span class="lang-en">Expenses are too high</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗin kashewa ya yi yawa</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_reason" value="Emergencies always come up" id="q10_r3">
                                                        <label class="form-check-label" for="q10_r3">
                                                            <span class="lang-en">Emergencies always come up</span>
                                                            <span class="lang-ha" style="display:none;">Matsaloli kullum suna fitowa</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="q10_reason" value="No safe place or system to save" id="q10_r4">
                                                        <label class="form-check-label" for="q10_r4">
                                                            <span class="lang-en">No safe place or system to save</span>
                                                            <span class="lang-ha" style="display:none;">Babu wuri mai aminci ko tsarin ajiya</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 4: SAFETY & DIGNITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 4: Safety & Dignity</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 4: Aminci da Ƙirma</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label for="q11" class="form-label fw-semibold">
                                                    <span class="lang-en">11. Have you ever felt unsafe or uncomfortable while working? What happened?</span>
                                                    <span class="lang-ha" style="display:none;">11. Ka taɓa jin rashin lafiya lokacin aiki? Me ya faru?</span>
                                                </label>
                                                <textarea class="form-control" id="q11" name="q11" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q12" class="form-label fw-semibold">
                                                    <span class="lang-en">12. Which types of passengers or trips are most difficult for you?</span>
                                                    <span class="lang-ha" style="display:none;">12. Wanne irin fasinjoji ko tafiye-tafiye yake da wahala a gare ka?</span>
                                                </label>
                                                <textarea class="form-control" id="q12" name="q12" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q13" class="form-label fw-semibold">
                                                    <span class="lang-en">13. What do you personally do to stay safe?</span>
                                                    <span class="lang-ha" style="display:none;">13. Me kake yi don ka kasance lafiya?</span>
                                                </label>
                                                <textarea class="form-control" id="q13" name="q13" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q14" class="form-label fw-semibold">
                                                    <span class="lang-en">14. Do you feel this work is respected in your community? Why or why not?</span>
                                                    <span class="lang-ha" style="display:none;">14. Kana ganin ana girmama wannan aikin a cikin al'ummar ka? Me ya sa?</span>
                                                </label>
                                                <textarea class="form-control" id="q14" name="q14" rows="3"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 5: TECH & ACCESS -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 5: Tech & Access</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 5: Fasaha da Samun Damar Aiki</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label for="q15" class="form-label fw-semibold">
                                                    <span class="lang-en">15. How do passengers usually find or contact you?</span>
                                                    <span class="lang-ha" style="display:none;">15. Ta yaya fasinjoji suke same ka ko tuntubar ka?</span>
                                                </label>
                                                <textarea class="form-control" id="q15" name="q15" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q16" class="form-label fw-semibold">
                                                    <span class="lang-en">16. How important is your phone to your work?</span>
                                                    <span class="lang-ha" style="display:none;">16. Wayar ka tana da muhimmanci ga aikin ka?</span>
                                                </label>
                                                <textarea class="form-control" id="q16" name="q16" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q17" class="form-label fw-semibold">
                                                    <span class="lang-en">17. Are there things your phone cannot do that limit your work?</span>
                                                    <span class="lang-ha" style="display:none;">17. Akwai abubuwan da wayar ka ba za ta iya ba wadanda ke takura aikin ka?</span>
                                                </label>
                                                <textarea class="form-control" id="q17" name="q17" rows="2"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 6: PLATFORM FIT (VERY IMPORTANT) -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 6: Platform Fit</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 6: Dacewa da Tsari</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label for="q18" class="form-label fw-semibold">
                                                    <span class="lang-en">18. If passengers could book you to come pick them from inside streets, how would you feel about that?</span>
                                                    <span class="lang-ha" style="display:none;">18. Idan fasinjoji za su iya bookɗin ka don ka dauko su daga cikin tituna, yaya za ka ji game da hakan?</span>
                                                </label>
                                                <textarea class="form-control" id="q18" name="q18" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q19" class="form-label fw-semibold">
                                                    <span class="lang-en">19. How would you feel about pickup-only errands where the customer has already paid the vendor?</span>
                                                    <span class="lang-ha" style="display:none;">19. Yaya za ka ji game da ɗaukar kaya kawai inda abokin ciniki ya riga ya biya mai siyarwa?</span>
                                                </label>
                                                <textarea class="form-control" id="q19" name="q19" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q20" class="form-label fw-semibold">
                                                    <span class="lang-en">20. What would make you trust or distrust such a system?</span>
                                                    <span class="lang-ha" style="display:none;">20. Me zai sa ka amince ko ka kin amincewa da irin wannan tsari?</span>
                                                </label>
                                                <textarea class="form-control" id="q20" name="q20" rows="3"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 7: FUTURE & SUPPORT -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 7: Future & Support</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 7: Makomar Aiki da Tallafi</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label for="q21" class="form-label fw-semibold">
                                                    <span class="lang-en">21. Are you part of any rider group or association? How does it help?</span>
                                                    <span class="lang-ha" style="display:none;">21. Kana cikin wata ƙungiyar masu babur? Ta yaya take taimaka?</span>
                                                </label>
                                                <textarea class="form-control" id="q21" name="q21" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q22" class="form-label fw-semibold">
                                                    <span class="lang-en">22. What would make this work more secure or dignified for you?</span>
                                                    <span class="lang-ha" style="display:none;">22. Me zai sa wannan aikin ya fi tsaro da daraja a gare ka?</span>
                                                </label>
                                                <textarea class="form-control" id="q22" name="q22" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q23" class="form-label fw-semibold">
                                                    <span class="lang-en">23. If a company wanted to genuinely support riders in Bauchi, where should they start?</span>
                                                    <span class="lang-ha" style="display:none;">23. Idan kamfani yana son tallafa wa masu babur a Bauchi, ina ya kamata su fara?</span>
                                                </label>
                                                <textarea class="form-control" id="q23" name="q23" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="q24" class="form-label fw-semibold">
                                                    <span class="lang-en">24. Is there anything important about your work we haven't talked about?</span>
                                                    <span class="lang-ha" style="display:none;">24. Akwai wani abu mai muhimmanci game da aikin ka da ba mu tattauna ba?</span>
                                                </label>
                                                <textarea class="form-control" id="q24" name="q24" rows="3"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- Submit/Back Buttons for Rider Survey -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="prevStep(2)">
                                                <i class="fas fa-arrow-left me-2"></i>
                                                <span class="lang-en">Back</span>
                                                <span class="lang-ha" style="display:none;">Komawa</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                                <span class="lang-en">Submit Survey</span>
                                                <span class="lang-ha" style="display:none;">Aika Tambayoyi</span>
                                                <i class="fas fa-check ms-2"></i>
                                            </button>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- User Questions -->
                                    <div class="user-questions" style="display: none;">
                                        <!-- Note: Name, phone, email already collected in Step 2 -->
                                        
                                        <!-- SECTION 1 -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 1: Usage Pattern</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 1: Tsarin Amfani</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">1. How often do you use motorcycle transport?</span>
                                                    <span class="lang-ha" style="display:none;">1. Sau nawa kake amfani da motar achaba?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_daily" value="Daily">
                                                        <label class="form-check-label" for="usage_daily">
                                                            <span class="lang-en">Daily</span>
                                                            <span class="lang-ha" style="display:none;">Kullum</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_few_times" value="A few times a week">
                                                        <label class="form-check-label" for="usage_few_times">
                                                            <span class="lang-en">A few times a week</span>
                                                            <span class="lang-ha" style="display:none;">Sau da yawa a mako</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_occasionally" value="Occasionally">
                                                        <label class="form-check-label" for="usage_occasionally">
                                                            <span class="lang-en">Occasionally</span>
                                                            <span class="lang-ha" style="display:none;">Lokaci-lokaci</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_frequency" id="usage_rarely" value="Rarely">
                                                        <label class="form-check-label" for="usage_rarely">
                                                            <span class="lang-en">Rarely</span>
                                                            <span class="lang-ha" style="display:none;">Da wuya</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">2. What is your primary reason for using motorcycle transport?</span>
                                                    <span class="lang-ha" style="display:none;">2. Menene babban dalili na amfani da motar achaba?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_speed" value="Speed / avoiding traffic">
                                                        <label class="form-check-label" for="reason_speed">
                                                            <span class="lang-en">Speed / avoiding traffic</span>
                                                            <span class="lang-ha" style="display:none;">Sauri / guje wa cunkoso</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_accessibility" value="Accessibility">
                                                        <label class="form-check-label" for="reason_accessibility">
                                                            <span class="lang-en">Accessibility</span>
                                                            <span class="lang-ha" style="display:none;">Sauƙin samunsa</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_cost" value="Cost">
                                                        <label class="form-check-label" for="reason_cost">
                                                            <span class="lang-en">Cost</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_convenience" value="Convenience">
                                                        <label class="form-check-label" for="reason_convenience">
                                                            <span class="lang-en">Convenience</span>
                                                            <span class="lang-ha" style="display:none;">Sauƙi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_alternatives" value="Lack of alternatives">
                                                        <label class="form-check-label" for="reason_alternatives">Lack of alternatives</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_lack" value="Lack of alternatives">
                                                        <label class="form-check-label" for="reason_lack">
                                                            <span class="lang-en">Lack of alternatives</span>
                                                            <span class="lang-ha" style="display:none;">Rashin wasu hanyoyi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="primary_reason" id="reason_other" value="Other">
                                                        <label class="form-check-label" for="reason_other">
                                                            <span class="lang-en">Other</span>
                                                            <span class="lang-ha" style="display:none;">Wani dalili</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 2: USAGE BEHAVIOUR -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 2: Usage Behaviour</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 2: Yanayin Amfani</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">3. When do you most often use motorcycle transport?</span>
                                                    <span class="lang-ha" style="display:none;">3. Yaushe kake amfani da motar achaba?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_morning" value="Morning">
                                                        <label class="form-check-label" for="time_morning">
                                                            <span class="lang-en">Morning</span>
                                                            <span class="lang-ha" style="display:none;">Safiya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_afternoon" value="Afternoon">
                                                        <label class="form-check-label" for="time_afternoon">
                                                            <span class="lang-en">Afternoon</span>
                                                            <span class="lang-ha" style="display:none;">Rana</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_evening" value="Evening">
                                                        <label class="form-check-label" for="time_evening">
                                                            <span class="lang-en">Evening</span>
                                                            <span class="lang-ha" style="display:none;">Maraice</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usage_time" id="time_late" value="Late night">
                                                        <label class="form-check-label" for="time_late">
                                                            <span class="lang-en">Late night</span>
                                                            <span class="lang-ha" style="display:none;">Dare</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">4. Where do you usually get motorcycle rides?</span>
                                                    <span class="lang-ha" style="display:none;">4. A ina kake samun motar achaba?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_roadside" value="Roadside / junction">
                                                        <label class="form-check-label" for="loc_roadside">
                                                            <span class="lang-en">Roadside / junction</span>
                                                            <span class="lang-ha" style="display:none;">Gefen hanya / mararraba</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_park" value="Motorcycle park">
                                                        <label class="form-check-label" for="loc_park">
                                                            <span class="lang-en">Motorcycle park</span>
                                                            <span class="lang-ha" style="display:none;">Tashar achaba</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_near" value="Near home or workplace">
                                                        <label class="form-check-label" for="loc_near">
                                                            <span class="lang-en">Near home or workplace</span>
                                                            <span class="lang-ha" style="display:none;">Kusa da gida ko wurin aiki</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ride_location" id="loc_contact" value="Through a personal contact">
                                                        <label class="form-check-label" for="loc_contact">
                                                            <span class="lang-en">Through a personal contact</span>
                                                            <span class="lang-ha" style="display:none;">Ta hanyar wanda na sani</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">5. Do you usually ride with the same rider or different riders?</span>
                                                    <span class="lang-ha" style="display:none;">5. Kana amfani da dan achaba guda daya ko daban-daban?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rider_consistency" id="rider_same" value="Mostly the same">
                                                        <label class="form-check-label" for="rider_same">
                                                            <span class="lang-en">Mostly the same</span>
                                                            <span class="lang-ha" style="display:none;">Galibi daya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rider_consistency" id="rider_different" value="Different riders">
                                                        <label class="form-check-label" for="rider_different">
                                                            <span class="lang-en">Different riders</span>
                                                            <span class="lang-ha" style="display:none;">Daban-daban</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rider_consistency" id="rider_no_pref" value="No preference">
                                                        <label class="form-check-label" for="rider_no_pref">
                                                            <span class="lang-en">No preference</span>
                                                            <span class="lang-ha" style="display:none;">Ba na damu</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 3: BOOKING & COMMUNICATION PATTERNS -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 3: Booking & Communication Patterns</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 3: Tsarin Booking da Sadarwa</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">6. How do you usually find or contact a rider?</span>
                                                    <span class="lang-ha" style="display:none;">6. Yaya kake samun ko tuntubar dan achaba?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_walk" value="Walk to rider location">
                                                        <label class="form-check-label" for="find_walk">
                                                            <span class="lang-en">Walk to rider location</span>
                                                            <span class="lang-ha" style="display:none;">Tafi wurin dan achaba</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_call" value="Call a rider directly">
                                                        <label class="form-check-label" for="find_call">
                                                            <span class="lang-en">Call a rider directly</span>
                                                            <span class="lang-ha" style="display:none;">Kira dan achaba kai tsaye</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_contacts" value="Rider contacts me">
                                                        <label class="form-check-label" for="find_contacts">
                                                            <span class="lang-en">Rider contacts me</span>
                                                            <span class="lang-ha" style="display:none;">Dan achaba yana tuntubar ni</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="find_rider" id="find_third_party" value="Through a third party">
                                                        <label class="form-check-label" for="find_third_party">
                                                            <span class="lang-en">Through a third party</span>
                                                            <span class="lang-ha" style="display:none;">Ta hanyar wani mutum</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">7. Have you ever struggled to find a rider when needed?</span>
                                                    <span class="lang-ha" style="display:none;">7. Ka taɓa fuskanci wahala wajen samun dan achaba lokacin bukatar ka?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_often" value="Yes, often">
                                                        <label class="form-check-label" for="struggle_often">
                                                            <span class="lang-en">Yes, often</span>
                                                            <span class="lang-ha" style="display:none;">E, sau da yawa</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_sometimes" value="Yes, sometimes">
                                                        <label class="form-check-label" for="struggle_sometimes">
                                                            <span class="lang-en">Yes, sometimes</span>
                                                            <span class="lang-ha" style="display:none;">E, wani lokaci</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_rarely" value="Rarely">
                                                        <label class="form-check-label" for="struggle_rarely">
                                                            <span class="lang-en">Rarely</span>
                                                            <span class="lang-ha" style="display:none;">Da wuya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="struggled_rider" id="struggle_never" value="Never">
                                                        <label class="form-check-label" for="struggle_never">
                                                            <span class="lang-en">Never</span>
                                                            <span class="lang-ha" style="display:none;">Ba na taɓa</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">8. What usually causes this difficulty?</span>
                                                    <span class="lang-ha" style="display:none;">8. Me yake haddasa wannan wahala?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_time" value="Time of day">
                                                        <label class="form-check-label" for="cause_time">
                                                            <span class="lang-en">Time of day</span>
                                                            <span class="lang-ha" style="display:none;">Lokacin rana</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_location" value="Location">
                                                        <label class="form-check-label" for="cause_location">
                                                            <span class="lang-en">Location</span>
                                                            <span class="lang-ha" style="display:none;">Wurin</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_weather" value="Weather">
                                                        <label class="form-check-label" for="cause_weather">
                                                            <span class="lang-en">Weather</span>
                                                            <span class="lang-ha" style="display:none;">Yanayi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_availability" value="Rider availability">
                                                        <label class="form-check-label" for="cause_availability">
                                                            <span class="lang-en">Rider availability</span>
                                                            <span class="lang-ha" style="display:none;">Rashin samun dan achaba</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="difficulty_cause" id="cause_other" value="Other">
                                                        <label class="form-check-label" for="cause_other">
                                                            <span class="lang-en">Other</span>
                                                            <span class="lang-ha" style="display:none;">Wani dalili</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 4: PRICING & PAYMENT EXPERIENCE -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 4: Pricing & Payment Experience</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 4: Farashin Kuɗi da Biya</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">9. How do you usually agree on the fare?</span>
                                                    <span class="lang-ha" style="display:none;">9. Yaya kuke yarjenya kan kuɗin tafiya?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="fare_agreement" id="fare_negotiation" value="Negotiation">
                                                        <label class="form-check-label" for="fare_negotiation">
                                                            <span class="lang-en">Negotiation</span>
                                                            <span class="lang-ha" style="display:none;">Tattaunawa</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="fare_agreement" id="fare_decides" value="Rider decides">
                                                        <label class="form-check-label" for="fare_decides">
                                                            <span class="lang-en">Rider decides</span>
                                                            <span class="lang-ha" style="display:none;">Dan achaba yake yanke shawara</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="fare_agreement" id="fare_fixed" value="Known/fixed price">
                                                        <label class="form-check-label" for="fare_fixed">
                                                            <span class="lang-en">Known/fixed price</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗi da aka riga aka sani</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">10. Have you experienced pricing disagreements?</span>
                                                    <span class="lang-ha" style="display:none;">10. Ka taɓa samun rigima kan farashin kuɗi?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_frequently" value="Frequently">
                                                        <label class="form-check-label" for="disagree_frequently">
                                                            <span class="lang-en">Frequently</span>
                                                            <span class="lang-ha" style="display:none;">Sau da yawa</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_occasionally" value="Occasionally">
                                                        <label class="form-check-label" for="disagree_occasionally">
                                                            <span class="lang-en">Occasionally</span>
                                                            <span class="lang-ha" style="display:none;">Lokaci-lokaci</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_rarely" value="Rarely">
                                                        <label class="form-check-label" for="disagree_rarely">
                                                            <span class="lang-en">Rarely</span>
                                                            <span class="lang-ha" style="display:none;">Da wuya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pricing_disagreements" id="disagree_never" value="Never">
                                                        <label class="form-check-label" for="disagree_never">
                                                            <span class="lang-en">Never</span>
                                                            <span class="lang-ha" style="display:none;">Ba na taɓa</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">11. How do you usually pay?</span>
                                                    <span class="lang-ha" style="display:none;">11. Yaya kake biyan kuɗin tafiya?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_cash" value="Cash">
                                                        <label class="form-check-label" for="payment_cash">
                                                            <span class="lang-en">Cash</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_transfer" value="Bank transfer">
                                                        <label class="form-check-label" for="payment_transfer">
                                                            <span class="lang-en">Bank transfer</span>
                                                            <span class="lang-ha" style="display:none;">Canja wurin kuɗi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_mobile" value="Mobile money">
                                                        <label class="form-check-label" for="payment_mobile">
                                                            <span class="lang-en">Mobile money</span>
                                                            <span class="lang-ha" style="display:none;">Kuɗin waya</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 5: SAFETY & TRUST PERCEPTION -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 5: Safety & Trust Perception</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 5: Aminci da Amana</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">12. How safe do you generally feel using motorcycle transport?</span>
                                                    <span class="lang-ha" style="display:none;">12. Yaya kake jin lafiya lokacin amfani da motar achaba?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_very_safe" value="Very safe">
                                                        <label class="form-check-label" for="safety_very_safe">
                                                            <span class="lang-en">Very safe</span>
                                                            <span class="lang-ha" style="display:none;">Ina da aminci sosai</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_somewhat_safe" value="Somewhat safe">
                                                        <label class="form-check-label" for="safety_somewhat_safe">
                                                            <span class="lang-en">Somewhat safe</span>
                                                            <span class="lang-ha" style="display:none;">Ina da ɗan aminci</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_neutral" value="Neutral">
                                                        <label class="form-check-label" for="safety_neutral">
                                                            <span class="lang-en">Neutral</span>
                                                            <span class="lang-ha" style="display:none;">Matsakaici</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_somewhat_unsafe" value="Somewhat unsafe">
                                                        <label class="form-check-label" for="safety_somewhat_unsafe">
                                                            <span class="lang-en">Somewhat unsafe</span>
                                                            <span class="lang-ha" style="display:none;">Ba aminci sosai ba</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_feeling" id="safety_very_unsafe" value="Very unsafe">
                                                        <label class="form-check-label" for="safety_very_unsafe">
                                                            <span class="lang-en">Very unsafe</span>
                                                            <span class="lang-ha" style="display:none;">Babu aminci</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">13. What safety concerns have you experienced or worried about?</span>
                                                    <span class="lang-ha" style="display:none;">13. Wanne irin matsalar aminci ka taɓa fuskanta ko ka damu da ita?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_reckless" value="Reckless riding">
                                                        <label class="form-check-label" for="concern_reckless">
                                                            <span class="lang-en">Reckless riding</span>
                                                            <span class="lang-ha" style="display:none;">Tukin hauka</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_roads" value="Poor roads">
                                                        <label class="form-check-label" for="concern_roads">
                                                            <span class="lang-en">Poor roads</span>
                                                            <span class="lang-ha" style="display:none;">Hanyoyi marasa kyau</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_helmet" value="No helmet">
                                                        <label class="form-check-label" for="concern_helmet">
                                                            <span class="lang-en">No helmet</span>
                                                            <span class="lang-ha" style="display:none;">Babu hular kariya</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_theft" value="Theft or harassment">
                                                        <label class="form-check-label" for="concern_theft">
                                                            <span class="lang-en">Theft or harassment</span>
                                                            <span class="lang-ha" style="display:none;">Sata ko cin zarafi</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_unfamiliar" value="Rider unfamiliarity">
                                                        <label class="form-check-label" for="concern_unfamiliar">
                                                            <span class="lang-en">Rider unfamiliarity</span>
                                                            <span class="lang-ha" style="display:none;">Rashin sanin dan achaba</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="safety_concerns" id="concern_none_safety" value="None">
                                                        <label class="form-check-label" for="concern_none_safety">
                                                            <span class="lang-en">None</span>
                                                            <span class="lang-ha" style="display:none;">Babu</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">14. If something goes wrong during a ride, how confident are you that help would be available?</span>
                                                    <span class="lang-ha" style="display:none;">14. Idan wani abu ya faru a lokacin tafiya, kana da	abbas cewa za a same ka da taimako?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="help_confidence" id="help_very_confident" value="Very confident">
                                                        <label class="form-check-label" for="help_very_confident">
                                                            <span class="lang-en">Very confident</span>
                                                            <span class="lang-ha" style="display:none;">Ina da tabbas sosai</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="help_confidence" id="help_somewhat" value="Somewhat confident">
                                                        <label class="form-check-label" for="help_somewhat">
                                                            <span class="lang-en">Somewhat confident</span>
                                                            <span class="lang-ha" style="display:none;">Ina da ɗan tabbas</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="help_confidence" id="help_not_confident" value="Not confident">
                                                        <label class="form-check-label" for="help_not_confident">
                                                            <span class="lang-en">Not confident</span>
                                                            <span class="lang-ha" style="display:none;">Ba na da tabbas</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 6: RELIABILITY & EXPERIENCE QUALITY -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 6: Reliability & Experience Quality</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 6: Tabbas da Inganci</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <span class="lang-en">15. How would you rate the reliability of motorcycle transport?</span>
                                    <span class="lang-ha" style="display:none;">15. Yaya kake ganin amincin motar achaba?</span>
                                    <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="reliability" id="reliability_very" value="Very reliable">
                                        <label class="form-check-label" for="reliability_very">
                                            <span class="lang-en">Very reliable</span>
                                            <span class="lang-ha" style="display:none;">Amintacce sosai</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="reliability" id="reliability_somewhat" value="Somewhat reliable">
                                        <label class="form-check-label" for="reliability_somewhat">
                                            <span class="lang-en">Somewhat reliable</span>
                                            <span class="lang-ha" style="display:none;">Yana da ɗan aminci</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="reliability" id="reliability_unreliable" value="Unreliable">
                                        <label class="form-check-label" for="reliability_unreliable">
                                            <span class="lang-en">Unreliable</span>
                                            <span class="lang-ha" style="display:none;">Ba amintacce ba</span>
                                        </label>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">16. Have you had any memorable experiences (good or bad)?</span>
                                                    <span class="lang-ha" style="display:none;">16. Shin kana da wasu abubuwan da suka faru da kai (mai kyau ko marar kyau)?</span>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_mostly_good" value="Mostly good">
                                                        <label class="form-check-label" for="exp_mostly_good">
                                                            <span class="lang-en">Mostly good</span>
                                                            <span class="lang-ha" style="display:none;">Mafi yawan abubuwa masu kyau</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_mostly_bad" value="Mostly bad">
                                                        <label class="form-check-label" for="exp_mostly_bad">
                                                            <span class="lang-en">Mostly bad</span>
                                                            <span class="lang-ha" style="display:none;">Mafi yawan abubuwa marasa kyau</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_mixed" value="Mixed">
                                                        <label class="form-check-label" for="exp_mixed">
                                                            <span class="lang-en">Mixed</span>
                                                            <span class="lang-ha" style="display:none;">Gauraye</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_neutral" value="Neutral">
                                                        <label class="form-check-label" for="exp_neutral">
                                                            <span class="lang-en">Neutral</span>
                                                            <span class="lang-ha" style="display:none;\">Na tsaka-tsaki</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="experiences" id="exp_none" value="None">
                                                        <label class="form-check-label" for="exp_none">
                                                            <span class="lang-en">None</span>
                                                            <span class="lang-ha" style="display:none;">Babu</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SECTION 7: REFLECTION & EXPECTATIONS -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 7: Reflection & Expectations</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 7: Tunani da Tsammanin</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                <label for="frustration" class="form-label fw-semibold">
                                    <span class="lang-en">17. What frustrates you most about the current experience?</span>
                                    <span class="lang-ha" style="display:none;">17. Menene yake damunka sosai game da yadda ake hawan motar achaba?</span>
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" id="frustration" name="frustration" rows="3" placeholder="Tell us what frustrates you..."></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <label for="improvement" class="form-label fw-semibold">
                                    <span class="lang-en">18. What would improve your experience with motorcycles?</span>
                                    <span class="lang-ha" style="display:none;">18. Menene zai sa ka sami ingantacciyar hawan motar achaba?</span>
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" id="improvement" name="improvement" rows="3" placeholder="Tell us what would make it better..."></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <span class="lang-en">19. Would you switch to a safer, more reliable option if available?</span>
                                    <span class="lang-ha" style="display:none;">19. Shin za ka canza zuwa zaɓi mai aminci idan akwai?</span>
                                    <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="would_switch" id="switch_yes" value="Yes">
                                        <label class="form-check-label" for="switch_yes">
                                            <span class="lang-en">Yes</span>
                                            <span class="lang-ha" style="display:none;">Eh</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="would_switch" id="switch_maybe" value="Maybe">
                                        <label class="form-check-label" for="switch_maybe">
                                            <span class="lang-en">Maybe</span>
                                            <span class="lang-ha" style="display:none;">Watakila</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="would_switch" id="switch_no" value="No">
                                        <label class="form-check-label" for="switch_no">
                                            <span class="lang-en">No</span>
                                            <span class="lang-ha" style="display:none;">A'a</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                                        </div>
                                        
                                        <!-- SECTION 8: DEMOGRAPHICS (OPTIONAL) -->
                                        <div class="mb-5">
                                            <h5 class="text-primary mb-4 pb-2 border-bottom">
                                                <span class="lang-en">Section 8: Demographics (Optional)</span>
                                                <span class="lang-ha" style="display:none;">Sashe na 8: Bayanai (Zaɓi)</span>
                                            </h5>
                                            
                                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <span class="lang-en">20. What is your age range?</span>
                                    <span class="lang-ha" style="display:none;">20. Shekarunka nawa ne?</span>
                                </label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="age_range" id="age_under18" value="Under 18">
                                        <label class="form-check-label" for="age_under18">
                                            <span class="lang-en">Under 18</span>
                                            <span class="lang-ha" style="display:none;">Kasa da shekara 18</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="age_range" id="age_18_24" value="18-24">
                                        <label class="form-check-label" for="age_18_24">
                                            <span class="lang-en">18-24</span>
                                            <span class="lang-ha" style="display:none;">18-24</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="age_range" id="age_25_34" value="25-34">
                                        <label class="form-check-label" for="age_25_34">
                                            <span class="lang-en">25-34</span>
                                            <span class="lang-ha" style="display:none;">25-34</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="age_range" id="age_35_44" value="35-44">
                                        <label class="form-check-label" for="age_35_44">
                                            <span class="lang-en">35-44</span>
                                            <span class="lang-ha" style="display:none;">35-44</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="age_range" id="age_45_plus" value="45+">
                                        <label class="form-check-label" for="age_45_plus">
                                            <span class="lang-en">45+</span>
                                            <span class="lang-ha" style="display:none;">Sama da 45</span>
                                        </label>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">
                                                    <span class="lang-en">21. What type of phone do you use?</span>
                                                    <span class="lang-ha" style="display:none;">21. Wane nau'in wayar kake amfani da ita?</span>
                                                </label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="phone_type" id="phone_smartphone" value="Smartphone">
                                                        <label class="form-check-label" for="phone_smartphone">
                                                            <span class="lang-en">Smartphone</span>
                                                            <span class="lang-ha" style="display:none;">Wayar hannu mai fasaha (Smartphone)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="phone_type" id="phone_basic" value="Basic phone">
                                                        <label class="form-check-label" for="phone_basic">
                                                            <span class="lang-en">Basic phone</span>
                                                            <span class="lang-ha" style="display:none;">Wayar hannu ta yau da kullum</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="prevStep(2)">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        <span class="lang-en">Back</span>
                                        <span class="lang-ha" style="display:none;">Komawa</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <span class="lang-en">Submit Survey</span>
                                        <span class="lang-ha" style="display:none;">Aika Tambayoyi</span>
                                        <i class="fas fa-check ms-2"></i>
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
        // Language switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const langRadios = document.querySelectorAll('input[name="language"]');
            const surveyLanguageInput = document.getElementById('surveyLanguage');
            
            // Define placeholder translations
            const placeholders = {
                english: {
                    'name': 'Enter your full name',
                    'email': 'Enter your email address',
                    'phone': 'Enter your phone number',
                    'location': 'Where are you located?',
                    'income': 'How much do you earn monthly?',
                    'frustration': 'Tell us what frustrates you...',
                    'improvement': 'Tell us what would make it better...',
                    'routeDetails': 'Please describe your main routes',
                    'comfortDetails': 'Tell us more about your comfort level',
                    'safetyDetails': 'Tell us more about how you feel',
                    'otherExpense': 'Please specify',
                    'savingsReason': 'Please explain why',
                    'incomeDetails': 'Please provide details'
                },
                hausa: {
                    'name': 'Rubuta sunanka',
                    'email': 'Rubuta adireshin imelinka',
                    'phone': 'Rubuta lambar wayarka',
                    'location': 'Ina kake zaune?',
                    'income': 'Nawa kake samun kuɗi a wata?',
                    'frustration': 'Faɗa mana abin da yake damunka...',
                    'improvement': 'Faɗa mana abin da zai inganta...',
                    'routeDetails': 'Ka bayyana yadda kake tafiya',
                    'comfortDetails': 'Faɗa mana game da jin daɗinka',
                    'safetyDetails': 'Faɗa mana yadda kake ji',
                    'otherExpense': 'Ka fayyace',
                    'savingsReason': 'Ka bayyana dalilin',
                    'incomeDetails': 'Ka bayyana dalla-dalla'
                }
            };
            
            function updatePlaceholders(lang) {
                const langKey = lang === 'english' ? 'english' : 'hausa';
                
                // Update all input and textarea placeholders with null checks
                const nameField = document.getElementById('name');
                if (nameField) nameField.placeholder = placeholders[langKey].name;
                
                const emailField = document.getElementById('email');
                if (emailField) emailField.placeholder = placeholders[langKey].email;
                
                const phoneField = document.getElementById('phone');
                if (phoneField) phoneField.placeholder = placeholders[langKey].phone;
                
                const locationField = document.getElementById('location');
                if (locationField) locationField.placeholder = placeholders[langKey].location;
                
                const incomeField = document.getElementById('income');
                if (incomeField) incomeField.placeholder = placeholders[langKey].income;
                
                const frustrationField = document.getElementById('frustration');
                if (frustrationField) frustrationField.placeholder = placeholders[langKey].frustration;
                
                const improvementField = document.getElementById('improvement');
                if (improvementField) improvementField.placeholder = placeholders[langKey].improvement;
                
                const routeDetailsField = document.getElementById('routeDetails');
                if (routeDetailsField) routeDetailsField.placeholder = placeholders[langKey].routeDetails;
                
                const comfortDetailsField = document.getElementById('comfortDetails');
                if (comfortDetailsField) comfortDetailsField.placeholder = placeholders[langKey].comfortDetails;
                
                const safetyDetailsField = document.getElementById('safetyDetails');
                if (safetyDetailsField) safetyDetailsField.placeholder = placeholders[langKey].safetyDetails;
                
                const otherExpenseField = document.getElementById('q8_other_specify');
                if (otherExpenseField) otherExpenseField.placeholder = placeholders[langKey].otherExpense;
                
                const savingsReasonField = document.getElementById('q10_reason');
                if (savingsReasonField) savingsReasonField.placeholder = placeholders[langKey].savingsReason;
                
                const incomeDetailsField = document.getElementById('q9_followup');
                if (incomeDetailsField) incomeDetailsField.placeholder = placeholders[langKey].incomeDetails;
            }
            
            langRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const selectedLang = this.value;
                    surveyLanguageInput.value = selectedLang;
                    
                    // Hide all language elements
                    document.querySelectorAll('.lang-en, .lang-ha').forEach(el => {
                        el.style.display = 'none';
                    });
                    
                    // Show selected language elements
                    if (selectedLang === 'english') {
                        document.querySelectorAll('.lang-en').forEach(el => {
                            el.style.display = '';
                        });
                    } else if (selectedLang === 'hausa') {
                        document.querySelectorAll('.lang-ha').forEach(el => {
                            el.style.display = '';
                        });
                    }
                    
                    // Update placeholders
                    updatePlaceholders(selectedLang);
                });
            });
            
            // Auto-advance from Step 1 when survey type is selected
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
            // Get current step
            const currentStep = document.querySelector('.survey-step.active');
            
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
            
            const submitBtn = e.submitter || this.querySelector('button[type="submit"]');
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
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                // Show response message
                responseMessage.style.display = 'block';
                responseMessage.textContent = data.message || 'Survey submitted successfully!';
                
                if (data.success) {
                    responseMessage.className = 'mt-4 alert alert-success';
                    
                    // Scroll to message
                    responseMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                    // Reset form and go back to step 1 after a delay
                    setTimeout(() => {
                        document.getElementById('surveyForm').reset();
                        document.querySelector('.survey-step.active').classList.remove('active');
                        document.getElementById('step1').classList.add('active');
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }, 2000);
                } else {
                    responseMessage.className = 'mt-4 alert alert-danger';
                    responseMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                
            } catch (error) {
                console.error('Submission error:', error);
                responseMessage.style.display = 'block';
                responseMessage.className = 'mt-4 alert alert-danger';
                responseMessage.textContent = 'Error: ' + error.message + '. Please check your connection and try again.';
                responseMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                const langEn = document.querySelector('.lang-en').style.display !== 'none';
                submitBtn.innerHTML = langEn 
                    ? 'Submit Survey <i class="fas fa-check ms-2"></i>' 
                    : 'Aika Tambayoyi <i class="fas fa-check ms-2"></i>';
            }
        });
    </script>
</body>
</html>
