<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            900: '#075985'
                        },
                        'accent': {
                            500: '#10b981',
                            600: '#059669'
                        }
                    },
                    boxShadow: {
                        'card': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                        'hover': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                HR Analytics Dashboard
                <span class="block text-sm text-gray-600 font-normal mt-2">Comprehensive Workforce Insights</span>
            </h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- KPI Chart -->
            <div class="bg-white rounded-xl shadow-card hover:shadow-hover transition-all duration-300 ease-in-out">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            KPI Metrics
                        </h2>
                        <select id="kpiChartType" class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="doughnut">Doughnut Chart</option>
                            <option value="bar">Bar Chart</option>
                            <option value="line">Line Chart</option>
                            <option value="pie">Pie Chart</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="kpiChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recruitment Chart -->
            <div class="bg-white rounded-xl shadow-card hover:shadow-hover transition-all duration-300 ease-in-out">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Recruitment Trends
                        </h2>
                        <select id="recruitmentChartType" class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="line">Line Chart</option>
                            <option value="bar">Bar Chart</option>
                            <option value="pie">Pie Chart</option>
                            <option value="doughnut">Doughnut Chart</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="recruitmentChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Performance Chart -->
            <div class="bg-white rounded-xl shadow-card hover:shadow-hover transition-all duration-300 ease-in-out">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            Employee Performance
                        </h2>
                        <select id="performanceChartType" class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="pie">Pie Chart</option>
                            <option value="bar">Bar Chart</option>
                            <option value="line">Line Chart</option>
                            <option value="doughnut">Doughnut Chart</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Turnover Chart -->
            <div class="bg-white rounded-xl shadow-card hover:shadow-hover transition-all duration-300 ease-in-out">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                            Turnover Analysis
                        </h2>
                        <select id="turnoverChartType" class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="bar">Bar Chart</option>
                            <option value="line">Line Chart</option>
                            <option value="pie">Pie Chart</option>
                            <option value="doughnut">Doughnut Chart</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="turnoverChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const chartInstances = {}; // Store chart instances to avoid multiple creations

        function createChart(chartId, type, data) {
            const canvas = document.getElementById(chartId);

            // Check if chart already exists and destroy it before creating a new one
            if (chartInstances[chartId]) {
                chartInstances[chartId].destroy();
            }

            chartInstances[chartId] = new Chart(canvas, {
                type: type,
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            return chartInstances[chartId]; // Store and return the chart instance
        }

        // Define chart data with multiple datasets and colors
        const chartData = {
            kpi: {
                labels: ["Headcount", "Salary", "Satisfaction", "Retention"],
                datasets: [{
                    label: "KPI Metrics",
                    data: [524, 85420, 4.2, 12.5],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',   // Blue
                        'rgba(255, 99, 132, 0.7)',   // Red
                        'rgba(75, 192, 192, 0.7)',   // Green
                        'rgba(255, 206, 86, 0.7)'    // Yellow
                    ]
                }]
            },
            recruitment: {
                labels: ["Jan", "Feb", "Mar", "Apr"],
                datasets: [
                    {
                        label: "New Hires",
                        data: [10, 15, 8, 12],
                        backgroundColor: 'rgba(16, 185, 129, 0.7)',  // Green
                        borderColor: 'rgba(16, 185, 129, 1)'
                    },
                    {
                        label: "Interviews",
                        data: [25, 30, 22, 28],
                        backgroundColor: 'rgba(99, 102, 241, 0.7)',  // Indigo
                        borderColor: 'rgba(99, 102, 241, 1)'
                    }
                ]
            },
            performance: {
                labels: ["John", "Emily", "Michael", "Sarah"],
                datasets: [
                    {
                        label: "Performance Score",
                        data: [85, 90, 78, 92],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',   // Red
                            'rgba(54, 162, 235, 0.7)',   // Blue
                            'rgba(255, 206, 86, 0.7)',   // Yellow
                            'rgba(75, 192, 192, 0.7)'    // Green
                        ]
                    }
                ]
            },
            turnover: {
                labels: ["Q1", "Q2", "Q3", "Q4"],
                datasets: [
                    {
                        label: "Voluntary Turnover",
                        data: [3, 5, 2, 4],
                        backgroundColor: 'rgba(239, 68, 68, 0.7)',  // Red
                        borderColor: 'rgba(239, 68, 68, 1)'
                    },
                    {
                        label: "Involuntary Turnover",
                        data: [2, 1, 3, 1],
                        backgroundColor: 'rgba(245, 158, 11, 0.7)', // Amber
                        borderColor: 'rgba(245, 158, 11, 1)'
                    }
                ]
            }
        };

        // Create charts with different default types
        let kpiChart = createChart("kpiChart", "doughnut", chartData.kpi);
        let recruitmentChart = createChart("recruitmentChart", "line", chartData.recruitment);
        let performanceChart = createChart("performanceChart", "pie", chartData.performance);
        let turnoverChart = createChart("turnoverChart", "bar", chartData.turnover);

        function updateChart(chart, chartId, newType, data) {
            chart.destroy(); // Destroy the existing chart

            // Get the parent container
            let canvasContainer = document.getElementById(chartId).parentNode;

            // Remove the old canvas
            document.getElementById(chartId).remove();

            // Create a new canvas and append it to the container
            let newCanvas = document.createElement("canvas");
            newCanvas.id = chartId;
            newCanvas.classList.add("h-64"); // Ensure fixed height to prevent infinite growth
            canvasContainer.appendChild(newCanvas);

            // Recreate the chart with proper options
            return new Chart(newCanvas, {
                type: newType,
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false // Prevent stretching
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Function to handle dropdown change
            function handleChartTypeChange(chartId, chartInstance, chartData) {
                document.getElementById(chartId + "Type").addEventListener("change", function (event) {
                    const newType = event.target.value;
                    chartInstances[chartId] = updateChart(chartInstances[chartId], chartId, newType, chartData);
                });
            }

            // Attach event listeners for each chart
            handleChartTypeChange("kpiChart", kpiChart, chartData.kpi);
            handleChartTypeChange("recruitmentChart", recruitmentChart, chartData.recruitment);
            handleChartTypeChange("performanceChart", performanceChart, chartData.performance);
            handleChartTypeChange("turnoverChart", turnoverChart, chartData.turnover);
        });
    </script>
</body>
</html>