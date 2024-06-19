<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Admin\SubKriteriaController;
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Middleware\IsAdmin;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
 
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/penilaian-saw', [KriteriaController::class, 'PenilaianSAW'])->name('user.penilaian.index');
    Route::get('profile', [UserController::class, 'userprofile'])->name('user.profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
    
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('profile', [UserController::class, 'userprofile'])->name('user.profile');
//     Route::put('profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
// });



//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'admindashboard'])->name('admin/dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    Route::get('/alternatif', [AlternatifController::class, 'index'])->name('admin.alternatif.index');
    Route::delete('/alternatif/{id}', [AlternatifController::class, 'destroy'])->name('admin.alternatif.destroy');
    Route::get('/alternatif/create', [AlternatifController::class, 'create'])->name('admin.alternatif.create');
    Route::post('/alternatif', [AlternatifController::class, 'store'])->name('admin.alternatif.store');
    Route::get('/alternatif/{alternatif}/edit', [AlternatifController::class, 'edit'])->name('admin.alternatif.edit');
    Route::put('/alternatif/{alternatif}', [AlternatifController::class, 'update'])->name('admin.alternatif.update');

    Route::get('kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
    Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
    Route::post('kriteria', [KriteriaController::class, 'store'])->name('admin.kriteria.store');
    Route::get('kriteria/{kriteria}/edit', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
    Route::put('kriteria/{kriteria}', [KriteriaController::class, 'update'])->name('admin.kriteria.update');
    Route::delete('kriteria/{kriteria}', [KriteriaController::class, 'destroy'])->name('admin.kriteria.destroy');

    Route::get('/normalisasi', [KriteriaController::class, 'normalisasi'])->name('admin.normalisasi');
    Route::post('/normalisasi', [KriteriaController::class, 'storeNormalisasi'])->name('admin.normalisasi.store');
    Route::get('/penilaian', [KriteriaController::class, 'penilaian'])->name('admin.penilaian');
    Route::get('/perangkingan', [KriteriaController::class, 'perangkingan'])->name('admin.perangkingan.index');

    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('admin.subkriteria.index');
    Route::get('subkriteria/create', [SubKriteriaController::class, 'create'])->name('admin.subkriteria.create');
    Route::post('subkriteria/store', [SubKriteriaController::class, 'store'])->name('admin.subkriteria.store');
    Route::get('subkriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('admin.subkriteria.edit');
    Route::put('subkriteria/{id}/update', [SubKriteriaController::class, 'update'])->name('admin.subkriteria.update');
    Route::delete('subkriteria/{id}/destroy', [SubKriteriaController::class, 'destroy'])->name('admin.subkriteria.destroy');
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    // Rute untuk dashboard admin
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');

    // Rute untuk alternatif
    Route::get('alternatif', [AlternatifController::class, 'index'])->name('admin.alternatif.index');
    Route::get('alternatif/create', [AlternatifController::class, 'create'])->name('admin.alternatif.create');
    Route::post('alternatif', [AlternatifController::class, 'store'])->name('admin.alternatif.store');
    Route::get('alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('admin.alternatif.edit');
    Route::put('alternatif/{id}', [AlternatifController::class, 'update'])->name('admin.alternatif.update');
    Route::delete('alternatif/{id}', [AlternatifController::class, 'destroy'])->name('admin.alternatif.destroy');

    // Rute untuk kriteria
    Route::get('kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
    Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
    Route::post('kriteria', [KriteriaController::class, 'store'])->name('admin.kriteria.store');
    Route::get('kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
    Route::put('kriteria/{id}', [KriteriaController::class, 'update'])->name('admin.kriteria.update');
    Route::delete('kriteria/{id}', [KriteriaController::class, 'destroy'])->name('admin.kriteria.destroy');

    // Rute untuk subkriteria
    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('admin.subkriteria.index');
    Route::get('subkriteria/create', [SubKriteriaController::class, 'create'])->name('admin.subkriteria.create');
    Route::post('subkriteria', [SubKriteriaController::class, 'store'])->name('admin.subkriteria.store');
    Route::get('subkriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('admin.subkriteria.edit');
    Route::put('subkriteria/{id}', [SubKriteriaController::class, 'update'])->name('admin.subkriteria.update');
    Route::delete('subkriteria/{id}', [SubKriteriaController::class, 'destroy'])->name('admin.subkriteria.destroy');
    
    // Tambahkan rute-rute lainnya jika diperlukan
});

Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [SocialiteController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback']);


// Reset Password Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



// Rute untuk form registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Rute untuk menyimpan data registrasi
Route::post('/register', [RegisterController::class, 'register'])->name('register.save');


Route::get('/email/verify', [VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


// Rute untuk halaman Admin

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('alternatif', [AdminController::class, 'alternatif'])->name('admin.alternatif');
    Route::get('kriteria', [AdminController::class, 'kriteria'])->name('admin.kriteria');
    Route::get('subkriteria', [AdminController::class, 'subKriteria'])->name('admin.subkriteria');
    Route::get('pembobotan', [AdminController::class, 'matriks'])->name('admin.pembobotan');
    Route::get('perhitungan', [AdminController::class, 'perhitungan'])->name('admin.perhitungan');
    Route::get('perangkingan', [AdminController::class, 'perangkingan'])->name('admin.perangkingan');
    Route::get('pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pengguna', [UserController::class, 'index'])->name('admin.pengguna');
    Route::get('/admin/pengguna/create', [UserController::class, 'create'])->name('admin.pengguna.create');
    Route::post('/admin/pengguna', [UserController::class, 'store'])->name('admin.pengguna.store');
    
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'is_admin')->group(function () {
    Route::resource('users', UserController::class);
});

// Route::get('/user/editprofile', [UserController::class, 'editprofile'])->name('user.editprofile');
// Route::put('/user/editprofile', [UserController::class, 'updateProfile'])->name('user.editprofile.update');


Route::middleware(['auth'])->group(function () {
    Route::get('profile', [UserController::class, 'userprofile'])->name('user.profile');
    Route::post('profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
});

Route::prefix('admin')->group(function () {
    // Route untuk menampilkan daftar alternatif
    Route::get('/alternatif', [AlternatifController::class, 'index'])->name('admin.alternatif.index');
    Route::delete('/alternatif/{id}', [AlternatifController::class, 'destroy'])->name('admin.alternatif.destroy');
    Route::get('/alternatif/create', [AlternatifController::class, 'create'])->name('admin.alternatif.create');
    Route::post('/alternatif', [AlternatifController::class, 'store'])->name('admin.alternatif.store');
    Route::get('/alternatif/{alternatif}/edit', [AlternatifController::class, 'edit'])->name('admin.alternatif.edit');
    Route::put('/alternatif/{alternatif}', [AlternatifController::class, 'update'])->name('admin.alternatif.update');
    // Tambahkan rute lainnya jika diperlukan
});



Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
    Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
    Route::post('kriteria', [KriteriaController::class, 'store'])->name('admin.kriteria.store');
    Route::get('kriteria/{kriteria}/edit', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
    Route::put('kriteria/{kriteria}', [KriteriaController::class, 'update'])->name('admin.kriteria.update');
    Route::delete('kriteria/{kriteria}', [KriteriaController::class, 'destroy'])->name('admin.kriteria.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/normalisasi', [KriteriaController::class, 'normalisasi'])->name('admin.normalisasi');
    Route::post('/normalisasi', [KriteriaController::class, 'storeNormalisasi'])->name('admin.normalisasi.store');
    Route::get('/penilaian', [KriteriaController::class, 'penilaian'])->name('admin.penilaian');
    Route::get('/perangkingan', [KriteriaController::class, 'perangkingan'])->name('admin.perangkingan.index');
   
});


Route::prefix('admin')->group(function () {
    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('admin.subkriteria.index');
    Route::get('subkriteria/create', [SubKriteriaController::class, 'create'])->name('admin.subkriteria.create');
    Route::post('subkriteria/store', [SubKriteriaController::class, 'store'])->name('admin.subkriteria.store');
    Route::get('subkriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('admin.subkriteria.edit');
    Route::put('subkriteria/{id}/update', [SubKriteriaController::class, 'update'])->name('admin.subkriteria.update');
    Route::delete('subkriteria/{id}/destroy', [SubKriteriaController::class, 'destroy'])->name('admin.subkriteria.destroy');
});


Route::post('/send-email', function () {
    // Validate input
    request()->validate([
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    // Logic to send email
    Mail::to('recipient@example.com')
        ->send(new ContactFormMail(request()->subject, request()->message));

    // Redirect back with success message
    return redirect()->back()->with('success', 'Email berhasil dikirim!');
})->name('send.email');

// routes/web.php

Route::get('/dana/detail', function () {
    return view('detaildompet.dana');
})->name('dana.detail');

Route::get('/ovo/detail', function () {
    return view('detaildompet.ovo');
})->name('ovo.detail');

Route::get('/shopee-pay/detail', function () {
    return view('detaildompet.shopee-pay');
})->name('shopee-pay.detail');

Route::get('/gopay/detail', function () {
    return view('detaildompet.gopay');
})->name('gopay.detail');

Route::get('/linkaja/detail', function () {
    return view('detaildompet.linkaja');
})->name('linkaja.detail');

