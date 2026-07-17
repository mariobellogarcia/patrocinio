<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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