<?php

use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\AktivasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PangkalanDataController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PortalDataController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\SPMIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidasiController;
use App\Models\Faculty;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return redirect('/data/mahasiswa/aktif'); });

//PUBLIC
Route::get('/data/mahasiswa/{url}', [PortalDataController::class, 'index_mahasiswa']);
Route::post('/data/prodi_list', [PortalDataController::class, 'get_prodi'])->name('get-prodi-list');
Route::post('/data/mahasiswa', [PortalDataController::class, 'mahasiswa_get'])->name('portal-mahasiswa-get');

Route::get('/data/dosen', [PortalDataController::class, 'index_dosen']);
Route::post('/data/dosen', [PortalDataController::class, 'get_dosen']);

Route::get('/data/spmi', [PortalDataController::class, 'index_spmi']);
Route::post('/data/spmi', [PortalDataController::class, 'get_spmi'])->name('portal-spmi-get');


//KHUSUS GUEST
Route::middleware('guest')->group(function(){
    Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});

//KHUSUS ADMIN & OPERATOR
Route::middleware('auth')->group(function(){

    Route::middleware('account_link')->group(function(){
        //Pengaturan SPMI Prodi / Universitas
        Route::get('/spmi/{slug}', [PengaturanController::class, 'index']);
        Route::post('/spmi/create/{slug}', [PengaturanController::class, 'store']);
        Route::post('/spmi/create_tambahan', [PengaturanController::class, 'storeTambahan']);
        Route::post('/spmi/delete_tambahan', [PengaturanController::class, 'deleteTambahan']);
        //Profil
        Route::get('/prodi/profil', [ProfilController::class, 'index']);
        Route::post('/prodi/profil/create', [ProfilController::class, 'store']);
        //Pangkalan Data
        Route::get('/prodi/data', [PangkalanDataController::class, 'index']);
        Route::post('/prodi/data/mahasiswa', [PangkalanDataController::class, 'store']);
        Route::post('/prodi/data/dosen', [PangkalanDataController::class, 'storeDosen']);
        Route::delete('/prodi/data/dosen', [PangkalanDataController::class, 'destroyDosen']);
        
    });

    //Dashboard dan Informasi
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home/dashboard', [DashboardController::class, 'index']);
    Route::get('/home/about', function(){return view('admin.about.about');});
    Route::get('/home/hubungi', function(){return view('admin.about.hubungi');});

    //Halaman Universitas & Rektor & Dekan
    Route::get('/universitas/programstudi', [ProgramStudiController::class, 'index']);
    Route::get('/universitas/akreditasi', [AkreditasiController::class, 'index']);

    //Admin Manage Users
    Route::get('/admin/user', [UserController::class, 'index']);
    Route::post('/admin/user', [UserController::class, 'create']);
    Route::post('/admin/user/edit', [UserController::class, 'update']);
    Route::post('/admin/user/reset', [UserController::class, 'reset_password']);
    Route::delete('/admin/user', [UserController::class, 'destroy']);

    //Admin Manage Program Studi
    Route::get('/admin/prodi', [ProdiController::class, 'index']);
    Route::post('/admin/prodi', [ProdiController::class, 'store']);
    Route::post('/admin/prodi/edit', [ProdiController::class, 'update']);
    Route::post('/admin/prodi/link', [ProdiController::class, 'link']);
    Route::delete('/admin/prodi', [ProdiController::class, 'destroy']);

    //Admin Manage Periode
    Route::get('/admin/periode', [PeriodeController::class, 'index']);
    Route::post('/admin/periode', [PeriodeController::class, 'store']);
    Route::delete('/admin/periode', [PeriodeController::class, 'destroy']);
    Route::post('/admin/periode/select', [PeriodeController::class, 'selectPeriode']);

    //Admin Manage Aktivasi
    Route::post('/admin/aktivasi', [AktivasiController::class, 'update']);

    //Admin Manage Validasi
    Route::get('/admin/validasi', [ValidasiController::class, 'index']);
    Route::get('/admin/validasi/{id}', [ValidasiController::class, 'show']);
    Route::get('/admin/spmi/isian/{id}', [ValidasiController::class, 'show']);
    Route::post('/admin/validasi', [ValidasiController::class, 'update']);

    //Admin Manage SPMI
    Route::get('/admin/spmi', [SPMIController::class, 'index']);
    Route::post('/admin/spmi/import', [SPMIController::class, 'import']);
    
});
