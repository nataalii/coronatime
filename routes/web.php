<?php

use App\Http\Controllers\RegistrationController;
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

Route::get('/confirmation', [RegistrationController::class, 'confirm'])->name('registration.confirm');
