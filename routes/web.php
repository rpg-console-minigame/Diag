<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\InterpretacionController;

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

Route::post('/guardar', [MuestraController::class, 'Guardar'])->name('guardar');
Route::get('/muestra/{id}', [MuestraController::class, 'muestraInfo'])->name('muestra');

// Route::get('/interpretar/{id}', [InterpretacionController::class, 'index'])->name('interpretar');
// Route::get('interpretarInfo/{id}', [InterpretacionController::class,'data'])->name('interpretarInfo');
Route::post('/interpretarenter', [InterpretacionController::class, 'create'])->name('interpretarenter');
Route::get('/interpretarBorrar/{id}', [InterpretacionController::class , 'delete'])->name('interpretacionBorrar');

Route::get('/borrarMuestra/{id}', [MuestraController::class, 'delete'])->name('borrarMuestra');
Route::post('/actualizarMuestra/{id}', [MuestraController::class, 'actualizarMuestra'])->name('actualizarMuestra');

Route::get('/pdf/{id}', [PdfController::class, 'download'])->name('pdf');
