<?php
require_once 'tcpdf/tcpdf.php';
require 'db_connect.php';

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$query = $pdo->query("SELECT department, employees, avg_salary FROM metrics");
$data = $query->fetchAll();

$html = '<h2>HR Metrics Report</h2><table border="1"><tr><th>Department</th><th>Employees</th><th>Average Salary</th></tr>';
foreach ($data as $row) {
    $html .= "<tr><td>{$row['department']}</td><td>{$row['employees']}</td><td>\${$row['avg_salary']}</td></tr>";
}
$html .= '</table>';

$pdf->writeHTML($html);
$pdf->Output('hr_report.pdf', 'D');
?>
