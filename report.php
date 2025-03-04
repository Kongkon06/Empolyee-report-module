
<?php
include 'db_connect.php'; // Database connection

// Fetch turnover rate
function getTurnoverRate($month) {
    global $conn;
    $sql = "SELECT * FROM turnover_rates WHERE month = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $month);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Fetch employee satisfaction
function getEmployeeSatisfaction() {
    global $conn;
    $sql = "SELECT AVG(satisfaction_score) AS avg_satisfaction FROM employees";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Fetch recruitment effectiveness
function getRecruitmentData() {
    global $conn;
    $sql = "SELECT * FROM recruitment";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

header('Content-Type: application/json');
echo json_encode([
    "turnover" => getTurnoverRate("2025-02"),
    "satisfaction" => getEmployeeSatisfaction(),
    "recruitment" => getRecruitmentData()
]);
?>
