<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Alternatif; // Import your model(s)
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\NilaiKriteria;
use Illuminate\Support\Facades\Auth;

 
class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        return view('home');
    }
 
    public function admindashboard()
    {
        return view('dashboard');
    }

    public function penilaianSAW()
    {
        return view('user.penilaian');
    }
}