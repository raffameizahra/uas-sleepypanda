<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi OTP – Sleepy Panda</title>

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
            position:absolute;
            top:200px;
            left:50%;
            transform:translateX(-50%);
            width:100%;
            display:flex;
            justify-content:center;
        ">
            <div style="width:260px;text-align:center;">

                <div class="subtitle" style="margin-bottom:10px;">
                    Masukkan OTP
                </div>

                <p style="
                    font-size:12px;
                    color:#94a3b8;
                    line-height:1.4;
                    margin-bottom:20px;
                ">
                    Masukkan kode OTP yang telah<br>
                    dikirim ke email kamu
                </p>

                <!-- FORM OTP -->
                <form method="POST" action="{{ url('/verify-otp') }}">
                    @csrf

                    <div class="input-group">
                        <input
                            type="text"
                            name="otp"
                            id="otpInput"
                            placeholder="Masukkan OTP"
                            onkeyup="validateOtp()"
                        >
                    </div>

                    <p id="otpError" style="color:red;font-size:12px;margin-bottom:10px;"></p>

                    <button
                        id="btnVerify"
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
                        Verifikasi
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<script>
function validateOtp() {
    const otp = document.getElementById('otpInput').value.trim();
    const error = document.getElementById('otpError');
    const btn = document.getElementById('btnVerify');

    btn.disabled = true;
    error.innerText = '';

    if (otp === '') {
        error.innerText = 'OTP tidak boleh kosong';
        return;
    }

    if (otp.length < 4) {
        error.innerText = 'OTP tidak valid';
        return;
    }

    btn.disabled = false;
}
</script>

</body>
</html>
