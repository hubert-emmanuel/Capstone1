<?php

use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KurikulumController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/matakuliah',[\App\Http\Controllers\MataKuliahController::class, 'index'])->name('matakuliah-list');
Route::get('/mk-create',[\App\Http\Controllers\MataKuliahController::class, 'create'])->name('matakuliah-create');
Route::post('/mk-create',[\App\Http\Controllers\MataKuliahController::class, 'store'])->name('matakuliah-store');
Route::get('/mk-edit/{matakuliah}',[\App\Http\Controllers\MataKuliahController::class, 'edit'])->name('matakuliah-edit');
Route::post('/mk-edit/{matakuliah}',[\App\Http\Controllers\MataKuliahController::class, 'update'])->name('matakuliah-update');
Route::get('/mk-delete/{matakuliah}',[\App\Http\Controllers\MataKuliahController::class, 'destroy'])->name('matakuliah-delete');

Route::get('/polling',[\App\Http\Controllers\PollingController::class, 'index'])->name('polling-list');

Route::get('/kurikulum',[\App\Http\Controllers\KurikulumController::class, 'index'])->name('kurikulum-list');
Route::get('/kk-create',[\App\Http\Controllers\KurikulumController::class, 'create'])->name('kurikulum-create');
Route::post('/kk-create',[\App\Http\Controllers\KurikulumController::class, 'store'])->name('kurikulum-store');
Route::get('/kk-delete/{kurikulum}',[\App\Http\Controllers\KurikulumController::class, 'destroy'])->name('kurikulum-delete');
