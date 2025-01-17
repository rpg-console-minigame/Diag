<?php

use App\Http\Controllers\MuestraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterpretacionController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/formulario',[MuestraController::class, 'WelcomeWithData']);

Route::get('/login',[UserController::class, 'index']);

Route::post('/login',[UserController::class, 'login'])->name('login');

Route::get('/reguistro',[UserController::class, 'Datos']);

Route::post('/reguistro',[UserController::class, 'Guardar'])->name('reguistro');

Route::post('/guardar', [MuestraController::class, 'Guardar'])->name('guardar');

Route::get('/interpretaciones', [InterpretacionController::class, 'index'])->name('interpretaciones');
Route::post('/interpretar', [InterpretacionController::class, 'create'])->name('interpretar');
