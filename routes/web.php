<?php

use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/matakuliah',[\App\Http\Controllers\MataKuliahController::class, 'index'])->name('matakuliah-list');
    Route::get('/polling',[\App\Http\Controllers\PollingController::class, 'index'])->name('polling-list');
    Route::get('/polling_detail',[\App\Http\Controllers\PollingDetailController::class, 'index'])->name('polling_detail-list');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user-list');
    Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user-create');
    Route::post('/user/create', [\App\Http\Controllers\UserController::class, 'store'])->name('user-store');
    Route::get('/user-edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user-edit');
    Route::post('/user-edit/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user-update');
    Route::get('/user-delete/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user-delete');
});

Route::middleware(['auth', 'prodi'])->group(function () {
    Route::get('/matakuliah/prodi',[\App\Http\Controllers\MataKuliahController::class, 'index'])->name('matakuliah-list-prodi');
    Route::get('/mk-create/prodi',[\App\Http\Controllers\MataKuliahController::class, 'create'])->name('matakuliah-create-prodi');
    Route::post('/mk-create/prodi',[\App\Http\Controllers\MataKuliahController::class, 'store'])->name('matakuliah-store-prodi');
    Route::get('/mk-edit/{mataKuliah}/prodi',[\App\Http\Controllers\MataKuliahController::class, 'edit'])->name('matakuliah-edit-prodi');
    Route::post('/mk-edit/{mataKuliah}/prodi',[\App\Http\Controllers\MataKuliahController::class, 'update'])->name('matakuliah-update-prodi');
    Route::get('/mk-delete/{matakuliah}/prodi',[\App\Http\Controllers\MataKuliahController::class, 'destroy'])->name('matakuliah-delete-prodi');

    Route::get('/kurikulum',[\App\Http\Controllers\KurikulumController::class, 'index'])->name('kurikulum-list');
    Route::get('/kk-create',[\App\Http\Controllers\KurikulumController::class, 'create'])->name('kurikulum-create');
    Route::post('/kk-create',[\App\Http\Controllers\KurikulumController::class, 'store'])->name('kurikulum-store');
    Route::get('/kk-edit/{kurikulum}',[\App\Http\Controllers\KurikulumController::class, 'edit'])->name('kurikulum-edit');
    Route::post('/kk-edit/{kurikulum}',[\App\Http\Controllers\KurikulumController::class, 'update'])->name('kurikulum-update');
    Route::get('/kk-delete/{kurikulum}',[\App\Http\Controllers\KurikulumController::class, 'destroy'])->name('kurikulum-delete');

    Route::get('/polling/prodi',[\App\Http\Controllers\PollingController::class, 'index'])->name('polling-list-prodi');
    Route::get('/pl-create/prodi',[\App\Http\Controllers\PollingController::class, 'create'])->name('polling-create-prodi');
    Route::post('/pl-create/prodi',[\App\Http\Controllers\PollingController::class, 'store'])->name('polling-store-prodi');
    Route::get('/pl-edit/{polling}',[\App\Http\Controllers\PollingController::class, 'edit'])->name('polling-edit-prodi');
    Route::post('/pl-edit/{polling}',[\App\Http\Controllers\PollingController::class, 'update'])->name('polling-update-prodi');
    Route::get('/pl-delete/{polling}',[\App\Http\Controllers\PollingController::class, 'destroy'])->name('polling-delete-prodi');
    Route::get('/pld-create/prodi',[\App\Http\Controllers\PollingDetailController::class, 'create'])->name('polling_detail-create-prodi');
    Route::post('/pld-create/prodi',[\App\Http\Controllers\PollingDetailController::class, 'store'])->name('polling_detail-store-prodi');
    Route::get('/pl-delete/{polling}/prodi',[\App\Http\Controllers\PollingController::class, 'destroy'])->name('polling-delete-prodi');
});

Route::middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('/matakuliah/mahasiswa',[\App\Http\Controllers\MataKuliahController::class, 'index'])->name('matakuliah-list-mahasiswa');
    Route::get('/mk-create/mahasiswa',[\App\Http\Controllers\MataKuliahController::class, 'create'])->name('matakuliah-create-mahasiswa');
    Route::post('/mk-create/mahasiswa',[\App\Http\Controllers\MataKuliahController::class, 'store'])->name('matakuliah-store-mahasiswa');
    Route::get('/mk-edit/{mataKuliah}/mahasiswa',[\App\Http\Controllers\MataKuliahController::class, 'edit'])->name('matakuliah-edit-mahasiswa');
    Route::post('/mk-edit/{mataKuliah}/mahasiswa',[\App\Http\Controllers\MataKuliahController::class, 'update'])->name('matakuliah-update-mahasiswa');
    Route::get('/mk-delete/{matakuliah}/mahasiswa',[\App\Http\Controllers\MataKuliahController::class, 'destroy'])->name('matakuliah-delete-mahasiswa');

    Route::get('/polling/mahasiswa',[\App\Http\Controllers\PollingController::class, 'index'])->name('polling-list-mahasiswa');
    Route::get('/pl-create/mahasiswa',[\App\Http\Controllers\PollingController::class, 'create'])->name('polling-create-mahasiswa');
    Route::post('/pl-create/mahasiswa',[\App\Http\Controllers\PollingController::class, 'store'])->name('polling-store-mahasiswa');
    Route::get('/pld-create/mahasiswa',[\App\Http\Controllers\PollingDetailController::class, 'create'])->name('polling_detail-create-mahasiswa');
    Route::post('/pld-create/mahasiswa',[\App\Http\Controllers\PollingDetailController::class, 'store'])->name('polling_detail-store-mahasiswa');
    Route::get('/pl-delete/{polling}/mahasiswa',[\App\Http\Controllers\PollingController::class, 'destroy'])->name('polling-delete-mahasiswa');
});

Route::middleware(['auth', 'CheckSKSLimit'])->group(function () {

});
