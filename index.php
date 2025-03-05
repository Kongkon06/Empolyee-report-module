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
    const chartInstances = {}; // Store chart instances
function initializeCharts() {
   
chartInstances["kpiChart"] = createChart("kpiChart", "bar", {
    labels: [],
    datasets: [{
        label: "Employee Count",
        data: [],
        backgroundColor: [
            "rgba(54, 162, 235, 0.7)",
            "rgba(75, 192, 192, 0.7)",
            "rgba(255, 159, 64, 0.7)",
            "rgba(153, 102, 255, 0.7)"
        ],
        borderColor: [
            "rgba(54, 162, 235, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(255, 159, 64, 1)",
            "rgba(153, 102, 255, 1)"
        ],
        borderWidth: 1
    }]
});

chartInstances["recruitmentChart"] = createChart("recruitmentChart", "line", {
    labels: [],
    datasets: [{
        label: "New Hires",
        data: [],
        backgroundColor: "rgba(10, 200, 150, 0.3)",
        borderColor: "rgba(10, 200, 150, 1)",
        borderWidth: 2,
        fill: true
    }]
});

chartInstances["performanceChart"] = createChart("performanceChart", "pie", {
    labels: [],
    datasets: [{
        label: "Performance Ratings",
        data: [],
        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"],
        borderColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"],
        borderWidth: 1
    }]
});

chartInstances["turnoverChart"] = createChart("turnoverChart", "bar", {
    labels: [],
    datasets: [{
        label: "Turnover Rate",
        data: [],
        backgroundColor: [
            "rgba(255, 99, 132, 0.7)",
            "rgba(255, 205, 86, 0.7)",
            "rgba(75, 192, 192, 0.7)"
        ],
        borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(255, 205, 86, 1)",
            "rgba(75, 192, 192, 1)"
        ],
        borderWidth: 1
    }]
});
}
   

async function fetchHRMetrics() {
    try {
        const response = await fetch("hr_metrics.php");
        const hrData = await response.json();
        console.log("Fetched HR Data:", hrData); // Debugging

        updateAllCharts(hrData); // Update all charts
    } catch (error) {
        console.error("Error fetching HR Metrics:", error);
    }
}

    function updateChartData(hrData) {
        // Extract labels (departments) and data
        const labels = hrData.map(entry => entry.department);
        const employeeData = hrData.map(entry => entry.employees);
        const satisfactionData = hrData.map(entry => parseFloat(entry.avg_satisfaction));

        const chartData = {
            hrMetrics: {
                labels: labels,
                datasets: [
                    {
                        label: "Number of Employees",
                        data: employeeData,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)'
                    },
                    {
                        label: "Average Satisfaction",
                        data: satisfactionData,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)'
                    }
                ]
            }
        };

        // Create the chart
        createChart("hrMetricsChart", "bar", chartData.hrMetrics);

        // Handle dropdown change event
        document.getElementById("hrMetricsChartType").addEventListener("change", function (event) {
            const newType = event.target.value;
            updateChart(chartInstances["hrMetricsChart"], "hrMetricsChart", newType, chartData.hrMetrics);
        });
    }

    function createChart(chartId, type, data) {
        const canvas = document.getElementById(chartId);

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

        return chartInstances[chartId];
    }

function updateAllCharts(hrData) {
    if (!hrData || !Array.isArray(hrData)) {
        console.error("Invalid HR Data:", hrData);
        return;
    }

    const labels = hrData.map(item => item.department);
    const employeeCounts = hrData.map(item => item.employees);
    const satisfactionScores = hrData.map(item => parseFloat(item.avg_satisfaction));

    updateChart("kpiChart", labels, employeeCounts);
    updateChart("recruitmentChart", labels, satisfactionScores);
    updateChart("performanceChart", labels, employeeCounts);
    updateChart("turnoverChart", labels, satisfactionScores);
}

function updateChart(chartId, labels, data) {
    if (chartInstances[chartId]) {
        chartInstances[chartId].data.labels = labels;
        chartInstances[chartId].data.datasets[0].data = data;
        chartInstances[chartId].update();
    } else {
        console.error(`⚠️ ${chartId} not found in chartInstances!`);
    }
}
  


document.addEventListener("DOMContentLoaded", function () {
    initializeCharts();
    fetchHRMetrics();

    document.querySelectorAll("select").forEach(select => {
        select.addEventListener("change", function (event) {
            const chartId = event.target.id.replace("Type", ""); // Match chart ID
            const newType = event.target.value;

            if (chartInstances[chartId]) {
                updateChartType(chartId, newType);
            } else {
                console.error(`⚠️ Chart ${chartId} not found!`);
            }
        });
    });
});

function updateChartType(chartId, newType) {
    if (chartInstances[chartId]) {
        const oldData = chartInstances[chartId].data;
        chartInstances[chartId].destroy();
        chartInstances[chartId] = new Chart(document.getElementById(chartId), {
            type: newType,
            data: oldData,
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
}

</script>
</body>
</html>
