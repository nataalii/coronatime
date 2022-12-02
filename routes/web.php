<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::group(['prefix' => '{language}'], function () {
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
	Route::view('forgot-password', 'auth.request')->middleware('guest')->name('password.request');
	Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])->middleware('guest')->name('password.email');

	Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->middleware('guest')->name('password.reset');
	Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.update');

	//admin
	Route::view('statistics/worldwide', 'dashboard.worldwide')->name('worldwide')->middleware('auth');
	Route::get('statistics/by-country', [StatisticsController::class, 'store'])->name('by-country')->middleware('auth');
});
