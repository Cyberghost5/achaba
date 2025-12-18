<?php
session_start();

// Simple authentication check
if (!isset($_SESSION['prd_admin_logged_in'])) {
    header('HTTP/1.1 403 Forbidden');
    die('Access denied');
}

require_once 'config/database.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    die('Database connection failed');
}

if (!isset($_GET['format']) || !in_array($_GET['format'], ['csv', 'pdf'])) {
    die('Invalid format');
}

$format = $_GET['format'];

// Get all requests
$result = $conn->query("SELECT * FROM prd_requests ORDER BY request_date DESC");

if ($format === 'csv') {
    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=prd_requests_' . date('Y-m-d') . '.csv');
    
    // Create output stream
    $output = fopen('php://output', 'w');
    
    // Add BOM for proper UTF-8 encoding in Excel
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // Add CSV headers
    fputcsv($output, ['ID', 'Email', 'Request Date', 'Status', 'PRD Sent Date', 'Created At']);
    
    // Add data rows
    while ($row = $result->fetch()) {
        fputcsv($output, [
            $row['id'],
            $row['email'],
            $row['request_date'],
            $row['prd_sent'] ? 'Sent' : 'Pending',
            $row['prd_sent_date'] ?? '-',
            $row['created_at']
        ]);
    }
    
    fclose($output);
    
} elseif ($format === 'pdf') {
    // For PDF, we'll use a simple HTML to PDF approach
    // You can enhance this with libraries like TCPDF or FPDF
    
    require_once __DIR__ . '/vendor/autoload.php';
    
    // Check if TCPDF is available
    if (class_exists('TCPDF')) {
        // Create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Set document information
        $pdf->SetCreator('Achaba');
        $pdf->SetAuthor('Achaba');
        $pdf->SetTitle('PRD Requests Report');
        $pdf->SetSubject('PRD Requests');
        
        // Set default header data
        $pdf->SetHeaderData('', 0, 'Achaba PRD Requests', date('F d, Y'));
        
        // Set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // Add a page
        $pdf->AddPage();
        
        // Set font
        $pdf->SetFont('helvetica', '', 10);
        
        // Build HTML content
        $html = '<h2 style="color: #00A551;">PRD Requests Report</h2>';
        $html .= '<p>Generated: ' . date('F d, Y H:i:s') . '</p>';
        $html .= '<table border="1" cellpadding="4" cellspacing="0">
            <thead>
                <tr style="background-color: #00A551; color: white;">
                    <th>ID</th>
                    <th>Email</th>
                    <th>Request Date</th>
                    <th>Status</th>
                    <th>PRD Sent Date</th>
                </tr>
            </thead>
            <tbody>';
        
        // Fetch all rows for PDF (PDO doesn't have data_seek)
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . htmlspecialchars($row['email']) . '</td>
                <td>' . date('M d, Y H:i', strtotime($row['request_date'])) . '</td>
                <td>' . ($row['prd_sent'] ? 'Sent' : 'Pending') . '</td>
                <td>' . ($row['prd_sent_date'] ? date('M d, Y H:i', strtotime($row['prd_sent_date'])) : '-') . '</td>
            </tr>';
        }
        
        $html .= '</tbody></table>';
        
        // Print text using writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // Close and output PDF document
        $pdf->Output('prd_requests_' . date('Y-m-d') . '.pdf', 'D');
        
    } else {
        // Fallback: Generate a simple HTML page that can be printed as PDF
        header('Content-Type: text/html; charset=utf-8');
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>PRD Requests Report</title>
            <style>
                body { font-family: Arial, sans-serif; padding: 20px; }
                h2 { color: #00A551; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
                th { background-color: #00A551; color: white; }
                tr:nth-child(even) { background-color: #f2f2f2; }
                .print-btn { margin: 20px 0; padding: 10px 20px; background: #00A551; color: white; border: none; cursor: pointer; border-radius: 5px; }
                @media print { .print-btn { display: none; } }
            </style>
        </head>
        <body>
            <button class="print-btn" onclick="window.print()">Print as PDF</button>
            <h2>Achaba PRD Requests Report</h2>
            <p><strong>Generated:</strong> <?php echo date('F d, Y H:i:s'); ?></p>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>PRD Sent Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Get fresh results for HTML fallback
                    $result = $conn->query("SELECT * FROM prd_requests ORDER BY request_date DESC");
                    while ($row = $result->fetch()): 
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo date('M d, Y H:i', strtotime($row['request_date'])); ?></td>
                            <td><?php echo $row['prd_sent'] ? 'Sent' : 'Pending'; ?></td>
                            <td><?php echo $row['prd_sent_date'] ? date('M d, Y H:i', strtotime($row['prd_sent_date'])) : '-'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <script>
                // Auto-print option
                // window.onload = function() { window.print(); }
            </script>
        </body>
        </html>
        <?php
    }
}
?>
