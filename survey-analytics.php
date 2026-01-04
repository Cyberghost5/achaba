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
        // Analyze rider-specific questions
        if (!isset($riderDataMap['income'])) {
            $riderDataMap['income'] = ['main' => 0, 'additional' => 0];
            $riderDataMap['safety_concerns'] = 0;
            $riderDataMap['can_save'] = ['yes' => 0, 'no' => 0];
            $riderDataMap['earnings_stable'] = ['yes' => 0, 'no' => 0];
        }
        
        if (isset($responseData['q2'])) {
            if (stripos($responseData['q2'], 'only') !== false || stripos($responseData['q2'], 'main') !== false) {
                $riderDataMap['income']['main']++;
            } else {
                $riderDataMap['income']['additional']++;
            }
        }
        
        if (isset($responseData['q11']) && !empty($responseData['q11'])) {
            $riderDataMap['safety_concerns']++;
        }
        
        if (isset($responseData['q10'])) {
            if (strtolower($responseData['q10']) === 'yes') {
                $riderDataMap['can_save']['yes']++;
            } else {
                $riderDataMap['can_save']['no']++;
            }
        }
        
        if (isset($responseData['q9'])) {
            if (strtolower($responseData['q9']) === 'yes') {
                $riderDataMap['earnings_stable']['yes']++;
            } else {
                $riderDataMap['earnings_stable']['no']++;
            }
        }
    } else {
        // Analyze user-specific questions
        if (!isset($userDataMap['usage_frequency'])) {
            $userDataMap['usage_frequency'] = [];
            $userDataMap['safety_feeling'] = [];
            $userDataMap['would_switch'] = ['yes' => 0, 'no' => 0];
            $userDataMap['had_difficulties'] = ['yes' => 0, 'no' => 0];
        }
        
        if (isset($responseData['usage_frequency'])) {
            $freq = $responseData['usage_frequency'];
            if (!isset($userDataMap['usage_frequency'][$freq])) {
                $userDataMap['usage_frequency'][$freq] = 0;
            }
            $userDataMap['usage_frequency'][$freq]++;
        }
        
        if (isset($responseData['safety_feeling'])) {
            $safety = $responseData['safety_feeling'];
            if (!isset($userDataMap['safety_feeling'][$safety])) {
                $userDataMap['safety_feeling'][$safety] = 0;
            }
            $userDataMap['safety_feeling'][$safety]++;
        }
        
        if (isset($responseData['would_switch'])) {
            $switch = strtolower($responseData['would_switch']) === 'yes' ? 'yes' : 'no';
            $userDataMap['would_switch'][$switch]++;
        }
        
        if (isset($responseData['struggled_rider']) && !empty($responseData['struggled_rider'])) {
            $switch = strtolower($responseData['struggled_rider']) === 'yes' ? 'yes' : 'no';
            $userDataMap['had_difficulties'][$switch]++;
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
                <a class="nav-link" href="partners">Partners</a>
                <a class="nav-link" href="waitlists">Waitlist</a>
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
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Primary Income Source</div>
                        <canvas id="riderIncomeChart"></canvas>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Ability to Save</div>
                        <canvas id="riderSavingsChart"></canvas>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Earnings Stability</div>
                        <canvas id="riderEarningsChart"></canvas>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Safety Concerns</div>
                        <canvas id="riderSafetyChart"></canvas>
                    </div>
                </div>
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
                
                <?php if (!empty($chartData['userAnalysis']['usage_frequency'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Usage Frequency</div>
                        <canvas id="userFrequencyChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($chartData['userAnalysis']['safety_feeling'])): ?>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Safety Perception</div>
                        <canvas id="userSafetyChart"></canvas>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Would Switch to Safer Option</div>
                        <canvas id="userSwitchChart"></canvas>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="chart-container">
                        <div class="chart-title">Struggled to Find Rider</div>
                        <canvas id="userDifficultiesChart"></canvas>
                    </div>
                </div>
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
                                $riderTotal = ($chartData['riderAnalysis']['can_save']['yes'] ?? 0) + ($chartData['riderAnalysis']['can_save']['no'] ?? 0);
                                echo $riderTotal > 0 ? round((($chartData['riderAnalysis']['can_save']['yes'] ?? 0)/$riderTotal)*100, 1) : 0;
                                ?>%
                            </div>
                            <small class="text-muted">Can save from earnings</small>
                        </div>
                        
                        <div class="insight-item">
                            <div class="insight-label">Safety Concerns Reported</div>
                            <div class="insight-value"><?php echo $chartData['riderAnalysis']['safety_concerns'] ?? 0; ?></div>
                            <small class="text-muted">Riders experiencing safety issues</small>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($chartData['userAnalysis'])): ?>
                        <div class="insight-item">
                            <div class="insight-label">Would Switch Services</div>
                            <div class="insight-value">
                                <?php 
                                $userTotal = ($chartData['userAnalysis']['would_switch']['yes'] ?? 0) + ($chartData['userAnalysis']['would_switch']['no'] ?? 0);
                                echo $userTotal > 0 ? round((($chartData['userAnalysis']['would_switch']['yes'] ?? 0)/$userTotal)*100, 1) : 0;
                                ?>%
                            </div>
                            <small class="text-muted">Open to safer alternatives</small>
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

        // Rider Savings Chart
        <?php if (!empty($chartData['riderAnalysis']['can_save'])): ?>
        const riderSavingsCtx = document.getElementById('riderSavingsChart');
        if (riderSavingsCtx) {
            new Chart(riderSavingsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Can Save', 'Cannot Save'],
                    datasets: [{
                        data: [
                            chartData.riderAnalysis.can_save.yes,
                            chartData.riderAnalysis.can_save.no
                        ],
                        backgroundColor: [colors.primary, colors.danger],
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

        // Rider Earnings Stability Chart
        <?php if (!empty($chartData['riderAnalysis']['earnings_stable'])): ?>
        const riderEarningsCtx = document.getElementById('riderEarningsChart');
        if (riderEarningsCtx) {
            new Chart(riderEarningsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Stable Earnings', 'Variable Earnings'],
                    datasets: [{
                        data: [
                            chartData.riderAnalysis.earnings_stable.no,
                            chartData.riderAnalysis.earnings_stable.yes
                        ],
                        backgroundColor: [colors.primary, colors.warning],
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

        // User Frequency Chart
        <?php if (!empty($chartData['userAnalysis']['usage_frequency'])): ?>
        const userFrequencyCtx = document.getElementById('userFrequencyChart');
        if (userFrequencyCtx) {
            const freqLabels = Object.keys(chartData.userAnalysis.usage_frequency);
            const freqData = Object.values(chartData.userAnalysis.usage_frequency);
            
            new Chart(userFrequencyCtx, {
                type: 'bar',
                data: {
                    labels: freqLabels,
                    datasets: [{
                        label: 'Users',
                        data: freqData,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>

        // User Safety Chart
        <?php if (!empty($chartData['userAnalysis']['safety_feeling'])): ?>
        const userSafetyCtx = document.getElementById('userSafetyChart');
        if (userSafetyCtx) {
            const safetyLabels = Object.keys(chartData.userAnalysis.safety_feeling);
            const safetyData = Object.values(chartData.userAnalysis.safety_feeling);
            
            new Chart(userSafetyCtx, {
                type: 'bar',
                data: {
                    labels: safetyLabels,
                    datasets: [{
                        label: 'Users',
                        data: safetyData,
                        backgroundColor: colors.secondary
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        }
        <?php endif; ?>

        // User Switch Chart
        <?php if (!empty($chartData['userAnalysis']['would_switch'])): ?>
        const userSwitchCtx = document.getElementById('userSwitchChart');
        if (userSwitchCtx) {
            new Chart(userSwitchCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Would Switch', 'Would Not Switch'],
                    datasets: [{
                        data: [
                            chartData.userAnalysis.would_switch.yes,
                            chartData.userAnalysis.would_switch.no
                        ],
                        backgroundColor: [colors.secondary, colors.light],
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

        // User Difficulties Chart
        <?php if (!empty($chartData['userAnalysis']['had_difficulties'])): ?>
        const userDifficultiesCtx = document.getElementById('userDifficultiesChart');
        if (userDifficultiesCtx) {
            new Chart(userDifficultiesCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Had Difficulties', 'No Difficulties'],
                    datasets: [{
                        data: [
                            chartData.userAnalysis.had_difficulties.yes,
                            chartData.userAnalysis.had_difficulties.no
                        ],
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
        </script>
</body>
</html>