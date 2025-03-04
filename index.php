<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comprehensive HR Metrics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .chart-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .chart-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        canvas {
            width: 100% !important;
            height: 300px !important;
        }
    </style>
</head>
<body>
    <h1>Comprehensive HR Metrics Dashboard</h1>
    
    <div class="chart-container">
        <canvas id="employeeChart"></canvas>
        <canvas id="satisfactionChart"></canvas>
    </div>
    
    <div class="chart-grid">
        <canvas id="turnoverChart"></canvas>
        <canvas id="trainingChart"></canvas>
    </div>

    <script>
        // Mock data for demonstration (would typically come from backend)
        const mockData = [
            {
                department: 'Engineering',
                employees: 150,
                avg_satisfaction: 4.5,
                turnover_rate: 12.5,
                training_hours: 40
            },
            {
                department: 'Sales',
                employees: 100,
                avg_satisfaction: 3.8,
                turnover_rate: 18.2,
                training_hours: 25
            },
            {
                department: 'Customer Support',
                employees: 80,
                avg_satisfaction: 4.2,
                turnover_rate: 15.7,
                training_hours: 30
            },
            {
                department: 'Marketing',
                employees: 50,
                avg_satisfaction: 4.0,
                turnover_rate: 10.5,
                training_hours: 35
            },
            {
                department: 'HR',
                employees: 30,
                avg_satisfaction: 4.7,
                turnover_rate: 8.3,
                training_hours: 45
            }
        ];

        function createEmployeeChart(data) {
            const ctx = document.getElementById('employeeChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(d => d.department),
                    datasets: [{
                        label: 'Number of Employees',
                        data: data.map(d => d.employees),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Employees per Department'
                        }
                    }
                }
            });
        }

        function createSatisfactionChart(data) {
            const ctx = document.getElementById('satisfactionChart').getContext('2d');
            new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: data.map(d => d.department),
                    datasets: [{
                        label: 'Average Satisfaction Score',
                        data: data.map(d => d.avg_satisfaction),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Department Satisfaction Scores'
                        }
                    }
                }
            });
        }

        function createTurnoverChart(data) {
            const ctx = document.getElementById('turnoverChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(d => d.department),
                    datasets: [{
                        label: 'Turnover Rate (%)',
                        data: data.map(d => d.turnover_rate),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Turnover Rates by Department'
                        }
                    }
                }
            });
        }

        function createTrainingChart(data) {
            const ctx = document.getElementById('trainingChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.map(d => d.department),
                    datasets: [{
                        label: 'Training Hours',
                        data: data.map(d => d.training_hours),
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Training Hours per Department'
                        }
                    }
                }
            });
        }

        // Create all charts with mock data
        createEmployeeChart(mockData);
        createSatisfactionChart(mockData);
        createTurnoverChart(mockData);
        createTrainingChart(mockData);
    </script>
</body>
</html>
