<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AmbientesController;
use App\Http\Controllers\DispositivosController;
use App\Http\Controllers\ESPsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/{ambiente_id?}', function ($ambiente_id = null) {
        return view('dashboard', ['ambiente_id' => $ambiente_id]);
    })->name('dashboard');
    Route::resource('/ambientes', AmbientesController::class);
    Route::resource('/dispositivos', DispositivosController::class)->except(['create']);
    Route::get('/dispositivos/create/{ambiente_id}', [DispositivosController::class, 'create'])->name('dispositivos.create');
    Route::delete('/dispositivos/{dispositivo}', [DispositivosController::class, 'destroy'])->name('dispositivos.destroy');
    Route::post('/dispositivos/estado/{esp_id}/{message}', [DispositivosController::class, 'estado'])->name('dispositivos.estado');
    Route::put('/dispositivos/temperatura/{id}/{esp_id}', [DispositivosController::class, 'temperatura'])->name('dispositivos.temperatura');
});
