<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VerificationController;
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
Route::view('/', 'sessions.login')->name('login.create')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

Route::view('register', 'register.create')->name('register.create');
Route::post('register', [RegistrationController::class, 'store'])->name('register.store');

//email verification
Route::view('verify', 'register.verify')->name('register.verify');
Route::view('email/verify', 'register.confirm')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'show'])->name('verification.verify');

//reset password

//admin
Route::view('home', 'dashboard.landing-worldwide')->name('worldwide');
