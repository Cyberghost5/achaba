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

// Handle export actions
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $surveyType = $_GET['type'] ?? 'all';
    
    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=survey_responses_' . $surveyType . '_' . date('Y-m-d') . '.csv');
    
    $output = fopen('php://output', 'w');
    
    // Add BOM for proper Excel UTF-8 encoding
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // CSV Headers
    fputcsv($output, ['ID', 'Survey Type', 'Full Name', 'Email', 'Phone', 'Submitted At', 'IP Address']);
    
    // Query
    if ($surveyType === 'all') {
        $stmt = $conn->query("SELECT * FROM survey_responses ORDER BY submitted_at DESC");
    } else {
        $stmt = $conn->prepare("SELECT * FROM survey_responses WHERE survey_type = :type ORDER BY submitted_at DESC");
        $stmt->execute(['type' => $surveyType]);
    }
    
    while ($row = $stmt->fetch()) {
        fputcsv($output, [
            $row['id'],
            ucfirst($row['survey_type']),
            $row['full_name'],
            $row['email'],
            $row['phone'],
            $row['submitted_at'],
            $row['ip_address']
        ]);
    }
    
    fclose($output);
    exit;
}

// Get filter type
$filterType = $_GET['filter'] ?? 'all';

// Get statistics
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

// Get survey responses based on filter
if ($filterType === 'all') {
    $stmt = $conn->query("SELECT * FROM survey_responses ORDER BY submitted_at DESC");
} else {
    $stmt = $conn->prepare("SELECT * FROM survey_responses WHERE survey_type = :type ORDER BY submitted_at DESC");
    $stmt->execute(['type' => $filterType]);
}

