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
                Daftar menggunakan akun yang<br>
                belum pernah kamu daftarkan
            </div>

            <form class="login-form">
                <div class="input-group">
                    <input type="text" placeholder="Email atau Username">
                </div>

                <div class="input-group">
                    <input type="password" placeholder="Password">
                </div>


                <a href="/login" class="btn-login">
    Daftar
</a>
            </form>
        </div>


    </div>
</div>


</body>
</html>
