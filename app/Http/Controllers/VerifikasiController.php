<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function handle($token, Request $request)
    {
        $ip = $request->ip();
        $waktu = now()->format('Y-m-d H:i:s');

        // Simpan ke log atau tampilkan
        return view('verify.result', [
            'ip' => $ip,
            'waktu' => $waktu,
            'token' => $token,
        ]);
    }
}
