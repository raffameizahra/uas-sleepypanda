<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password – Sleepy Panda</title>

    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="background">
    <div class="frame">

        <!-- HEADER -->
        <div class="header">
            <div class="logo">
                <img src="/panda.png" alt="Sleepy Panda">
            </div>
        </div>

        <!-- CONTENT -->
        <div style="
            position: absolute;
            top: 200px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            display: flex;
            justify-content: center;
        ">
            <div style="width:260px; text-align:center;">

                <div class="subtitle" style="margin-bottom:10px;">
                    Lupa password?
                </div>

                <p style="
                    font-size:12px;
                    color:#94a3b8;
                    line-height:1.4;
                    margin-bottom:20px;
                ">
                    Instruksi reset password akan<br>
                    dikirim ke email yang kamu gunakan<br>
                    untuk mendaftar
                </p>

                <!-- FORM KIRIM OTP -->
                <form method="POST" action="{{ url('/send-otp') }}">
                    @csrf

                    <div class="input-group">
                        <input
                            type="email"
                            name="email"
                            id="forgotEmail"
                            placeholder="Email"
                            onkeyup="validateForgot()"
                        >
                    </div>

                    <p id="forgotError" style="color:red;font-size:12px;margin-bottom:10px;"></p>

                    <button
                        id="btnReset"
                        type="submit"
                        style="
                            width:260px;
                            padding:12px;
                            border-radius:6px;
                            font-size:14px;
                            font-weight:600;
                            border:none;
                            background:#14b8a6;
                            color:#ffffff;
                            cursor:pointer;
                        "
                        disabled
                    >
                        Reset Password
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<script>
function validateForgot() {
    const email = document.getElementById('forgotEmail').value.trim();
    const error = document.getElementById('forgotError');
    const btn = document.getElementById('btnReset');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    btn.disabled = true;
    error.innerText = '';

    if (email === '') {
        error.innerText = 'Email tidak boleh kosong';
        return;
    }

    if (!emailRegex.test(email)) {
        error.innerText = 'Email Anda Salah';
        return;
    }

    btn.disabled = false;
}
</script>

</body>
</html>
