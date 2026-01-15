<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sleepy Panda – Database User</title>

    <link rel="stylesheet" href="{{ asset(path: 'css/database.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <h3>Admin Site</h3>

        <a href="/dashboard">Dashboard</a>
        <a href="/jurnal">Jurnal</a>
        <a href="/report">Report</a>
        <a href="/database">Database User</a>
        <a href="#">Update Data</a>
        <a href="#">Reset Password</a>
    </aside>

    <!-- CONTENT -->
    <div class="main" id="main">

        <!-- HEADER -->
        <header class="header">
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
            <div class="stat-card">
                <p>Total Users</p>
                <h2>4500</h2>
            </div>
            <div class="stat-card">
                <p>Active Users</p>
                <h2>3500</h2>
            </div>
            <div class="stat-card">
                <p>New Users</p>
                <h2>+500</h2>
            </div>
            <div class="stat-card">
                <p>Inactive Users</p>
                <h2>500</h2>
            </div>
        </section>

        <!-- TABLE -->
        <section class="table-card">

            <div class="table-header">
                <input class="table-search" placeholder="Search by name, email, or ID">
                <div class="actions">
                    <button>Sort by</button>
                    <button>Refresh</button>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Contact</th>
                        <th>Sleep Status</th>
                        <th>Status</th>
                        <th>Last Active</th>
                        <th>History</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <strong>Alfonso de</strong>
                            <span>ID #418230</span>
                        </td>
                        <td>
                            Alfonso.de@gmail.com<br>
                            +62123456789
                        </td>
                        <td>
                            Avg Sleep: 7.2h<br>
                            Quality: 85%
                        </td>
                        <td><span class="status active">Active</span></td>
                        <td>2024-02-01<br>14:30</td>
                        <td>📊</td>
                    </tr>

                    <tr>
                        <td>
                            <strong>Alfonso de</strong>
                            <span>ID #418230</span>
                        </td>
                        <td>
                            Alfonso.de@gmail.com<br>
                            +62123456789
                        </td>
                        <td>
                            Avg Sleep: 1.2h<br>
                            Quality: 20%
                        </td>
                        <td><span class="status inactive">Not Active</span></td>
                        <td>2024-02-01<br>14:30</td>
                        <td>📊</td>
                    </tr>
                </tbody>
            </table>

        </section>

    </main>
</div>

</body>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('collapsed');
    document.getElementById('main').classList.toggle('expanded');
}
</script>

</html>
