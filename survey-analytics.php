<?php
// Enable error reporting for development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database configuration
require_once __DIR__ . '/config/database.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    die("Database connection failed");
}

// Get filter type
$filterType = $_GET['filter'] ?? 'all';

// Get basic statistics
$stats = [
    'total' => 0,
    'rider' => 0,
    'user' => 0,
    'today' => 0
];

$stmt = $conn->query("SELECT COUNT(*) as total FROM survey_responses");
$stats['total'] = $stmt->fetch()['total'];

$stmt = $conn->query("SELECT COUNT(*) as total FROM survey_responses WHERE survey_type = 'rider'");
$stats['rider'] = $stmt->fetch()['total'];

$stmt = $conn->query("SELECT COUNT(*) as total FROM survey_responses WHERE survey_type = 'user'");
$stats['user'] = $stmt->fetch()['total'];

$stmt = $conn->query("SELECT COUNT(*) as total FROM survey_responses WHERE DATE(submitted_at) = CURDATE()");
$stats['today'] = $stmt->fetch()['total'];

// Get responses for analysis
if ($filterType === 'all') {
    $stmt = $conn->query("SELECT * FROM survey_responses ORDER BY submitted_at DESC");
} else {
    $stmt = $conn->prepare("SELECT * FROM survey_responses WHERE survey_type = :type ORDER BY submitted_at DESC");
    $stmt->execute(['type' => $filterType]);
}

$responses = $stmt->fetchAll();

// Prepare data for charts
$chartData = [
    'surveyTypeDistribution' => [],
    'submissionsOverTime' => [],
    'riderAnalysis' => [],
    'userAnalysis' => []
];

// Process responses
$surveyTypeCounts = ['rider' => 0, 'user' => 0];
$submissionsByDate = [];
$riderDataMap = [];
$userDataMap = [];

