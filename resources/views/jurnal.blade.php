<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sleepy Panda – Jurnal Tidur Report</title>

    <link rel="stylesheet" href="{{ asset(path: 'css/jurnal.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="app">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="sidebar">
        <h3>Admin Site</h3>
        <a href="{{ url('/dashboard') }}">Dashboard</a>
    <a href="{{ url('/jurnal') }} class="active">Jurnal</a>
    <a href="{{ url('/report') }}">Report</a>
    <a href="{{ url('/database') }}">Database User</a>
    </aside>

    <!-- CONTENT -->
    <div id="page" class="page">

        <!-- HEADER -->
        <header class="header">
            <div class="left">
                <span class="hamburger" onclick="toggleSidebar()">☰</span>
                <span class="logo">Sleepy Panda</span>
            </div>

            <div class="search">
                <input type="text" placeholder="Search">
            </div>

            <div class="user">
                <div class="avatar"></div>
                <span>Halo, Anthony</span>
            </div>
        </header>

    <h2 class="page-title">Jurnal Tidur Report</h2>

    <!-- MAIN CONTENT -->
    <section class="content">

        <!-- LEFT : JURNAL -->
        <div class="journal-list">
            <img src="/jurnal1.png" alt="Jurnal 1">
            <img src="/jurnal2.png" alt="Jurnal 2">
            <img src="/jurnal3.png" alt="Jurnal 3">
        </div>

        <!-- RIGHT : CHART -->
        <div class="chart-card">

            <div class="chart-header">
                <h3>Users</h3>

                <div class="filters">
                <select id="rangeSelect" onchange="changePage(this.value)">
                        <option value="daily" selected>Daily</option>
                        <option value="weekly">Weekly</option>
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

            <div class="chart-wrapper">
                <canvas id="journalChart"></canvas>
            </div>

        </div>

    </section>

</div>

<!-- ================= JS ================= -->
<script>
Chart.defaults.font.family = 'Urbanist';
Chart.defaults.color = '#cbd5f5';

const ctx = document.getElementById('journalChart');

const chartData = {
    daily: {
        1: [100, 800, 120, 90, 150, 300],
        2: [200, 600, 300, 200, 100, 400],
        3: [50, 1000, 200, 100, 300, 500],
        4: [80, 600, 400, 300, 200, 450],
        5: [120, 900, 300, 250, 150, 600]
    },
    weekly: {
        1: [300, 500, 800, 600, 400, 700],
        2: [200, 400, 700, 500, 300, 600],
        3: [400, 600, 900, 700, 500, 800],
        4: [350, 550, 850, 650, 450, 750],
        5: [300, 500, 800, 600, 400, 700]
    },
    monthly: {
        1: [600, 900, 1200, 1000, 800, 1400],
        2: [700, 1000, 1300, 1100, 900, 1500],
        3: [650, 950, 1250, 1050, 850, 1450],
        4: [680, 980, 1280, 1080, 880, 1480],
        5: [720, 1020, 1320, 1120, 920, 1520]
    }
};

const labels = ['0j','1j','2j','3j','4j','5j'];

let currentRange = 'daily';
let currentDate = '1';

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels,
        datasets: [{
            data: chartData[currentRange][currentDate],
            borderColor: '#F2C94C',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0,
            pointRadius: 4,
            pointBackgroundColor: '#F2C94C'
        }]
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: {
                grid: { display: false }
            },
            y: {
                grid: {
                    color: 'rgba(255,255,255,0.06)'
                }
            }
        }
    }
});

document.getElementById('rangeSelect').addEventListener('change', e => {
    currentRange = e.target.value;
    chart.data.datasets[0].data = chartData[currentRange][currentDate];
    chart.update();
});

document.getElementById('dateSelect').addEventListener('change', e => {
    currentDate = e.target.value;
    chart.data.datasets[0].data = chartData[currentRange][currentDate];
    chart.update();
});

function changePage(value) {
    if (value === 'daily') window.location.href = '/jurnal';
    if (value === 'weekly') window.location.href = '/jurweek';
    if (value === 'monthly') window.location.href = '/jurmon';
}

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('hide');
}

</script>

</body>
</html>
