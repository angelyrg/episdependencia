<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\LoginController;
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

Route::view('/', 'welcome')->name('welcome');

Route::view('login', 'login.login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');

Route::view('home', 'home')->name('home')->middleware('auth');

Route::resource('asesores', AsesorController::class)->names('responsable.asesores')->parameters(['asesores' => 'asesor'])->middleware('auth.responsable');
