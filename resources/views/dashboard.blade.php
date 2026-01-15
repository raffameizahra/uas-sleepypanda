<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sleepy Panda Admin</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    

<div id="sidebar" class="sidebar">
    <h3>Admin Site</h3>

    <a href="{{ url('/dashboard') }}"class="active">Dashboard</a>
    <a href="{{ url('/jurnal') }}">Jurnal</a>
    <a href="{{ url('/report') }}">Report</a>
    <a href="{{ url('/database') }}">Database User</a>
</div>

<div id="overlay" onclick="toggleSidebar()"></div>


<div class="dashboard">

    <!-- HEADER -->
    <header class="header">
    <div class="hamburger" onclick="toggleSidebar()">
    ☰
</div>
        <div class="logo">
            <img style="height: 70px; width: 300px; margin-left: -350px;" src="/logo.png" alt="Sleepy Panda">
        </div>

        <div class="search-box">
            <input type="text" placeholder="Search">
        </div>

        <div class="user">
            <div class="avatar"></div>
            <span>Halo, Anthony</span>
        </div>
    </header>

    <!-- TOP CHARTS (GANTI IMG → CHART.JS) -->
    <section class="top-charts">

        <div class="card chart">
            <h4>Daily Report</h4>
            <canvas id="dailyChart"></canvas>
        </div>

        <div class="card chart">
            <h4>Weekly Report</h4>
            <canvas id="weeklyChart"></canvas>
        </div>

        <div class="card chart">
            <h4>Monthly Report</h4>
            <canvas id="monthlyChart"></canvas>
        </div>

    </section>

    <!-- STAT CARDS -->
    <section class="stats">

        <div class="card stat">
            <p>Total Users</p>
            <div class="stat-top">
                <img src="/org.png" alt="">
                <h2>4500</h2>
            </div>
        </div>

        <div class="card stat">
            <p>Female Users</p>
            <div class="stat-top">
                <img src="/org.png" alt="">
                <h2>2000</h2>
            </div>
        </div>

        <div class="card stat">
            <p>Male Users</p>
            <div class="stat-top">
                <img src="/org.png" alt="">
                <h2>2500</h2>
            </div>
        </div>

        <div class="card stat">
            <p>Average Times</p>
            <div class="stat-top">
                <img src="/org.png" alt="">
                <h2>154.25</h2>
            </div>
        </div>

    </section>

    <!-- BOTTOM CHART -->
    <section class="bottom-chart card">
    <h3>Average Users Sleep Time</h3>
    <div class="chart-area">
        <canvas id="averageChart"></canvas>
    </div>
</section>
</div>

<!-- ================= CHART SCRIPT ================= -->
<script>
Chart.defaults.font.family = 'Urbanist, system-ui';
Chart.defaults.color = '#cbd5f5';

const COLOR_FEMALE = '#AF5579';
const COLOR_MALE   = '#3A4BAE';
const GRID_COLOR   = 'rgba(255,255,255,0.05)';

const baseOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            position: 'top',
            align: 'end',
            labels: {
                usePointStyle: true,
                pointStyle: 'circle',
                boxWidth: 6,
                padding: 12,
                font: { size: 11 }
            }
        }
    },
    scales: {
        x: {
            grid: { display: false },
            ticks: { color: '#94a3b8', font: { size: 10 } }
        },
        y: {
            grid: { color: GRID_COLOR },
            ticks: { color: '#94a3b8', font: { size: 10 } }
        }
    }
};

