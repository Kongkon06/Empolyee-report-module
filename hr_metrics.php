
<?php
require 'db_connect.php';

$query = $pdo->query("SELECT department, COUNT(*) as employees, AVG(satisfaction_score) as avg_satisfaction FROM employees GROUP BY department");
$data = $query->fetchAll();

echo json_encode($data);
?>


