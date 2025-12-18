<?php
session_start();

// Simple authentication (you can improve this)
$admin_password = 'achaba2025'; // Change this!

if (!isset($_SESSION['prd_admin_logged_in'])) {
    if (isset($_POST['admin_password'])) {
        if ($_POST['admin_password'] === $admin_password) {
            $_SESSION['prd_admin_logged_in'] = true;
        } else {
            $error = "Invalid password";
        }
    }
    
    if (!isset($_SESSION['prd_admin_logged_in'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Login - PRD Requests</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
            <div class="container">
                <div class="row justify-content-center align-items-center min-vh-100">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body p-4">
                                <h4 class="text-center mb-4">Admin Login</h4>
                                <p>Please enter the admin password to access PRD requests. Go back to <a href="../">home</a>.</p>
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="admin_password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Include database configuration
require_once 'config/database.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    die('Database connection failed');
}

// Get statistics
$total_requests = $conn->query("SELECT COUNT(*) as count FROM prd_requests")->fetch()['count'];
$sent_count = $conn->query("SELECT COUNT(*) as count FROM prd_requests WHERE prd_sent = 1")->fetch()['count'];
$pending_count = $total_requests - $sent_count;

// Get all requests
$result = $conn->query("SELECT * FROM prd_requests ORDER BY request_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRD Requests Admin - Achaba</title>
    
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
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #00A551;
        }
        
        .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        
        .badge-sent {
            background-color: #00A551;
        }
        
        .badge-pending {
            background-color: #ffc107;
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
        
        .btn-outline-light:hover,
        .btn-outline-light:focus,
        .btn-outline-light:active,
        .btn-outline-light.active {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border-color: white !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">
                <i class="fas fa-file-alt me-2"></i>PRD Requests Admin Panel
            </span>
            <div>
                <a href="./" class="btn btn-outline-light btn-sm me-2">
                    <i class="fas fa-home me-1"></i>Home
                </a>
                <a href="?logout=1" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: prd-requests');
        exit;
    }
    ?>

    <div class="container py-5">
        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number"><?php echo $total_requests; ?></div>
                    <div class="stats-label">Total Requests</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number text-warning"><?php echo $pending_count; ?></div>
                    <div class="stats-label">Pending</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number text-success"><?php echo $sent_count; ?></div>
                    <div class="stats-label">PRD Sent</div>
                </div>
            </div>
        </div>

        <!-- Export Buttons -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">All Requests</h2>
                <div>
                    <a href="export-prd-requests.php?format=csv" class="btn btn-success">
                        <i class="fas fa-file-csv me-2"></i>Export CSV
                    </a>
                    <a href="export-prd-requests.php?format=pdf" class="btn btn-danger">
                        <i class="fas fa-file-pdf me-2"></i>Export PDF
                    </a>
                </div>
            </div>
        </div>

        <!-- Requests Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>PRD Sent Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->rowCount() > 0): ?>
                            <?php while($row = $result->fetch()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo date('M d, Y H:i', strtotime($row['request_date'])); ?></td>
                                    <td>
                                        <?php if ($row['prd_sent']): ?>
                                            <span class="badge badge-sent">Sent</span>
                                        <?php else: ?>
                                            <span class="badge badge-pending">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo $row['prd_sent_date'] 
                                            ? date('M d, Y H:i', strtotime($row['prd_sent_date'])) 
                                            : '-'; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (!$row['prd_sent']): ?>
                                            <button class="btn btn-sm btn-success" onclick="sendPRD(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['email'], ENT_QUOTES); ?>')">
                                                <i class="fas fa-paper-plane me-1"></i>Send PRD
                                            </button>
                                        <?php else: ?>
                                            <span class="text-muted"><i class="fas fa-check-circle me-1"></i>Sent</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No PRD requests yet.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        async function sendPRD(id, email) {
            if (!confirm(`Send PRD to ${email}?\n\nThis will email the PRD.pdf file and mark the request as sent.`)) {
                return;
            }
            
            // Show loading state
            const button = event.target.closest('button');
            const originalHTML = button.innerHTML;
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Sending...';
            
            try {
                const response = await fetch('send-prd-email.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}`
                });
                
                const data = await response.json();
                
                if (data.success) {
                    alert('✅ ' + data.message);
                    location.reload();
                } else {
                    alert('❌ Error: ' + data.message);
                    button.disabled = false;
                    button.innerHTML = originalHTML;
                }
            } catch (error) {
                alert('❌ Connection error. Please try again.');
                button.disabled = false;
                button.innerHTML = originalHTML;
            }
        }
        
        // Keep the old function for backward compatibility
        async function markAsSent(id) {
            if (!confirm('Mark this request as sent?')) {
                return;
            }
            
            try {
                const response = await fetch('update-prd-status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}&status=sent`
                });
                
                const data = await response.json();
                
                if (data.success) {
                    alert('Status updated successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            } catch (error) {
                alert('Connection error. Please try again.');
            }
        }
    </script>
</body>
</html>
<?php
// $conn->close();
?>