foreach ($responses as $response) {
    $surveyTypeCounts[$response['survey_type']]++;
    
    $date = date('M d', strtotime($response['submitted_at']));
    if (!isset($submissionsByDate[$date])) {
        $submissionsByDate[$date] = 0;
    }
    $submissionsByDate[$date]++;
    
    $responseData = json_decode($response['responses'], true);
    
    if ($response['survey_type'] === 'rider') {
        // Initialize rider data structures
        if (!isset($riderDataMap['riding_duration'])) {
            $riderDataMap['riding_duration'] = [];
            $riderDataMap['income'] = ['main' => 0, 'additional' => 0];
            $riderDataMap['operating_areas'] = [];
            $riderDataMap['best_time'] = [];
            $riderDataMap['expenses'] = [];
            $riderDataMap['expense_cost'] = [];
            $riderDataMap['earnings_stable'] = [];
            $riderDataMap['earnings_difference'] = [];
            $riderDataMap['can_save'] = [];
            $riderDataMap['save_amount'] = [];
            $riderDataMap['cannot_save_reason'] = [];
            $riderDataMap['safety_concerns'] = 0;
            $riderDataMap['difficult_passengers'] = [];
            $riderDataMap['safety_measures'] = [];
            $riderDataMap['work_respect'] = [];
            $riderDataMap['passenger_contact'] = [];
            $riderDataMap['phone_importance'] = [];
            $riderDataMap['phone_limitations'] = [];
            $riderDataMap['doorstep_pickup_feeling'] = [];
            $riderDataMap['delivery_errands_feeling'] = [];
            $riderDataMap['trust_factors'] = [];
            $riderDataMap['rider_group'] = [];
            $riderDataMap['security_needs'] = [];
            $riderDataMap['support_priorities'] = [];
        }
        
        // Q1: Riding duration
        if (isset($responseData['q1']) && !empty($responseData['q1'])) {
            $duration = $responseData['q1'];
            if (!isset($riderDataMap['riding_duration'][$duration])) {
                $riderDataMap['riding_duration'][$duration] = 0;
            }
            $riderDataMap['riding_duration'][$duration]++;
        }
        
        // Q2: Income source
        if (isset($responseData['q2'])) {
            if (stripos($responseData['q2'], 'only') !== false || stripos($responseData['q2'], 'main') !== false) {
                $riderDataMap['income']['main']++;
            } else {
                $riderDataMap['income']['additional']++;
            }
        }
        
        // Q3: Operating areas
        if (isset($responseData['q3']) && !empty($responseData['q3'])) {
            $area = $responseData['q3'];
            if (!isset($riderDataMap['operating_areas'][$area])) {
                $riderDataMap['operating_areas'][$area] = 0;
            }
            $riderDataMap['operating_areas'][$area]++;
        }
        
        // Q5: Best time of day
        if (isset($responseData['q5']) && !empty($responseData['q5'])) {
            $time = $responseData['q5'];
            if (!isset($riderDataMap['best_time'][$time])) {
                $riderDataMap['best_time'][$time] = 0;
            }
            $riderDataMap['best_time'][$time]++;
        }
        
        // Q8: Expenses
        if (isset($responseData['q8_expenses']) && is_array($responseData['q8_expenses'])) {
            foreach ($responseData['q8_expenses'] as $expense) {
                if (!isset($riderDataMap['expenses'][$expense])) {
                    $riderDataMap['expenses'][$expense] = 0;
                }
                $riderDataMap['expenses'][$expense]++;
            }
        }
        
        // Q8: Expense cost range
        if (isset($responseData['q8_cost']) && !empty($responseData['q8_cost'])) {
            $cost = $responseData['q8_cost'];
            if (!isset($riderDataMap['expense_cost'][$cost])) {
                $riderDataMap['expense_cost'][$cost] = 0;
            }
            $riderDataMap['expense_cost'][$cost]++;
        }
        
        // Q9: Earnings stability
        if (isset($responseData['q9']) && !empty($responseData['q9'])) {
            $stability = $responseData['q9'];
            if (!isset($riderDataMap['earnings_stable'][$stability])) {
                $riderDataMap['earnings_stable'][$stability] = 0;
            }
            $riderDataMap['earnings_stable'][$stability]++;
        }
        
        // Q9: Earnings difference
        if (isset($responseData['q9_followup']) && !empty($responseData['q9_followup'])) {
            $diff = $responseData['q9_followup'];
            if (!isset($riderDataMap['earnings_difference'][$diff])) {
                $riderDataMap['earnings_difference'][$diff] = 0;
            }
            $riderDataMap['earnings_difference'][$diff]++;
        }
        
        // Q10: Can save
        if (isset($responseData['q10']) && !empty($responseData['q10'])) {
            $save = $responseData['q10'];
            if (!isset($riderDataMap['can_save'][$save])) {
                $riderDataMap['can_save'][$save] = 0;
            }
            $riderDataMap['can_save'][$save]++;
        }
        
        // Q10: Save amount
        if (isset($responseData['q10_amount']) && !empty($responseData['q10_amount'])) {
            $amount = $responseData['q10_amount'];
            if (!isset($riderDataMap['save_amount'][$amount])) {
                $riderDataMap['save_amount'][$amount] = 0;
            }
            $riderDataMap['save_amount'][$amount]++;
        }
        
        // Q10: Cannot save reason
        if (isset($responseData['q10_reason']) && !empty($responseData['q10_reason'])) {
            $reason = $responseData['q10_reason'];
            if (!isset($riderDataMap['cannot_save_reason'][$reason])) {
                $riderDataMap['cannot_save_reason'][$reason] = 0;
            }
            $riderDataMap['cannot_save_reason'][$reason]++;
        }
        
        // Q11: Safety concerns
        if (isset($responseData['q11']) && !empty($responseData['q11'])) {
            $riderDataMap['safety_concerns']++;
        }
        
        // Q14: Work respect
        if (isset($responseData['q14']) && !empty($responseData['q14'])) {
            $respect = $responseData['q14'];
            if (!isset($riderDataMap['work_respect'][$respect])) {
                $riderDataMap['work_respect'][$respect] = 0;
            }
            $riderDataMap['work_respect'][$respect]++;
        }
        
        // Q15: How passengers contact
        if (isset($responseData['q15']) && !empty($responseData['q15'])) {
            $contact = $responseData['q15'];
            if (!isset($riderDataMap['passenger_contact'][$contact])) {
                $riderDataMap['passenger_contact'][$contact] = 0;
            }
            $riderDataMap['passenger_contact'][$contact]++;
        }
        
        // Q18: Doorstep pickup feeling
        if (isset($responseData['q18']) && !empty($responseData['q18'])) {
            $feeling = $responseData['q18'];
            if (!isset($riderDataMap['doorstep_pickup_feeling'][$feeling])) {
                $riderDataMap['doorstep_pickup_feeling'][$feeling] = 0;
            }
            $riderDataMap['doorstep_pickup_feeling'][$feeling]++;
        }
        
        // Q19: Delivery errands feeling
        if (isset($responseData['q19']) && !empty($responseData['q19'])) {
            $feeling = $responseData['q19'];
            if (!isset($riderDataMap['delivery_errands_feeling'][$feeling])) {
                $riderDataMap['delivery_errands_feeling'][$feeling] = 0;
            }
            $riderDataMap['delivery_errands_feeling'][$feeling]++;
        }
        
        // Q21: Rider group membership
        if (isset($responseData['q21']) && !empty($responseData['q21'])) {
            $group = $responseData['q21'];
            if (!isset($riderDataMap['rider_group'][$group])) {
                $riderDataMap['rider_group'][$group] = 0;
            }
            $riderDataMap['rider_group'][$group]++;
        }
        
    } else {
        // Initialize user data structures
        if (!isset($userDataMap['usage_frequency'])) {
            $userDataMap['usage_frequency'] = [];
            $userDataMap['primary_reason'] = [];
            $userDataMap['usage_time'] = [];
            $userDataMap['ride_location'] = [];
            $userDataMap['rider_consistency'] = [];
            $userDataMap['find_rider'] = [];
            $userDataMap['struggled_rider'] = [];
            $userDataMap['difficulty_cause'] = [];
            $userDataMap['fare_agreement'] = [];
            $userDataMap['pricing_disagreements'] = [];
            $userDataMap['payment_method'] = [];
            $userDataMap['safety_feeling'] = [];
            $userDataMap['safety_concerns'] = [];
            $userDataMap['help_confidence'] = [];
            $userDataMap['reliability'] = [];
            $userDataMap['experiences'] = [];
            $userDataMap['would_switch'] = [];
            $userDataMap['age_range'] = [];
            $userDataMap['phone_type'] = [];
        }
        
        // Process all user questions
        $userFields = [
            'usage_frequency', 'primary_reason', 'usage_time', 'ride_location',
            'rider_consistency', 'find_rider', 'struggled_rider', 'difficulty_cause',
            'fare_agreement', 'pricing_disagreements', 'payment_method',
            'safety_feeling', 'safety_concerns', 'help_confidence',
            'reliability', 'experiences', 'would_switch',
            'age_range', 'phone_type'
        ];
        
        foreach ($userFields as $field) {
            if (isset($responseData[$field]) && !empty($responseData[$field])) {
                $value = $responseData[$field];
                if (!isset($userDataMap[$field][$value])) {
                    $userDataMap[$field][$value] = 0;
                }
                $userDataMap[$field][$value]++;
            }
        }
    }
}

