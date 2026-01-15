<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login – Sleepy Panda</title>

    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="login-page">

<div class="background">
    <div class="frame">

        <!-- HEADER -->
        <div class="header">
            <div class="logo">
                <img src="/panda.png" alt="Sleepy Panda">
            </div>
        </div>

        <!-- LOGIN CONTENT -->
        <div class="login-content">
            <div class="subtitle">
                Masuk menggunakan akun yang<br>
            </div>

            <form class="login-form" onkeyup="validateLogin(event)">

                <div class="input-group">
                    <input type="email" id="username" placeholder="Email">
                </div>

                <div class="input-group">
                    <input type="password" id="password" placeholder="Password">
                </div>

                <div class="forgot">
                    <!-- ⬅️ LINK KE HALAMAN BARU -->
                    <a href="/forgot-password">Lupa password?</a>
                </div>

                <p id="loginError" style="color:red;font-size:12px;margin-bottom:10px;"></p>

                <a href="/dashboard" id="btnLogin" class="btn-login disabled">
                    Masuk
                </a>

                <div class="register-text">
                    Belum memiliki akun?
                    <a href="/register">Daftar sekarang</a>
                </div>

            </form>
        </div>

    </div>
</div>

<script>
function validateLogin() {
    const email = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const btn = document.getElementById('btnLogin');
    const error = document.getElementById('loginError');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    btn.classList.add('disabled');
    error.innerText = '';

    if (!email || !password) {
        error.innerText = 'Username/password incorrect';
        return;
    }

    if (!emailRegex.test(email) || email.endsWith('@ganteng.com')) {
        error.innerText = 'Username/password incorrect';
        return;
    }

    if (password.length < 8) {
        error.innerText = 'Username/password incorrect';
        return;
    }

    btn.classList.remove('disabled');
}

document.getElementById('btnLogin').addEventListener('click', e => {
    if (e.target.classList.contains('disabled')) e.preventDefault();
});
</script>

</body>
</html>
