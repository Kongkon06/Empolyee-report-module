
<?php 
require 'db_connect.php';

header('Content-Type: application/json'); // Ensure JSON response

$query = $pdo->query("
    SELECT department, COUNT(*) as employees, AVG(satisfaction_score) as avg_satisfaction 
    FROM employees 
    GROUP BY department
");

$data = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>

