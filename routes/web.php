<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CuotasController;


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


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('plantillatareas');
})->middleware(['auth', 'verified'])->name('plantillatareas');

Route::controller(TareasController::class)->group(function(){
    Route::get('/tareaspendientes','showPending')->middleware(['auth','admin'])->name('tareaspendientes');
    Route::get('/tareacompleta/{id}','tareaCompleta')->middleware(['auth','admin'])->name('tareacompleta');
    Route::get('/completartarea/{id}','completarTareaView')->middleware(['auth'])->name('completartareaview');
    Route::put('/completar/{id}','completarTarea')->middleware(['auth'])->name('completartarea'); 
    Route::get('/eliminartarea/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminartarea');
});

Route::controller(UsuariosController::class)->group(function(){
    Route::get('/eliminarusuario/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminarusuario');
});

Route::controller(ClientesController::class)->group(function(){
    Route::get('/eliminarcliente/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminarcliente');
});

Route::resource('tareas', TareasController::class)->middleware('auth'); 
Route::resource('usuarios', UsuariosController::class)->middleware(['auth','admin']); 
Route::resource('clientes', ClientesController::class)->middleware(['auth','admin']); 
Route::resource('cuotas', CuotasController::class)->middleware(['auth','admin']); 


