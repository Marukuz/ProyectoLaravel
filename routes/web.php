<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\UsuariosController;

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
    return view('plantillatareas');
})->middleware(['auth', 'verified'])->name('plantillatareas');


  
require __DIR__.'/auth.php';

Route::controller(TareasController::class)->group(function(){
    Route::get('/tareaspendientes',[TareasController::class,'showPending'])->middleware(['auth','admin'])->name('tareaspendientes');
    Route::get('/tareacompleta/{id}',[TareasController::class,'tareaCompleta'])->middleware(['auth','admin'])->name('tareacompleta');
    Route::get('/completartarea/{id}',[TareasController::class,'completarTareaView'])->middleware(['auth','admin'])->name('completartareaview');
    Route::put('/completar/{id}',[TareasController::class,'completarTarea'])->middleware(['auth','admin'])->name('completartarea'); 
});

Route::controller(UsuariosController::class)->group(function(){

});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('tareas', TareasController::class); 
    Route::resource('usuarios', UsuariosController::class); 
    Route::resource('clientes', ClientesController::class); 
});

