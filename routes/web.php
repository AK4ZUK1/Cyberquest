<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitatorController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PksController;
use App\Http\Controllers\TrainerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Home / Login page
Route::get('/', function () {
    return view('login');
})->name('login');

// 2. Logout Action
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');

// 3. Admin Group Routes
Route::prefix('admin')->as('admin.')->group(function () {

    // Dashboard (Handled dynamically via DashboardController)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile & Settings
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');

    // Pengurusan PKS Routes
    Route::get('/pks', [PksController::class, 'index'])->name('pks');
    Route::get('/pks/tambah', [PksController::class, 'create'])->name('pks.create');
    Route::post('/pks', [PksController::class, 'store'])->name('pks.store');
    Route::put('/pks/{pks}', [PksController::class, 'update'])->name('pks.update');
    Route::delete('/pks/{pks}', [PksController::class, 'destroy'])->name('pks.destroy');

    // Fasilitator Routes
    Route::get('/fasilitator', [FacilitatorController::class, 'index'])->name('fasilitator');
    Route::get('/fasilitator/tambah', [FacilitatorController::class, 'create'])->name('fasilitator.create');
    Route::post('/fasilitator', [FacilitatorController::class, 'store'])->name('fasilitator.store');
    Route::put('/fasilitator/{facilitator}', [FacilitatorController::class, 'update'])->name('fasilitator.update');
    Route::delete('/fasilitator/{facilitator}', [FacilitatorController::class, 'destroy'])->name('fasilitator.destroy');

    // Jurulatih Routes
    Route::get('/jurulatih', [TrainerController::class, 'index'])->name('jurulatih');
    Route::post('/jurulatih', [TrainerController::class, 'store'])->name('jurulatih.store');
    Route::put('/jurulatih/{trainer}', [TrainerController::class, 'update'])->name('jurulatih.update');
    Route::delete('/jurulatih/{trainer}', [TrainerController::class, 'destroy'])->name('jurulatih.destroy');

    // Modul Routes
    Route::get('/modul', [ModuleController::class, 'index'])->name('modul');
    Route::post('/modul', [ModuleController::class, 'store'])->name('modul.store');
    Route::put('/modul/{module}', [ModuleController::class, 'update'])->name('modul.update');
    Route::delete('/modul/{module}', [ModuleController::class, 'destroy'])->name('modul.destroy');

});