<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comprehensive HR Metrics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6">
                <h1 class="text-3xl font-bold text-white text-center mb-2">HR Metrics Dashboard</h1>
                <p class="text-center text-blue-100">Comprehensive Insights Across Departments</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 p-6">
                <div class="bg-gray-50 rounded-lg shadow-md p-4">
                    <canvas id="employeeChart"></canvas>
                </div>
                <div class="bg-gray-50 rounded-lg shadow-md p-4">
                    <canvas id="satisfactionChart"></canvas>
                </div>
                <div class="bg-gray-50 rounded-lg shadow-md p-4">
                    <canvas id="turnoverChart"></canvas>
                </div>
                <div class="bg-gray-50 rounded-lg shadow-md p-4">
                    <canvas id="trainingChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mock data for demonstration
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
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Employees per Department',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
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
                        backgroundColor: 'rgba(134, 239, 172, 0.2)',
                        borderColor: 'rgba(34, 197, 94, 1)',
                        pointBackgroundColor: 'rgba(34, 197, 94, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Department Satisfaction Scores',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
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
                        borderColor: 'rgba(239, 68, 68, 1)',
                        backgroundColor: 'rgba(239, 68, 68, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Turnover Rates by Department',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
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
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(34, 197, 94, 0.7)',
                            'rgba(239, 68, 68, 0.7)',
                            'rgba(249, 115, 22, 0.7)',
                            'rgba(168, 85, 247, 0.7)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Training Hours per Department',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
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
