
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HR Metrics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="turnoverChart"></canvas>

    <script>
        fetch('hr_metrics.php')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('turnoverChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Turnover Rate'],
                    datasets: [{
                        label: 'Turnover Rate %',
                        data: [data.turnover.turnover_rate],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)'
                    }]
                }
            });
        });
    </script>
</body>
</html>
