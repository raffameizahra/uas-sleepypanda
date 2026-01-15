<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sleepy Panda – Jurnal Monthly</title>

    <link rel="stylesheet" href="{{ asset(path: 'css/jurmon.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="page">

    <!-- HEADER -->
    <header class="header">
        <div class="left">
            <span class="hamburger">☰</span>
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

    <h2 class="title">Jurnal Tidur Report</h2>

    <!-- MAIN WRAPPER -->
    <section class="main-wrapper">

        <!-- LEFT JOURNAL -->
        <div class="journal-column">

            <div class="journal-card">
                <p class="month">Juni 2023</p>
                <div class="journal-grid">
                    <span>😊 User</span><strong>5000</strong>
                    <span>⏰ Avg tidur</span><strong>8 jam 2 menit</strong>
                    <span>🌙 Tidur</span><strong>21:58</strong>
                    <span>☀️ Bangun</span><strong>07:10</strong>
                </div>
            </div>

            <div class="journal-card">
                <p class="month">Mei 2023</p>
                <div class="journal-grid">
                    <span>😊 User</span><strong>4800</strong>
                    <span>⏰ Avg tidur</span><strong>7 jam 35 menit</strong>
                    <span>🌙 Tidur</span><strong>22:48</strong>
                    <span>☀️ Bangun</span><strong>06:40</strong>
                </div>
            </div>

        </div>

        <!-- RIGHT CHART -->
        <div class="chart-column">

            <div class="chart-header">
                <select onchange="changePage(this.value)">
                    <option value="monthly" selected>Monthly</option>
                    <option value="weekly">Weekly</option>
                    <option value="daily">Daily</option>
                </select>

                <select id="monthSelect">
                    <option value="jun">Juni 2023</option>
                    <option value="may">Mei 2023</option>
                    <option value="apr">April 2023</option>
                </select>
            </div>

            <div class="chart-box">
                <canvas id="monthlyChart"></canvas>
            </div>

        </div>

    </section>

</div>

<!-- JS -->
<script>
Chart.defaults.font.family = 'Urbanist';
Chart.defaults.color = '#CBD5F5';

/* DATA PER BULAN */
const monthlyData = {
    jun: [5, 4, 7, 6],
    may: [4, 3, 6, 5],
    apr: [3, 4, 5, 4]
};

const ctx = document.getElementById('monthlyChart');

const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Week 1','Week 2','Week 3','Week 4'],
        datasets: [{
            data: monthlyData.jun,
            backgroundColor: '#8B4C5A',
            borderRadius: 6,
            barThickness: 48
        }]
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: { grid: { display: false }},
            y: {
                min: 0,
                max: 10,
                ticks: {
                    callback: v => v + 'j'
                },
                grid: {
                    color: 'rgba(255,255,255,0.06)'
                }
            }
        }
    }
});

/* GANTI BULAN */
document.getElementById('monthSelect').addEventListener('change', e => {
    chart.data.datasets[0].data = monthlyData[e.target.value];
    chart.update();
});

/* PINDAH HALAMAN */
function changePage(value) {
    if (value === 'daily') location.href = '/jurnal';
    if (value === 'weekly') location.href = '/jurweek';
    if (value === 'monthly') location.href = '/jurmon';
}
</script>

</body>
</html>
