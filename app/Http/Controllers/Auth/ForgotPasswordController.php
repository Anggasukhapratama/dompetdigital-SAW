<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    // Menampilkan form permintaan reset kata sandi
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Mengirim email tautan reset kata sandi
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi email
        $request->validate(['email' => 'required|email']);

        // Kirim tautan reset kata sandi ke email
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Respon berdasarkan status pengiriman email
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