$chartData['surveyTypeDistribution'] = $surveyTypeCounts;
$chartData['submissionsOverTime'] = $submissionsByDate;
$chartData['riderAnalysis'] = $riderDataMap;
$chartData['userAnalysis'] = $userDataMap;

// Convert to JSON for JavaScript
$chartDataJson = json_encode($chartData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Analytics - Admin | Achaba</title>
    
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
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        
        .stat-card {
            border-left: 4px solid #00A551;
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 8px;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .chart-container {
            position: relative;
            height: 400px;
            background: white;
            border-radius: 8px;
            padding: 20px;
            padding-bottom: 50px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .chart-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 15px;
        }
        
        .insights-box {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-left: 4px solid #00A551;
        }
        
        .insight-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .insight-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .insight-label {
            color: #6c757d;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .insight-value {
            color: #212529;
            font-size: 1.5rem;
            font-weight: 700;
            color: #00A551;
        }
        
        .badge-rider {
            background-color: #00A551;
        }
        
        .badge-user {
            background-color: #0d6efd;
        }
        
        .no-data {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }
        
        .btn-primary {
            background-color: #00A551 !important;
            border-color: #00A551 !important;
        }
        
        .btn-primary:hover {
            background-color: #008F46 !important;
            border-color: #008F46 !important;
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                background: white;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark no-print">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <i class="fas fa-chart-pie me-2"></i>Survey Analytics
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="surveys">Responses</a>
                <a class="nav-link active" href="survey-analytics">Analytics</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="row mb-4 no-print">
            <div class="col">
                <h2 class="mb-0"><i class="fas fa-chart-line me-2"></i>Survey Analytics Dashboard</h2>
                <p class="text-muted">Visual insights into survey responses</p>
            </div>
            <div class="col-auto">
                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="fas fa-print me-2"></i>Print
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4 no-print">
            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Responses</p>
                                <h3 class="mb-0"><?php echo number_format($stats['total']); ?></h3>
                            </div>
                            <div class="text-primary">
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Rider Surveys</p>
                                <h3 class="mb-0"><?php echo number_format($stats['rider']); ?></h3>
                            </div>
                            <div class="text-success">
                                <i class="fas fa-motorcycle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">User Surveys</p>
                                <h3 class="mb-0"><?php echo number_format($stats['user']); ?></h3>
                            </div>
                            <div class="text-info">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Today</p>
                                <h3 class="mb-0"><?php echo number_format($stats['today']); ?></h3>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-calendar-day fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Controls -->
        <div class="row mb-4 no-print">
            <div class="col-md-6">
                <div class="btn-group" role="group">
                    <a href="?filter=all" class="btn <?php echo $filterType === 'all' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        All Surveys
                    </a>
                    <a href="?filter=rider" class="btn <?php echo $filterType === 'rider' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        Riders Only
                    </a>
                    <a href="?filter=user" class="btn <?php echo $filterType === 'user' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        Users Only
                    </a>
                </div>
            </div>
        </div>

        <?php if ($stats['total'] === 0): ?>
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                No survey responses yet. Check back once submissions come in.
            </div>
        <?php else: ?>

            <!-- Overall Survey Distribution -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Survey Type Distribution</div>
                        <canvas id="surveyDistributionChart"></canvas>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Submissions Over Time</div>
                        <canvas id="submissionsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Rider Analysis -->
            <?php if (($filterType === 'rider' || $filterType === 'all') && !empty($chartData['riderAnalysis'])): ?>
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-3">
                        <i class="fas fa-motorcycle me-2" style="color: #00A551;"></i>Rider Survey Analysis
                    </h4>
                </div>
                
                <!-- Income & Background -->
                <?php if (!empty($chartData['riderAnalysis']['income'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Primary Income Source</div>
                        <canvas id="riderIncomeChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['riding_duration'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">How Long Riding for Work</div>
                        <canvas id="riderDurationChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['operating_areas'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Operating Areas in Bauchi</div>
                        <canvas id="riderAreasChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['best_time'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Best Time of Day for Work</div>
                        <canvas id="riderBestTimeChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Money & Expenses -->
                <?php if (!empty($chartData['riderAnalysis']['expenses'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Biggest Expenses (Multiple Selection)</div>
                        <canvas id="riderExpensesChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['expense_cost'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Daily/Weekly Expense Range</div>
                        <canvas id="riderExpenseCostChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['earnings_stable'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Earnings Stability Week to Week</div>
                        <canvas id="riderEarningsChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['earnings_difference'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Good Week vs Bad Week Difference</div>
                        <canvas id="riderEarningsDiffChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['can_save'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Ability to Save</div>
                        <canvas id="riderSavingsChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['save_amount'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Usual Savings Amount</div>
                        <canvas id="riderSaveAmountChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['cannot_save_reason'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Main Reason Cannot Save</div>
                        <canvas id="riderCannotSaveReasonChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Safety & Dignity -->
                <?php if (isset($chartData['riderAnalysis']['safety_concerns'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Safety Concerns Reported</div>
                        <canvas id="riderSafetyChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['work_respect'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Is Work Respected in Community?</div>
                        <canvas id="riderWorkRespectChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Tech & Communication -->
                <?php if (!empty($chartData['riderAnalysis']['passenger_contact'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">How Passengers Find/Contact Riders</div>
                        <canvas id="riderPassengerContactChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Platform Fit (Critical for Achaba!) -->
                <?php if (!empty($chartData['riderAnalysis']['doorstep_pickup_feeling'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">🔥 Doorstep Pickup Booking - How Riders Feel</div>
                        <canvas id="riderDoorstepPickupChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['riderAnalysis']['delivery_errands_feeling'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">🔥 Pickup-Only Errands - How Riders Feel</div>
                        <canvas id="riderDeliveryErrandsChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Support & Community -->
                <?php if (!empty($chartData['riderAnalysis']['rider_group'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Rider Group/Association Membership</div>
                        <canvas id="riderGroupChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- User Analysis -->
            <?php if (($filterType === 'user' || $filterType === 'all') && !empty($chartData['userAnalysis'])): ?>
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-3">
                        <i class="fas fa-user me-2" style="color: #0d6efd;"></i>User Survey Analysis
                    </h4>
                </div>
                
                <!-- Usage Patterns -->
                <?php if (!empty($chartData['userAnalysis']['usage_frequency'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Usage Frequency</div>
                        <canvas id="userFrequencyChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['primary_reason'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Primary Reason for Using Motorcycles</div>
                        <canvas id="userReasonChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['usage_time'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Most Common Usage Time</div>
                        <canvas id="userTimeChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['ride_location'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Where Users Get Rides</div>
                        <canvas id="userLocationChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['rider_consistency'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Same Rider or Different Riders?</div>
                        <canvas id="userConsistencyChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Booking & Communication -->
                <?php if (!empty($chartData['userAnalysis']['find_rider'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">How Users Find/Contact Riders</div>
                        <canvas id="userFindRiderChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['struggled_rider'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Struggled to Find Rider When Needed?</div>
                        <canvas id="userStruggledChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['difficulty_cause'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">What Causes Difficulty Finding Riders</div>
                        <canvas id="userDifficultyCauseChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Pricing & Payment -->
                <?php if (!empty($chartData['userAnalysis']['fare_agreement'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">How Fare is Agreed</div>
                        <canvas id="userFareChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['pricing_disagreements'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Frequency of Pricing Disagreements</div>
                        <canvas id="userPricingDisagreementChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['payment_method'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Usual Payment Method</div>
                        <canvas id="userPaymentChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Safety & Trust -->
                <?php if (!empty($chartData['userAnalysis']['safety_feeling'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">How Safe Users Feel</div>
                        <canvas id="userSafetyChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['safety_concerns'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Safety Concerns Experienced</div>
                        <canvas id="userSafetyConcernsChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['help_confidence'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Confidence Help Would Be Available</div>
                        <canvas id="userHelpConfidenceChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Reliability & Experience -->
                <?php if (!empty($chartData['userAnalysis']['reliability'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Reliability of Motorcycle Rides</div>
                        <canvas id="userReliabilityChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['experiences'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Negative Experiences</div>
                        <canvas id="userExperiencesChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Key Question: Would Switch -->
                <?php if (!empty($chartData['userAnalysis']['would_switch'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">🔥 Would Switch to Safer Alternative?</div>
                        <canvas id="userSwitchChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Demographics -->
                <?php if (!empty($chartData['userAnalysis']['age_range'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Age Range Distribution</div>
                        <canvas id="userAgeChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['phone_type'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Phone Type Used</div>
                        <canvas id="userPhoneTypeChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Key Insights -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-3">
                        <i class="fas fa-lightbulb me-2" style="color: #FFC107;"></i>Key Insights
                    </h4>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="insights-box">
                        <div class="insight-item">
                            <div class="insight-label">Response Rate</div>
                            <div class="insight-value"><?php echo number_format($stats['total']); ?></div>
                            <small class="text-muted">Total survey submissions</small>
                        </div>
                        
                        <div class="insight-item">
                            <div class="insight-label">Rider vs User Split</div>
                            <div class="insight-value">
                                <?php echo $stats['rider']; ?> / <?php echo $stats['user']; ?>
                            </div>
                            <small class="text-muted"><?php echo $stats['total'] > 0 ? round(($stats['rider']/$stats['total'])*100, 1) : 0; ?>% riders, <?php echo $stats['total'] > 0 ? round(($stats['user']/$stats['total'])*100, 1) : 0; ?>% users</small>
                        </div>
                        
                        <div class="insight-item">
                            <div class="insight-label">Today's Submissions</div>
                            <div class="insight-value"><?php echo $stats['today']; ?></div>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="insights-box">
                        <?php if (!empty($chartData['riderAnalysis'])): ?>
                        <div class="insight-item">
                            <div class="insight-label">Riders Who Can Save</div>
                            <div class="insight-value">
                                <?php 
                                $riderCanSave = array_sum($chartData['riderAnalysis']['can_save'] ?? []);
                                if ($riderCanSave > 0) {
                                    $canSaveYes = 0;
                                    foreach ($chartData['riderAnalysis']['can_save'] as $key => $val) {
                                        if (stripos($key, 'yes') !== false || stripos($key, 'regular') !== false || stripos($key, 'sometimes') !== false) {
                                            $canSaveYes += $val;
                                        }
                                    }
                                    echo round(($canSaveYes/$riderCanSave)*100, 1);
                                } else {
                                    echo 0;
                                }
                                ?>%
                            </div>
                            <small class="text-muted">Can save from earnings (regularly or sometimes)</small>
                        </div>
                        
                        <div class="insight-item">
                            <div class="insight-label">Safety Concerns Reported</div>
                            <div class="insight-value"><?php echo $chartData['riderAnalysis']['safety_concerns'] ?? 0; ?></div>
                            <small class="text-muted">Riders experiencing safety issues</small>
                        </div>
                        
                        <?php if (!empty($chartData['riderAnalysis']['doorstep_pickup_feeling'])): ?>
                        <div class="insight-item">
                            <div class="insight-label">🔥 Positive About Doorstep Pickup</div>
                            <div class="insight-value">
                                <?php 
                                $doorstepTotal = array_sum($chartData['riderAnalysis']['doorstep_pickup_feeling']);
                                if ($doorstepTotal > 0) {
                                    $positive = 0;
                                    foreach ($chartData['riderAnalysis']['doorstep_pickup_feeling'] as $key => $val) {
                                        if (stripos($key, 'good') !== false || stripos($key, 'great') !== false || stripos($key, 'positive') !== false || stripos($key, 'yes') !== false) {
                                            $positive += $val;
                                        }
                                    }
                                    echo round(($positive/$doorstepTotal)*100, 1);
                                } else {
                                    echo 0;
                                }
                                ?>%
                            </div>
                            <small class="text-muted">Riders open to doorstep bookings</small>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if (!empty($chartData['userAnalysis'])): ?>
                        <div class="insight-item">
                            <div class="insight-label">🔥 Would Switch to Safer Service</div>
                            <div class="insight-value">
                                <?php 
                                $switchTotal = array_sum($chartData['userAnalysis']['would_switch'] ?? []);
                                if ($switchTotal > 0) {
                                    $wouldSwitch = 0;
                                    foreach ($chartData['userAnalysis']['would_switch'] as $key => $val) {
                                        if (stripos($key, 'yes') !== false) {
                                            $wouldSwitch += $val;
                                        }
                                    }
                                    echo round(($wouldSwitch/$switchTotal)*100, 1);
                                } else {
                                    echo 0;
                                }
                                ?>%
                            </div>
                            <small class="text-muted">Users open to safer alternatives</small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Chart.js color palette
        const colors = {
            primary: '#00A551',
            secondary: '#0d6efd',
            danger: '#dc3545',
            warning: '#ffc107',
            info: '#0dcaf0',
            light: '#e9ecef',
            dark: '#212529'
        };

        // Chart data from PHP
        const chartData = <?php echo $chartDataJson; ?>;

        // Survey Type Distribution Pie Chart
        <?php if ($stats['total'] > 0): ?>
        const surveyDistributionCtx = document.getElementById('surveyDistributionChart');
        if (surveyDistributionCtx) {
            new Chart(surveyDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Riders', 'Users'],
                    datasets: [{
                        data: [
                            chartData.surveyTypeDistribution.rider,
                            chartData.surveyTypeDistribution.user
                        ],
                        backgroundColor: [colors.primary, colors.secondary],
                        borderColor: ['#fff', '#fff'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: { family: "'Inter', sans-serif" },
                                padding: 20
                            }
                        }
                    }
                }
            });
        }

        // Submissions Over Time Line Chart
        const submissionsCtx = document.getElementById('submissionsChart');
        if (submissionsCtx) {
            const dates = Object.keys(chartData.submissionsOverTime);
            const counts = Object.values(chartData.submissionsOverTime);
            
            new Chart(submissionsCtx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Submissions',
                        data: counts,
                        borderColor: colors.primary,
                        backgroundColor: 'rgba(0, 165, 81, 0.1)',
                        fill: true,
                        tension: 0.3,
                        borderWidth: 3,
                        pointBackgroundColor: colors.primary,
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1 }
                        }
                    }
                }
            });
        }
        <?php endif; ?>



        // === RIDER CHARTS ===
        
        // Rider Income Chart
        <?php if (!empty($chartData['riderAnalysis']['income'])): ?>
        const riderIncomeCtx = document.getElementById('riderIncomeChart');
        if (riderIncomeCtx) {
            new Chart(riderIncomeCtx, {
                type: 'bar',
                data: {
                    labels: ['Main Income', 'Additional Income'],
                    datasets: [{
                        label: 'Riders',
                        data: [
                            chartData.riderAnalysis.income.main,
                            chartData.riderAnalysis.income.additional
                        ],
                        backgroundColor: [colors.primary, colors.secondary]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Duration
        <?php if (!empty($chartData['riderAnalysis']['riding_duration'])): ?>
        const riderDurationCtx = document.getElementById('riderDurationChart');
        if (riderDurationCtx) {
            new Chart(riderDurationCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['riding_duration'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['riding_duration'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Operating Areas
        <?php if (!empty($chartData['riderAnalysis']['operating_areas'])): ?>
        const riderAreasCtx = document.getElementById('riderAreasChart');
        if (riderAreasCtx) {
            new Chart(riderAreasCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['operating_areas'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['operating_areas'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Best Time
        <?php if (!empty($chartData['riderAnalysis']['best_time'])): ?>
        const riderBestTimeCtx = document.getElementById('riderBestTimeChart');
        if (riderBestTimeCtx) {
            new Chart(riderBestTimeCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['best_time'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['best_time'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Expenses (Horizontal)
        <?php if (!empty($chartData['riderAnalysis']['expenses'])): ?>
        const riderExpensesCtx = document.getElementById('riderExpensesChart');
        if (riderExpensesCtx) {
            new Chart(riderExpensesCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['expenses'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['expenses'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Expense Cost
        <?php if (!empty($chartData['riderAnalysis']['expense_cost'])): ?>
        const riderExpenseCostCtx = document.getElementById('riderExpenseCostChart');
        if (riderExpenseCostCtx) {
            new Chart(riderExpenseCostCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['expense_cost'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['expense_cost'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Earnings Stability
        <?php if (!empty($chartData['riderAnalysis']['earnings_stable'])): ?>
        const riderEarningsCtx = document.getElementById('riderEarningsChart');
        if (riderEarningsCtx) {
            new Chart(riderEarningsCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['earnings_stable'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['earnings_stable'])); ?>,
                        backgroundColor: [colors.primary, colors.secondary, colors.info, colors.warning, colors.danger],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Earnings Difference
        <?php if (!empty($chartData['riderAnalysis']['earnings_difference'])): ?>
        const riderEarningsDiffCtx = document.getElementById('riderEarningsDiffChart');
        if (riderEarningsDiffCtx) {
            new Chart(riderEarningsDiffCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['earnings_difference'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['earnings_difference'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Can Save
        <?php if (!empty($chartData['riderAnalysis']['can_save'])): ?>
        const riderSavingsCtx = document.getElementById('riderSavingsChart');
        if (riderSavingsCtx) {
            new Chart(riderSavingsCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['can_save'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['can_save'])); ?>,
                        backgroundColor: [colors.primary, colors.danger, colors.warning, colors.secondary],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Save Amount
        <?php if (!empty($chartData['riderAnalysis']['save_amount'])): ?>
        const riderSaveAmountCtx = document.getElementById('riderSaveAmountChart');
        if (riderSaveAmountCtx) {
            new Chart(riderSaveAmountCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['save_amount'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['save_amount'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Cannot Save Reason
        <?php if (!empty($chartData['riderAnalysis']['cannot_save_reason'])): ?>
        const riderCannotSaveReasonCtx = document.getElementById('riderCannotSaveReasonChart');
        if (riderCannotSaveReasonCtx) {
            new Chart(riderCannotSaveReasonCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['cannot_save_reason'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['cannot_save_reason'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Work Respect
        <?php if (!empty($chartData['riderAnalysis']['work_respect'])): ?>
        const riderWorkRespectCtx = document.getElementById('riderWorkRespectChart');
        if (riderWorkRespectCtx) {
            new Chart(riderWorkRespectCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['work_respect'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['work_respect'])); ?>,
                        backgroundColor: [colors.primary, colors.secondary, colors.info, colors.warning, colors.danger],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Passenger Contact
        <?php if (!empty($chartData['riderAnalysis']['passenger_contact'])): ?>
        const riderPassengerContactCtx = document.getElementById('riderPassengerContactChart');
        if (riderPassengerContactCtx) {
            new Chart(riderPassengerContactCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['passenger_contact'])); ?>,
                    datasets: [{
                        label: 'Riders',
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['passenger_contact'])); ?>,
                        backgroundColor: colors.primary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Doorstep Pickup (CRITICAL!)
        <?php if (!empty($chartData['riderAnalysis']['doorstep_pickup_feeling'])): ?>
        const riderDoorstepPickupCtx = document.getElementById('riderDoorstepPickupChart');
        if (riderDoorstepPickupCtx) {
            new Chart(riderDoorstepPickupCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['doorstep_pickup_feeling'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['doorstep_pickup_feeling'])); ?>,
                        backgroundColor: [colors.primary, colors.warning, colors.danger, colors.secondary],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Delivery Errands (CRITICAL!)
        <?php if (!empty($chartData['riderAnalysis']['delivery_errands_feeling'])): ?>
        const riderDeliveryErrandsCtx = document.getElementById('riderDeliveryErrandsChart');
        if (riderDeliveryErrandsCtx) {
            new Chart(riderDeliveryErrandsCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['delivery_errands_feeling'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['delivery_errands_feeling'])); ?>,
                        backgroundColor: [colors.primary, colors.warning, colors.danger, colors.secondary],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // Rider Group
        <?php if (!empty($chartData['riderAnalysis']['rider_group'])): ?>
        const riderGroupCtx = document.getElementById('riderGroupChart');
        if (riderGroupCtx) {
            new Chart(riderGroupCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['riderAnalysis']['rider_group'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['riderAnalysis']['rider_group'])); ?>,
                        backgroundColor: [colors.primary, colors.secondary, colors.info, colors.warning, colors.danger],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>

        // Rider Safety Chart
        <?php if (isset($chartData['riderAnalysis']['safety_concerns'])): ?>
        const riderSafetyCtx = document.getElementById('riderSafetyChart');
        if (riderSafetyCtx) {
            const totalRiders = chartData.surveyTypeDistribution.rider;
            const safetyConcerns = chartData.riderAnalysis.safety_concerns;
            
            new Chart(riderSafetyCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Reported Safety Issues', 'No Issues Reported'],
                    datasets: [{
                        data: [safetyConcerns, totalRiders - safetyConcerns],
                        backgroundColor: [colors.danger, colors.primary],
                        borderColor: ['#fff', '#fff'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // === USER CHARTS ===
        
        // User Frequency Chart
        <?php if (!empty($chartData['userAnalysis']['usage_frequency'])): ?>
        const userFrequencyCtx = document.getElementById('userFrequencyChart');
        if (userFrequencyCtx) {
            new Chart(userFrequencyCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['usage_frequency'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['usage_frequency'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Primary Reason
        <?php if (!empty($chartData['userAnalysis']['primary_reason'])): ?>
        const userReasonCtx = document.getElementById('userReasonChart');
        if (userReasonCtx) {
            new Chart(userReasonCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['primary_reason'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['primary_reason'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Usage Time
        <?php if (!empty($chartData['userAnalysis']['usage_time'])): ?>
        const userTimeCtx = document.getElementById('userTimeChart');
        if (userTimeCtx) {
            new Chart(userTimeCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['usage_time'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['usage_time'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Ride Location
        <?php if (!empty($chartData['userAnalysis']['ride_location'])): ?>
        const userLocationCtx = document.getElementById('userLocationChart');
        if (userLocationCtx) {
            new Chart(userLocationCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['ride_location'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['ride_location'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Rider Consistency
        <?php if (!empty($chartData['userAnalysis']['rider_consistency'])): ?>
        const userConsistencyCtx = document.getElementById('userConsistencyChart');
        if (userConsistencyCtx) {
            new Chart(userConsistencyCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['rider_consistency'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['rider_consistency'])); ?>,
                        backgroundColor: [colors.secondary, colors.primary, colors.info, colors.warning],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Find Rider
        <?php if (!empty($chartData['userAnalysis']['find_rider'])): ?>
        const userFindRiderCtx = document.getElementById('userFindRiderChart');
        if (userFindRiderCtx) {
            new Chart(userFindRiderCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['find_rider'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['find_rider'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Struggled
        <?php if (!empty($chartData['userAnalysis']['struggled_rider'])): ?>
        const userStruggledCtx = document.getElementById('userStruggledChart');
        if (userStruggledCtx) {
            new Chart(userStruggledCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['struggled_rider'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['struggled_rider'])); ?>,
                        backgroundColor: [colors.secondary, colors.primary, colors.info, colors.warning],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Difficulty Cause
        <?php if (!empty($chartData['userAnalysis']['difficulty_cause'])): ?>
        const userDifficultyCauseCtx = document.getElementById('userDifficultyCauseChart');
        if (userDifficultyCauseCtx) {
            new Chart(userDifficultyCauseCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['difficulty_cause'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['difficulty_cause'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Fare Agreement
        <?php if (!empty($chartData['userAnalysis']['fare_agreement'])): ?>
        const userFareCtx = document.getElementById('userFareChart');
        if (userFareCtx) {
            new Chart(userFareCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['fare_agreement'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['fare_agreement'])); ?>,
                        backgroundColor: [colors.secondary, colors.primary, colors.info, colors.warning],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Pricing Disagreements
        <?php if (!empty($chartData['userAnalysis']['pricing_disagreements'])): ?>
        const userPricingDisagreementCtx = document.getElementById('userPricingDisagreementChart');
        if (userPricingDisagreementCtx) {
            new Chart(userPricingDisagreementCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['pricing_disagreements'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['pricing_disagreements'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Payment Method
        <?php if (!empty($chartData['userAnalysis']['payment_method'])): ?>
        const userPaymentCtx = document.getElementById('userPaymentChart');
        if (userPaymentCtx) {
            new Chart(userPaymentCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['payment_method'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['payment_method'])); ?>,
                        backgroundColor: [colors.secondary, colors.primary, colors.info, colors.warning],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Safety Feeling
        <?php if (!empty($chartData['userAnalysis']['safety_feeling'])): ?>
        const userSafetyCtx = document.getElementById('userSafetyChart');
        if (userSafetyCtx) {
            new Chart(userSafetyCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['safety_feeling'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['safety_feeling'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Safety Concerns
        <?php if (!empty($chartData['userAnalysis']['safety_concerns'])): ?>
        const userSafetyConcernsCtx = document.getElementById('userSafetyConcernsChart');
        if (userSafetyConcernsCtx) {
            new Chart(userSafetyConcernsCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['safety_concerns'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['safety_concerns'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Help Confidence
        <?php if (!empty($chartData['userAnalysis']['help_confidence'])): ?>
        const userHelpConfidenceCtx = document.getElementById('userHelpConfidenceChart');
        if (userHelpConfidenceCtx) {
            new Chart(userHelpConfidenceCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['help_confidence'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['help_confidence'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Reliability
        <?php if (!empty($chartData['userAnalysis']['reliability'])): ?>
        const userReliabilityCtx = document.getElementById('userReliabilityChart');
        if (userReliabilityCtx) {
            new Chart(userReliabilityCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['reliability'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['reliability'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Experiences
        <?php if (!empty($chartData['userAnalysis']['experiences'])): ?>
        const userExperiencesCtx = document.getElementById('userExperiencesChart');
        if (userExperiencesCtx) {
            new Chart(userExperiencesCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['experiences'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['experiences'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Would Switch (CRITICAL!)
        <?php if (!empty($chartData['userAnalysis']['would_switch'])): ?>
        const userSwitchCtx = document.getElementById('userSwitchChart');
        if (userSwitchCtx) {
            new Chart(userSwitchCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['would_switch'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['would_switch'])); ?>,
                        backgroundColor: [colors.secondary, colors.warning, colors.light],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Age Range
        <?php if (!empty($chartData['userAnalysis']['age_range'])): ?>
        const userAgeCtx = document.getElementById('userAgeChart');
        if (userAgeCtx) {
            new Chart(userAgeCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['age_range'])); ?>,
                    datasets: [{
                        label: 'Users',
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['age_range'])); ?>,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        // User Phone Type
        <?php if (!empty($chartData['userAnalysis']['phone_type'])): ?>
        const userPhoneTypeCtx = document.getElementById('userPhoneTypeChart');
        if (userPhoneTypeCtx) {
            new Chart(userPhoneTypeCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode(array_keys($chartData['userAnalysis']['phone_type'])); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($chartData['userAnalysis']['phone_type'])); ?>,
                        backgroundColor: [colors.secondary, colors.primary, colors.info],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: "'Inter', sans-serif" }, padding: 20 } }
                    }
                }
            });
        }
        <?php endif; ?>
        
        </script>
</body>
</html>