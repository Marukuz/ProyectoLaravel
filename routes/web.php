<?php

use App\Http\Controllers\API\GithubAuthController;
use App\Http\Controllers\API\GoogleAuthController;
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

// Rutas tareas
Route::controller(TareasController::class)->group(function(){
    Route::get('/tareaspendientes','showPending')->middleware(['auth','admin'])->name('tareaspendientes');
    Route::get('/tareacompleta/{id}','tareaCompleta')->middleware(['auth','admin'])->name('tareacompleta');
    Route::get('/completartarea/{id}','completarTareaView')->middleware(['auth'])->name('completartareaview');
    Route::put('/completar/{id}','completarTarea')->middleware(['auth'])->name('completartarea'); 
    Route::get('/eliminartarea/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminartarea');
});

// Rutas usuarios
Route::controller(UsuariosController::class)->group(function(){
    Route::get('/eliminarusuario/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminarusuario');
});

// Rutas clientes
Route::controller(ClientesController::class)->group(function(){
    Route::get('/eliminarcliente/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminarcliente');
});

// Rutas cuotas
Route::controller(CuotasController::class)->group(function(){
    Route::get('/cuotas/{id}/crear', 'create')->middleware(['auth','admin'])->name('crearcuota');
    Route::get('/eliminarcuota/{id}','confirmDestroy')->middleware(['auth','admin'])->name('eliminarcuota');
    Route::get('/generarcuotasview','generarCuotasMensualesView')->middleware(['auth','admin'])->name('generarcuotasview');
    Route::post('/generarcuotas','generarCuotasMensuales')->middleware(['auth','admin'])->name('generarcuotas');
    Route::get('/cuotas/{id}/pdf', 'generarPDF')->name('generarpdf');
});

// Resources
Route::resource('tareas', TareasController::class)->middleware('auth'); 
Route::resource('usuarios', UsuariosController::class)->middleware(['auth','admin']); 
Route::resource('clientes', ClientesController::class)->middleware(['auth','admin']); 
Route::resource('cuotas', CuotasController::class)->middleware(['auth','admin']); 

// Login Google
Route::controller(GoogleAuthController::class)->group(function(){
    Route::get('/auth/google/callback', 'handleCallback')->name('google.login.callback');
    Route::get('/login-google','redirectToProvider')->name('google.login');
});

// Login Github
Route::controller(GithubAuthController::class)->group(function(){
    Route::get('/auth/github/callback', 'handleCallback')->name('github.login.callback');
    Route::get('/login-github','redirectToProvider')->name('github.login');
});
