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

Route::get('/', [UserController::class, 'welcomeWittData'])->name('welcome');

Route::get('/login',[UserController::class, 'index'])->name('login');
Route::post('/loginenter',[UserController::class, 'login'])->name('loginenter');

Route::get('/usuarios', [UserController::class, 'usersWithData'])->name('usuarios');
Route::post('/usuarioupdate/{id}', [UserController::class, 'update'])->name('usuarioUpdate');
Route::post('/registroenter',[UserController::class, 'Guardar'])->name('registroenter');
Route::post('/usuarioDelete/{id}', [UserController::class,'destroy'])->name("usuarioDelete");

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/crearmuestra',[MuestraController::class, 'MuestraWithData'])->name('crearmuestra');
Route::post('/guardar', [MuestraController::class, 'Guardar'])->name('guardar');
Route::get('/muestra/{id}', [MuestraController::class, 'muestraInfo'])->name('muestra');

Route::get('/interpretar/{id}', [InterpretacionController::class, 'index'])->name('interpretar');
Route::post('/interpretarenter', [InterpretacionController::class, 'create'])->name('interpretarenter');

Route::get('/borrarMuestra/{id}', [MuestraController::class, 'delete'])->name('borrarMuestra');

Route::get('/Mfiltrar', function () {
    return view('Mfiltrar');
});

Route::get('/Mprueba', function () {
    return view('prueba');
});