/* ===== DAILY ===== */
new Chart(document.getElementById('dailyChart'), {
    type: 'bar',
    data: {
        labels: ['Sen','Sel','Rab','Kam','Jum','Sab','Min'],
        datasets: [
            {
                label: 'Female',
                data: [1200,1400,1600,1500,1700,900,1100],
                backgroundColor: COLOR_FEMALE,
                borderRadius: 4,
                barThickness: 6,
                maxBarThickness: 6,
                barPercentage: 0.3,
                categoryPercentage: 0.6
            },
            {
                label: 'Male',
                data: [1000,1300,1500,1400,1600,800,1000],
                backgroundColor: COLOR_MALE,
                borderRadius: 4,
                barThickness: 6,
                maxBarThickness: 6,
                barPercentage: 0.3,
                categoryPercentage: 0.6
            }
        ]
    },
    options: baseOptions
});

/* ===== WEEKLY ===== */
new Chart(document.getElementById('weeklyChart'), {
    type: 'bar',
    data: {
        labels: ['Week 1','Week 2','Week 3','Week 4'],
        datasets: [
            {
                label: 'Female',
                data: [4200,4600,4800,5000],
                backgroundColor: COLOR_FEMALE,
                borderRadius: 4,
                barThickness: 6,
                maxBarThickness: 6,
                barPercentage: 0.3,
                categoryPercentage: 0.55
            },
            {
                label: 'Male',
                data: [4000,4400,4600,4800],
                backgroundColor: COLOR_MALE,
                borderRadius: 4,
                barThickness: 6,
                maxBarThickness: 6,
                barPercentage: 0.3,
                categoryPercentage: 0.55
            }
        ]
    },
    options: baseOptions
});

/* ===== MONTHLY ===== */
new Chart(document.getElementById('monthlyChart'), {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt'],
        datasets: [
            {
                label: 'Female',
                data: [15000,16000,17000,16500,17500,18000,18500,19000,19500,20000],
                backgroundColor: COLOR_FEMALE,
                borderRadius: 4,
                barThickness: 5,
                maxBarThickness: 5,
                barPercentage: 0.3,
                categoryPercentage: 0.65
            },
            {
                label: 'Male',
                data: [14000,15000,16000,15500,16500,17000,17500,18000,18500,19000],
                backgroundColor: COLOR_MALE,
                borderRadius: 4,
                barThickness: 5,
                maxBarThickness: 5,
                barPercentage: 0.3,
                categoryPercentage: 0.65
            }
        ]
    },
    options: baseOptions
});

const avgCtx = document.getElementById('averageChart');

new Chart(avgCtx, {
    type: 'line',
    data: {
        labels: ['Jan 01','Jan 02','Jan 03','Jan 04','Jan 05','Jan 06'],
        datasets: [
            {
    label: 'Female',
    data: [1.2, 3.8, 3.1, 4.2, 6.1, 5.3],
    borderColor: '#AF5579',
    backgroundColor: 'transparent',
    borderWidth: 2,
    tension: 0,                      // ⬅ GARIS TAJAM
    cubicInterpolationMode: 'default',
    pointRadius: 3,
    pointHoverRadius: 4,
    pointBackgroundColor: '#AF5579'
},
            {
    label: 'Male',
    data: [2.4, 2.1, 3.9, 2.8, 5.2, 4.6],
    borderColor: '#3A4BAE',
    backgroundColor: 'transparent',
    borderWidth: 2,
    tension: 0,                      // ⬅ GARIS TAJAM
    cubicInterpolationMode: 'default',
    pointRadius: 3,
    pointHoverRadius: 4,
    pointBackgroundColor: '#3A4BAE'
}

        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                position: 'top',
                labels: {
                    color: '#cbd5f5',
                    font: { size: 11 },
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            }
        },

        scales: {
            x: {
                ticks: {
                    color: '#94a3b8',
                    font: { size: 10 }
                },
                grid: {
                    display: false
                }
            },
            y: {
                min: 0,
                max: 7,
                ticks: {
                    stepSize: 1,
                    color: '#94a3b8',
                    callback: value => value + 'h'
                },
                grid: {
                    color: 'rgba(255,255,255,0.05)'
                }
            }
        }
    }
});

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('overlay').classList.toggle('active');
}
</script>






</body>
</html>
