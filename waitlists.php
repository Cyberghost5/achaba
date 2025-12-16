<?php
// Include database configuration
require_once __DIR__ . '/config/database.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    die("Database connection failed");
}

// Handle export requests
if (isset($_GET['export'])) {
    $export_type = $_GET['export'];
    
    // Fetch all waitlist subscribers
    $stmt = $conn->prepare("SELECT * FROM waitlist_subscribers ORDER BY subscribed_at DESC");
    $stmt->execute();
    $waitlist = $stmt->fetchAll();
    
    if ($export_type === 'csv') {
        // CSV Export
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="waitlist_subscribers_' . date('Y-m-d') . '.csv"');
        
        $output = fopen('php://output', 'w');
        
        // Add CSV headers
        fputcsv($output, ['ID', 'Email', 'Subscribed At', 'IP Address', 'Status']);
        
        // Add data rows
        foreach ($waitlist as $subscriber) {
            fputcsv($output, [
                $subscriber['id'],
                $subscriber['email'],
                $subscriber['subscribed_at'],
                $subscriber['ip_address'],
                $subscriber['status']
            ]);
        }
        
        fclose($output);
        exit;
    }
    
    if ($export_type === 'pdf') {
        // Simple HTML to PDF (browser print)
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Waitlist Subscribers Report</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { color: #00A551; text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { padding: 10px; border: 1px solid #ddd; text-align: left; font-size: 12px; }
                th { background-color: #00A551; color: white; }
                tr:nth-child(even) { background-color: #f9f9f9; }
                .header { text-align: center; margin-bottom: 20px; }
                .date { color: #666; font-size: 14px; }
                @media print {
                    .no-print { display: none; }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Waitlist Subscribers Report</h1>
                <p class="date">Generated on: <?php echo date('F d, Y h:i A'); ?></p>
                <p class="date">Total Records: <?php echo count($waitlist); ?></p>
            </div>
            <button class="no-print" onclick="window.print()" style="padding: 10px 20px; background: #00A551; color: white; border: none; cursor: pointer; margin-bottom: 20px;">Print / Save as PDF</button>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Subscribed At</th>
                        <th>IP Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($waitlist as $subscriber): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($subscriber['id']); ?></td>
                        <td><?php echo htmlspecialchars($subscriber['email']); ?></td>
                        <td><?php echo date('M d, Y h:i A', strtotime($subscriber['subscribed_at'])); ?></td>
                        <td><?php echo htmlspecialchars($subscriber['ip_address']); ?></td>
                        <td><?php echo ucfirst($subscriber['status']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </body>
        </html>
        <?php
        exit;
    }
}

// Fetch waitlist for display
$stmt = $conn->prepare("SELECT * FROM waitlist_subscribers ORDER BY subscribed_at DESC");
$stmt->execute();
$waitlist = $stmt->fetchAll();

// Get statistics
$total_subscribers = count($waitlist);
$active_subscribers = count(array_filter($waitlist, fn($w) => $w['status'] === 'active'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waitlist Subscribers - Achaba Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-green: #00A551;
        }
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: var(--primary-green) !important;
        }
        .stats-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stats-icon {
            font-size: 2rem;
            color: var(--primary-green);
        }
        .table-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .btn-primary:hover {
            background-color: #008F46;
            border-color: #008F46;
        }
        .badge-active {
            background-color: #28a745;
        }
        .badge-inactive {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                <i class="fas fa-list-alt me-2"></i>Achaba Admin - Waitlist Subscribers
            </span>
            <a href="partners" class="btn btn-light btn-sm">
                <i class="fas fa-handshake me-2"></i>View Partners
            </a>
            <a href="surveys" class="btn btn-light btn-sm">
                <i class="fas fa-poll me-2"></i>View Surveys
            </a>
        </div>
    </nav>

    <div class="container">
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0">Total Subscribers</h6>
                            <h2 class="mb-0"><?php echo $total_subscribers; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-3">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0">Active Subscribers</h6>
                            <h2 class="mb-0"><?php echo $active_subscribers; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Export Buttons -->
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h4>All Waitlist Subscribers</h4>
            <div>
                <a href="?export=csv" class="btn btn-success">
                    <i class="fas fa-file-csv me-2"></i>Export CSV
                </a>
                <a href="?export=pdf" class="btn btn-danger ms-2" target="_blank">
                    <i class="fas fa-file-pdf me-2"></i>Export PDF
                </a>
            </div>
        </div>

        <!-- Data Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Subscribed At</th>
                            <th>IP Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($waitlist)): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                No waitlist subscribers yet
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($waitlist as $subscriber): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($subscriber['id']); ?></td>
                            <td><?php echo htmlspecialchars($subscriber['email']); ?></td>
                            <td><?php echo date('M d, Y h:i A', strtotime($subscriber['subscribed_at'])); ?></td>
                            <td><?php echo htmlspecialchars($subscriber['ip_address']); ?></td>
                            <td>
                                <span class="badge <?php echo $subscriber['status'] === 'active' ? 'badge-active' : 'badge-inactive'; ?>">
                                    <?php echo ucfirst($subscriber['status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
