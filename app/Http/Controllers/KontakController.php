<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class KontakController extends Controller
{
    public function index()
{
    return view('kontak.form'); // Ganti 'kontak.form' sesuai nama file Blade kamu
}

public function sendVerification(Request $request)
{
    $token = Str::uuid(); // UUID unik
    $code = rand(100000, 999999); // Kode 6 digit acak
    $user_id = mt_rand(1000000000, 1999999999); // ID acak 10 digit
    $ip = $request->ip(); // IP pengguna
    $agent = $request->header('User-Agent'); // Info device
    $server_time = now()->format('Y-m-d H:i:s');

    $data = [
        'user_id' => $user_id,
        'code' => $code,
        'reason' => 'Verifikasi Perangkat Baru',
        'server_time' => $server_time,
        'token' => $token,
        'ip' => $ip,
        'device' => $agent,
    ];

    Mail::send('email.contact', $data, function ($message) {
        $message->to('derrielnaufal1@gmail.com')
                ->subject('Kode Verifikasi Moonton');
    });

    return 'Email berhasil dikirim!';
}


}