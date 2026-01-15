<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar – Sleepy Panda</title>

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

        <!-- REGISTER CONTENT -->
        <div class="login-content">
            <div class="subtitle">
                Daftar menggunakan akun yang<br>
                belum pernah kamu daftarkan
            </div>

            <!-- FORM REGISTER -->
            <form
                class="login-form"
                onkeyup="validateRegister()"
                onsubmit="return submitRegister()"
            >

                <div class="input-group">
                    <input
                        type="text"
                        id="email"
                        placeholder="Email atau Username"
                    >
                </div>

                <div class="input-group">
                    <input
                        type="password"
                        id="password"
                        placeholder="Password"
                    >
                </div>

                <p id="registerError" style="color:red;font-size:12px;margin-bottom:10px;"></p>

                <button
                    id="btnRegister"
                    type="submit"
                    class="btn-login"
                    disabled
                >
                    Daftar
                </button>

            </form>
        </div>

    </div>
</div>

<script>
function validateRegister() {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const error = document.getElementById('registerError');
    const btn = document.getElementById('btnRegister');

    btn.disabled = true;
    error.innerText = '';

    // Tidak boleh kosong
    if (email === '' || password === '') {
        error.innerText = 'Email dan password tidak boleh kosong';
        return;
    }

    // Format email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        error.innerText = 'Incorrect email';
        return;
    }

    // Domain terlarang
    if (email.endsWith('@ganteng.com')) {
        error.innerText = 'Incorrect email';
        return;
    }

    // Password minimal 8 karakter
    if (password.length < 8) {
        error.innerText = 'Password minimal 8 karakter';
        return;
    }

    btn.disabled = false;
}

function submitRegister() {
    // Simulasi register berhasil → pindah ke login
    window.location.href = "/login";
    return false;
}
</script>

</body>
</html>
