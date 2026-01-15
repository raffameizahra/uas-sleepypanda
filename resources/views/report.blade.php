<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sleepy Panda – Report</title>

    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div id="sidebar" class="sidebar">
    <h3>Admin Site</h3>

    <a href="{{ url('/dashboard') }}">Dashboard</a>
    <a href="{{ url('/jurnal') }}">Jurnal</a>
    <a href="{{ url('/report') }}" class="active">Report</a>
    <a href="{{ url('/database') }}">Database User</a>
</div>

<div id="overlay" onclick="toggleSidebar()"></div>


<div class="report-page">

    <!-- HEADER -->
    <header class="report-header">
        <div class="left">
        <span class="hamburger" onclick="toggleSidebar()">☰</span>
        <span class="brand">Sleepy Panda</span>
        </div>

        <div class="search">
            <input type="text" placeholder="Search">
        </div>

        <div class="user">
            <div class="avatar"></div>
            <span>Halo, Anthony</span>
        </div>
    </header>

    <!-- STATS -->
    <section class="stats">
        <div class="stat-card"><p>Total Users</p><h2>4500</h2></div>
        <div class="stat-card"><p>Insomnia Cases</p><h2>900</h2></div>
        <div class="stat-card"><p>Time to Sleep</p><h2>90 min</h2></div>
        <div class="stat-card"><p>Average Sleep Time</p><h2>5.2 h</h2></div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="report-section">

        <!-- CHART -->
        <div class="main-card">
            <div class="card-header">
                <h3>Users Sleep Report</h3>

                <div class="filters">
                    <select id="rangeSelect" onchange="changePage(this.value)">
                        <option value="daily">Daily</option>
                        <option value="weekly" selected>Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>

                    <select id="dateSelect">
                        <option value="1">1 Agustus</option>
                        <option value="2">2 Agustus</option>
                        <option value="3">3 Agustus</option>
                        <option value="4">4 Agustus</option>
                        <option value="5">5 Agustus</option>
                    </select>
                </div>
            </div>

            <div class="card-body">
                <canvas id="reportChart"></canvas>
            </div>
        </div>

        <!-- ALERT -->
        <div class="alert-card">
            <h4>Alert Insomnia Terbaru</h4>

            <div class="alert-item">
                <img src="/al1.png">
            </div>

            <div class="alert-item">
                <img src="/al2.png">
            </div>

            <div class="alert-item">
                <img src="/al3.png">
            </div>

            <div class="alert-item">
                <img src="/al4.png">
            </div>
        </div>

    </section>

</div>

<script>
Chart.defaults.color = '#cbd5f5';
Chart.defaults.font.family = 'Urbanist';

const ctx = document.getElementById('reportChart');

const chartDataByDate = {
    1: [200, 120, 900, 2000, 1800, 600],
    2: [150, 300, 700, 1600, 1400, 800],
    3: [400, 600, 1200, 1800, 1300, 500],
    4: [100, 200, 900, 1700, 1500, 700],
    5: [300, 500, 1000, 1900, 1600, 600]
};

const labels = ['22:00','23:00','00:00','01:00','02:00','03:00'];

const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels,
        datasets: [{
            data: chartDataByDate[1],
            backgroundColor: '#E2556A',
            borderRadius: 6,
            barThickness: 36
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: { grid: { display: false }},
            y: { grid: { color: 'rgba(255,255,255,0.06)' }}
        },
        plugins: { legend: { display: false }}
    }
});

document.getElementById('dateSelect').addEventListener('change', e => {
    chart.data.datasets[0].data = chartDataByDate[e.target.value];
    chart.update();
});

function changePage(value) {
    if (value === 'daily') window.location.href = '/report';
    if (value === 'weekly') window.location.href = '/weekly';
    if (value === 'monthly') window.location.href = '/monthly';
}

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('overlay').classList.toggle('active');
}
</script>

</body>
</html>