$responses = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Responses - Admin | Achaba</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        
        .stat-card {
            border-left: 4px solid #00A551;
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .table-responsive {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .btn-view {
            padding: 4px 12px;
            font-size: 0.875rem;
        }
        
        .badge-rider {
            background-color: #00A551;
        }
        
        .badge-user {
            background-color: #0d6efd;
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                background: white;
            }
        }
        
        .response-detail {
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .response-item {
            border-bottom: 1px solid #e9ecef;
            padding: 12px 0;
        }
        
        .response-item:last-child {
            border-bottom: none;
        }
        
        .response-question {
            font-weight: 600;
            color: #495057;
            margin-bottom: 4px;
        }
        
        .response-answer {
            color: #212529;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark no-print">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <i class="fas fa-poll me-2"></i>Survey Admin
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="partners">Partners</a>
                <a class="nav-link" href="waitlists">Waitlist</a>
                <a class="nav-link active" href="surveys">Survey</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="row mb-4 no-print">
            <div class="col">
                <h2 class="mb-0"><i class="fas fa-poll-h me-2"></i>Survey Responses</h2>
                <p class="text-muted">View and manage survey submissions</p>
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

        <!-- Filter and Export Controls -->
        <div class="row mb-3 no-print">
            <div class="col-md-6">
                <div class="btn-group" role="group">
                    <a href="?filter=all" class="btn <?php echo $filterType === 'all' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        All Responses
                    </a>
                    <a href="?filter=rider" class="btn <?php echo $filterType === 'rider' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        Riders
                    </a>
                    <a href="?filter=user" class="btn <?php echo $filterType === 'user' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        Users
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <a href="?export=csv&type=<?php echo $filterType; ?>" class="btn btn-success">
                    <i class="fas fa-file-csv me-2"></i>Export CSV
                </a>
                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="fas fa-print me-2"></i>Print
                </button>
            </div>
        </div>

        <!-- Responses Table -->
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Submitted</th>
                                <th class="no-print">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($responses)): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-0">No survey responses yet</p>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($responses as $response): ?>
                                    <tr>
                                        <td><?php echo $response['id']; ?></td>
                                        <td>
                                            <span class="badge <?php echo $response['survey_type'] === 'rider' ? 'badge-rider' : 'badge-user'; ?>">
                                                <?php echo ucfirst($response['survey_type']); ?>
                                            </span>
                                        </td>
                                        <td><?php echo htmlspecialchars($response['full_name']); ?></td>
                                        <td><?php echo htmlspecialchars($response['email']); ?></td>
                                        <td><?php echo htmlspecialchars($response['phone']); ?></td>
                                        <td><?php echo date('M d, Y g:i A', strtotime($response['submitted_at'])); ?></td>
                                        <td class="no-print">
                                            <button class="btn btn-sm btn-primary btn-view" 
                                                    onclick="viewResponse(<?php echo $response['id']; ?>)">
                                                <i class="fas fa-eye me-1"></i>View Details
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if (!empty($responses)): ?>
            <div class="row mt-3 no-print">
                <div class="col-12">
                    <p class="text-muted text-center">
                        Showing <?php echo count($responses); ?> response(s)
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Response Detail Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Survey Response Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body response-detail" id="responseContent">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        async function viewResponse(id) {
            const modal = new bootstrap.Modal(document.getElementById('responseModal'));
            const content = document.getElementById('responseContent');
            
            // Show loading spinner
            content.innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `;
            
            modal.show();
            
            try {
                const response = await fetch(`get_survey_response.php?id=${id}`);
                const data = await response.json();
                
                if (data.success) {
                    content.innerHTML = formatResponseDetail(data.response);
                } else {
                    content.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            ${data.message || 'Failed to load response'}
                        </div>
                    `;
                }
            } catch (error) {
                content.innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Error loading response details
                    </div>
                `;
            }
        }
        
        function formatResponseDetail(data) {
            let html = `
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="text-muted mb-2">Survey Information</h6>
                    <p class="mb-1"><strong>Type:</strong> <span class="badge ${data.survey_type === 'rider' ? 'badge-rider' : 'badge-user'}">${data.survey_type.toUpperCase()}</span></p>
                    <p class="mb-1"><strong>Full Name:</strong> ${data.full_name}</p>
                    <p class="mb-1"><strong>Email:</strong> ${data.email}</p>
                    <p class="mb-1"><strong>Phone:</strong> ${data.phone}</p>
                    <p class="mb-1"><strong>Submitted:</strong> ${data.submitted_at}</p>
                    <p class="mb-0"><strong>IP Address:</strong> ${data.ip_address}</p>
                </div>
                
                <div>
                    <h6 class="text-muted mb-3">Survey Responses</h6>
            `;
            
            const responses = JSON.parse(data.responses);
            
            if (data.survey_type === 'rider') {
                // Questions 1-7
                const simpleQuestions = [
                    "How long have you been riding motorcycles for work?",
                    "Is this your main source of income? What else do you do?",
                    "Which areas in Bauchi do you mostly operate in?",
                    "Walk me through a typical workday, from when you start to when you stop.",
                    "What time of day is usually best for you? Why?",
                    "What usually makes a day go badly?",
                    "On a good day, what makes you feel satisfied with your work?"
                ];
                
                for (let i = 1; i <= 7; i++) {
                    const answer = responses[`q${i}`] || 'No answer provided';
                    html += `
                        <div class="response-item">
                            <div class="response-question">${i}. ${simpleQuestions[i-1]}</div>
                            <div class="response-answer">${answer}</div>
                        </div>
                    `;
                }
                
                // Question 8: Multi-part expenses
                html += `
                    <div class="response-item">
                        <div class="response-question">8. What are your biggest daily or weekly expenses?</div>
                        <div class="response-answer">
                            <strong>Expense Types:</strong> ${responses.q8_expenses && responses.q8_expenses.length > 0 ? responses.q8_expenses.join(', ') : 'None selected'}<br>
                            ${responses.q8_other_specify ? `<strong>Other:</strong> ${responses.q8_other_specify}<br>` : ''}
                            <strong>Estimated Total Cost:</strong> ${responses.q8_cost || 'Not provided'}
                        </div>
                    </div>
                `;
                
                // Question 9: Multi-part earnings stability
                html += `
                    <div class="response-item">
                        <div class="response-question">9. Do your earnings change a lot from week to week?</div>
                        <div class="response-answer">
                            <strong>Answer:</strong> ${responses.q9 || 'Not provided'}<br>
                            ${responses.q9_followup ? `<strong>Difference between good/bad week:</strong> ${responses.q9_followup}` : ''}
                        </div>
                    </div>
                `;
                
                // Question 10: Multi-part savings
                html += `
                    <div class="response-item">
                        <div class="response-question">10. Are you usually able to save anything?</div>
                        <div class="response-answer">
                            <strong>Answer:</strong> ${responses.q10 || 'Not provided'}<br>
                            ${responses.q10_amount ? `<strong>Amount saved:</strong> ${responses.q10_amount}<br>` : ''}
                            ${responses.q10_reason ? `<strong>Reason for not saving:</strong> ${responses.q10_reason}` : ''}
                        </div>
                    </div>
                `;
                
                // Questions 11-24
                const remainingQuestions = [
                    "Have you ever felt unsafe or uncomfortable while working? What happened?",
                    "Which types of passengers or trips are most difficult for you?",
                    "What do you personally do to stay safe?",
                    "Do you feel this work is respected in your community? Why or why not?",
                    "How do passengers usually find or contact you?",
                    "How important is your phone to your work?",
                    "Are there things your phone cannot do that limit your work?",
                    "If passengers could book you to come pick them from inside streets, how would you feel about that?",
                    "How would you feel about pickup-only errands where the customer has already paid the vendor?",
                    "What would make you trust or distrust such a system?",
                    "Are you part of any rider group or association? How does it help?",
                    "What would make this work more secure or dignified for you?",
                    "If a company wanted to genuinely support riders in Bauchi, where should they start?",
                    "Is there anything important about your work we haven't talked about?"
                ];
                
                for (let i = 11; i <= 24; i++) {
                    const answer = responses[`q${i}`] || 'No answer provided';
                    html += `
                        <div class="response-item">
                            <div class="response-question">${i}. ${remainingQuestions[i-11]}</div>
                            <div class="response-answer">${answer}</div>
                        </div>
                    `;
                }
            } else {
                // User questions - Updated structure
                const userQuestions = {
                    // Section 1: Usage Pattern
                    'usage_frequency': 'How often do you use motorcycle transport?',
                    'primary_reason': 'What is your primary reason for using motorcycle transport?',
                    
                    // Section 2: Usage Behaviour
                    'usage_time': 'When do you most often use motorcycle transport?',
                    'ride_location': 'Where do you usually get motorcycle rides?',
                    'rider_consistency': 'Do you usually ride with the same rider or different riders?',
                    
                    // Section 3: Booking & Communication Patterns
                    'find_rider': 'How do you usually find or contact a rider?',
                    'struggled_rider': 'Have you ever struggled to find a rider when needed?',
                    'difficulty_cause': 'What usually causes this difficulty?',
                    
                    // Section 4: Pricing & Payment Experience
                    'fare_agreement': 'Do you usually agree on fare before the trip?',
                    'pricing_disagreements': 'Have you experienced disagreements over pricing?',
                    'payment_method': 'What payment method do you usually use?',
                    
                    // Section 5: Safety & Trust Perception
                    'safety_feeling': 'How do you generally feel about your safety using motorcycles?',
                    'safety_concerns': 'What safety concerns do you have?',
                    'help_confidence': 'If something goes wrong, how confident are you in getting help?',
                    
                    // Section 6: Reliability & Experience Quality
                    'reliability': 'How would you rate the reliability of motorcycle transport?',
                    'experiences': 'Have you had any memorable experiences (good or bad)?',
                    
                    // Section 7: Reflection & Expectations
                    'frustration': 'What frustrates you most about the current experience?',
                    'improvement': 'What would improve your experience with motorcycles?',
                    'would_switch': 'Would you switch to a safer, more reliable option if available?',
                    
                    // Section 8: Demographics (Optional)
                    'age_range': 'What is your age range?',
                    'phone_type': 'What type of phone do you use?'
                };
                
                let questionNum = 1;
                for (const [key, question] of Object.entries(userQuestions)) {
                    let answer = responses[key] || 'No answer provided';
                    
                    html += `
                        <div class="response-item">
                            <div class="response-question">${questionNum}. ${question}</div>
                            <div class="response-answer">${answer}</div>
                        </div>
                    `;
                    questionNum++;
                }
            }
            
            html += '</div>';
            return html;
        }
    </script>
</body>
</html>
