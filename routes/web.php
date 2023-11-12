<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AmbientesController;
use App\Http\Controllers\DispositivosController;

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/ambientes', AmbientesController::class);
    Route::resource('/dispositivos', DispositivosController::class);
    route::view('criarambiente', 'criarambiente');
});