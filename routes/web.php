<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlayerController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get(
    '/inscripcion',
    [RegistrationController::class, 'create']
)->name('registrations.create');

Route::post(
    '/inscripcion',
    [RegistrationController::class, 'store']
)->name('registrations.store');

Route::get('/install-admin', [InstallAdminController::class, 'create'])
    ->name('admin.install.create');

Route::post('/install-admin', [InstallAdminController::class, 'store'])
    ->name('admin.install.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/panel', [DashboardController::class, 'index'])
            ->name('dashboard');
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function (): void {

        Route::get('/jugadores', [PlayerController::class, 'index'])
    ->name('players.index');

Route::get('/jugadores/{player}', [PlayerController::class, 'show'])
    ->name('players.show');

Route::patch('/jugadores/{player}/activar', [PlayerController::class, 'activate'])
    ->name('players.activate');

Route::patch('/jugadores/{player}/desactivar', [PlayerController::class, 'deactivate'])
    ->name('players.deactivate');

    });