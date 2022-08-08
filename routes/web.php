<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\EjecutorController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ResponsableController;
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

Route::view('/', 'login.login')->middleware('guest');

Route::view('login', 'login.login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');

Route::view('home', 'home')->name('home')->middleware('auth');

Route::resource('asesores', AsesorController::class)->names('responsable.asesores')->parameters(['asesores' => 'asesor'])->middleware('auth.responsable');
Route::resource('proyectos', ProyectoController::class)->names('responsable.proyectos')->middleware('auth');
Route::resource('ejecutores', EjecutorController::class)->only(['index', 'store', 'destroy'])->parameters(['ejecutores' => 'ejecutor'])->names('responsable.ejecutores')->middleware('auth.responsable');
Route::get('responsable/informes', [ResponsableController::class, 'informes'])->name('responsable.informes')->middleware('auth.responsable');
Route::put('responsable/informes/{informe}', [ResponsableController::class, 'calificarinforme'])->name('responsable.calificarinforme')->middleware('auth.responsable');


Route::get('asesorados', [AsesorController::class, 'asesorados'])->name('asesor.asesorados');
Route::get('asesorados/{proyecto}/show', [AsesorController::class, 'asesorado'])->name('asesor.asesorados.show');
Route::get('asesor/informes', [AsesorController::class, 'informes'])->name('asesor.informes')->middleware('auth.asesor');
Route::put('asesor/informes/{informe}', [AsesorController::class, 'calificarinforme'])->name('asesor.calificarinforme')->middleware('auth.asesor');

Route::get('ejecutor/proyecto', [EjecutorController::class, 'proyecto'])->name('ejecutor.proyecto');
Route::resource('informes', InformeController::class)->only(['index', 'store', 'destroy'])->names('ejecutor.informes')->middleware('auth.ejecutor');
Route::put('ejecutor/informe/{informe}', [EjecutorController::class, 'enviarinforme'])->name('ejecutor.enviarinforme')->middleware('auth.ejecutor');
