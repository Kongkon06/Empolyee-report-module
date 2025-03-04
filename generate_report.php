<?php
require_once 'tcpdf/tcpdf.php';
require 'db_connect.php';

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$query = $pdo->query("SELECT department, COUNT(*) as employees, AVG(satisfaction_score) as avg_satisfaction FROM employees GROUP BY department");
$data = $query->fetchAll();

$html = '<h2>HR Metrics Report</h2><table border="1"><tr><th>Department</th><th>Employees</th><th>Avg Satisfaction Score</th></tr>';
foreach ($data as $row) {
    $html .= "<tr><td>{$row['department']}</td><td>{$row['employees']}</td><td>{$row['avg_satisfaction']}</td></tr>";
}
$html .= '</table>';

$pdf->writeHTML($html);
$pdf->Output('hr_report.pdf', 'D');
?>

