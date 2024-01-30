<?php

use App\Models\Sampahs;
use App\Models\Penjemputan;
use App\Models\Setorsampah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\Treatment;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/post', [AuthController::class, 'post'])->name('login.post');
    Route::post('/store', [AuthController::class, 'store'])->name('registrasi.store');
    
    
    Route::get('/storage-link', function () {
        $targetFolder = base_path() . '/storage/app/public';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
        symlink($targetFolder, $linkFolder);
    });
});
// Auth::routes(['verify' => true]);

Route::get('/email/verify/need-verification', [VerificationController::class , 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('user/show/{username}', [UserController::class, 'show'])->name('user.show');

Route::get('profiledokter/{id}', [HomeController::class, 'profiledokter'])->name('profiledokter');

Route::get('profile/{username}', [UserController::class, 'profile'])->name('profile');
Route::post('/profile/update/{id}', [UserController::class, 'profileupdate'])->name('profile.update');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home/kontak', [HomeController::class, 'kontak'])->name('home.kontak');
Route::get('/home/treatment/{id}', [HomeController::class, 'treatment'])->name('home.treatment');

Route::group(['middleware' => ['auth', 'role:Pasien']], function () {



    Route::post('/home/pesan/store', [HomeController::class, 'store'])->name('pesan.store');

    Route::get('/home/pesanan', [HomeController::class, 'pesanan'])->name('home.pesanan');
    Route::get('/home/pesanan/delete/{id}', [HomeController::class, 'destroy'])->name('home.pesanandelete');

});



Route::group(['middleware' => ['auth', 'role:Admin']], function () {


    // Route::get('/home/treatment/{id}', [HomeController::class, 'treatment'])->name('home.treatment');
    // Route::post('/home/pesan/store', [HomeController::class, 'store'])->name('pesan.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');

    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/edit/{id}', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::post('/layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::get('/layanan/delete/{id}', [LayananController::class, 'destroy'])->name('layanan.delete');

    Route::get('/treatment/{id}', [TreatmentController::class, 'index'])->name('treatment.index');
    Route::get('/treatment/create/{id}', [TreatmentController::class, 'create'])->name('treatment.create');
    Route::post('/treatment/store', [TreatmentController::class, 'store'])->name('treatment.store');
    Route::get('/treatment/edit/{id}', [TreatmentController::class, 'edit'])->name('treatment.edit');
    Route::post('/treatment/update/{id}', [TreatmentController::class, 'update'])->name('treatment.update');
    Route::get('/treatment/delete/{id}', [TreatmentController::class, 'destroy'])->name('treatment.delete');

    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/show/{id}', [PesananController::class, 'show'])->name('pesanan.show');
    Route::get('/pesanan/terima/{id}', [PesananController::class, 'terimapesanan'])->name('pesanan.terima');
    Route::get('/pesanan/terimasemua/{id}', [PesananController::class, 'terimapesanan'])->name('pesanan.terimasemua');
    Route::get('/pesanan/pesananselesai/{id}', [PesananController::class, 'selesaipesanan'])->name('pesanan.selesai');
});
