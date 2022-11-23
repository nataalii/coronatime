<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [RegistrationController::class, 'create'])->name('registration.create');

Route::post('/', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/verify', [RegistrationController::class, 'verify'])->name('register.verify');

Route::get('/email/verify', [VerificationController::class, 'index'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'show'])->middleware(['auth', 'signed'])->name('verification.verify');
// Auth::routes([
// 	'verify' => true,
// ]);
