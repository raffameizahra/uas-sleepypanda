<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password – Sleepy Panda</title>

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

                <div class="subtitle" style="margin-bottom:25px;">
                    Reset Password
                </div>

                <!-- FORM RESET PASSWORD -->
                <form method="POST" action="{{ url('/reset-password') }}">
                    @csrf

                    <div class="input-group">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password baru"
                            onkeyup="validatePassword()"
                        >
                    </div>

                    <div class="input-group" style="margin-top:12px;">
                        <input
                            type="password"
                            name="password_confirmation"
                            id="confirmPassword"
                            placeholder="Konfirmasi password"
                            onkeyup="validatePassword()"
                        >
                    </div>

                    <p id="resetError" style="color:red;font-size:12px;margin-top:10px;"></p>

                    <button
                        id="btnSave"
                        type="submit"
                        style="
                            width:260px;
                            margin-top:20px;
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
                        Simpan Password
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<script>
function validatePassword() {
    const pass = document.getElementById('password').value;
    const confirm = document.getElementById('confirmPassword').value;
    const error = document.getElementById('resetError');
    const btn = document.getElementById('btnSave');

    btn.disabled = true;
    error.innerText = '';

    if (pass === '' || confirm === '') {
        error.innerText = 'Password tidak boleh kosong';
        return;
    }

    if (pass.length < 8) {
        error.innerText = 'Password minimal 8 karakter';
        return;
    }

    if (pass !== confirm) {
        error.innerText = 'Konfirmasi password tidak sama';
        return;
    }

    btn.disabled = false;
}
</script>

</body>
</html>
