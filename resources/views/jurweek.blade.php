<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sleepy Panda – Jurnal Weekly</title>

    <link rel="stylesheet" href="{{ asset(path: 'css/jurweek.css') }}">
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

    <!-- MAIN CARD -->
    <section class="main-card">

        <!-- LEFT SUMMARY -->
        <div class="summary-card">
            <p class="date">Juni 2023</p>

            <div class="summary-grid">
                <div>
                    <span>😊 User</span>
                    <strong>4000</strong>
                </div>
                <div>
                    <span>⏰ Durasi tidur</span>
                    <strong>8 jam 2 menit</strong>
                </div>
                <div>
                    <span>🌙 Waktu tidur</span>
                    <strong>21:08</strong>
                </div>
                <div>
                    <span>☀️ Bangun tidur</span>
                    <strong>06:30</strong>
                </div>
            </div>
        </div>

        <!-- RIGHT CHART -->
        <div class="chart-card">

            <div class="chart-header">
                <div class="filters">
                    <!-- PERIODE -->
                    <select onchange="changePeriod(this.value)">
                        <option value="weekly" selected>Weekly</option>
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select>

                    <!-- TANGGAL -->
                    <select id="dateSelect">
                        <option value="1">1 Juni</option>
                        <option value="2">2 Juni</option>
                        <option value="3">3 Juni</option>
                        <option value="4">4 Juni</option>
                        <option value="5">5 Juni</option>
                    </select>
                </div>
            </div>

            <div class="chart-wrapper">
                <canvas id="weeklyChart"></canvas>
            </div>

        </div>

    </section>

</div>

<!-- JS -->
<script>
Chart.defaults.font.family = 'Urbanist';
Chart.defaults.color = '#E5E7EB';

/* DATA BERDASARKAN TANGGAL */
const dataByDate = {
    1: [5, 7, 4, 9, 7, 7, 4],
    2: [4, 6, 5, 8, 6, 6, 5],
    3: [6, 8, 6, 9, 8, 7, 6],
    4: [3, 5, 4, 7, 5, 6, 4],
    5: [7, 9, 8, 10, 9, 8, 7]
};

const ctx = document.getElementById('weeklyChart');

const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
        datasets: [{
            data: dataByDate[1],
            backgroundColor: [
                '#8B4C5A','#8B4C5A','#8B4C5A',
                '#E2556A',
                '#8B4C5A','#8B4C5A','#8B4C5A'
            ],
            borderRadius: 6,
            barThickness: 36
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

/* GANTI TANGGAL */
document.getElementById('dateSelect').addEventListener('change', e => {
    chart.data.datasets[0].data = dataByDate[e.target.value];
    chart.update();
});

/* GANTI HALAMAN */
function changePeriod(value) {
    if (value === 'daily') location.href = '/jurnal';
    if (value === 'weekly') location.href = '/jurweek';
    if (value === 'monthly') location.href = '/jurmon';
}
</script>

</body>
</html>