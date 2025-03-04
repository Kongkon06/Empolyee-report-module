<?php
require 'db_connect.php';

$query = $pdo->query("SELECT department, employees, avg_salary FROM metrics");
$data = $query->fetchAll();

echo json_encode($data);
?>
