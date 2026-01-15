<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

/* ⬇️ TAMBAH INI */
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/weekly', function () {
    return view('weekly');
});

Route::get('/monthly', function () {
    return view('monthly');
});

Route::get('/jurnal', function () {
    return view('jurnal');
});

Route::get('/jurweek', function () {
    return view('jurweek');
});

Route::get('/jurmon', function () {
    return view('jurmon');
});

Route::get('/database', function () {
    return view('database');
});

Route::get('/verify-otp', function () {
    return view('verify-otp');
});

Route::post('/send-otp', function (Request $request) {

    $request->validate(
        ['email' => 'required|email'],
        [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email Anda Salah'
        ]
    );

    $otp = rand(100000, 999999);

    // simpan OTP ke session (WAJIB)
    session([
        'otp' => $otp,
        'email' => $request->email
    ]);

    Mail::raw(
        "Kode OTP reset password Anda adalah: $otp",
        function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('OTP Reset Password - Sleepy Panda');
        }
    );

    // ⬅️ JANGAN back()
    return redirect('/verify-otp');
});


Route::post('/register', function (Request $request) {

    $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8'
    ]);

    DB::table('users')->insert([
        'email' => $request->email,
        'hashed_password' => Hash::make($request->password),
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/login')->with('success', 'Registrasi berhasil');
});

Route::post('/login', function (Request $request) {

    $user = DB::table('users')
        ->where('email', $request->email)
        ->first();

    if (!$user) {
        return back()->with('error', 'Email atau password salah');
    }

    if (!Hash::check($request->password, $user->hashed_password)) {
        return back()->with('error', 'Email atau password salah');
    }

    // login sukses
    session(['user_id' => $user->id]);

    return redirect('/dashboard');
});

Route::post('/verify-otp', function (Request $request) {

    $request->validate([
        'otp' => 'required'
    ]);

    if ($request->otp != session('otp')) {
        return back()->with('error', 'OTP Salah');
    }

    // OTP BENAR
    return redirect('/reset-password');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::get('/reset-password', function () {
    return view('reset-password');
});

Route::post('/reset-password', function (Request $request) {

    $request->validate([
        'password' => 'required|min:8|confirmed'
    ]);

    DB::table('users')
        ->where('email', session('email'))
        ->update([
            'hashed_password' => Hash::make($request->password),
            'updated_at' => now()
        ]);

    // hapus session
    session()->forget(['email', 'otp']);

    return redirect('/login')->with('success', 'Password berhasil direset');
});Route::get('/verify-otp', function () {
    return view('verify-otp');
});

Route::post('/verify-otp', function () {
    // sementara belum diproses
    return redirect('/reset-password');
});
Route::get('/reset-password', function () {
    return view('reset-password');
});

Route::post('/reset-password', function () {
    // sementara simulasi berhasil
    return redirect('/login');
});
