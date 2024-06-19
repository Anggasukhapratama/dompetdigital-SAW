<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif; // Import your model(s)
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']); // Apply middleware to all methods in this controller
    }

    public function dashboard()
    {
        // Set flash message only once
        if (!session()->has('welcome_message_displayed')) {
            session()->flash('welcome_message', 'Selamat datang di Admin!');
            session()->put('welcome_message_displayed', true);
        }

        return view('dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function alternatif()
    {
        return view('admin.alternatif');
    }

    public function kriteria()
    {
        return view('admin.kriteria');
    }

    public function subKriteria()
    {
        return view('admin.subkriteria');
    }

    public function normalisasi()
    {
        return view('admin.normalisasi');
    }

    public function nilaiPreferensi()
    {
        return view('admin.penilaian');
    }

    public function perangkingan()
    {
        return view('admin.perangkingan');
    }

    public function pengguna()
    {
        return view('admin.pengguna');
    }
}
