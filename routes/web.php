<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GraficoController;

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

Route::get('/films', function () {
    return view('films');
});
Route::get('/', function () {
    return view('dashboard');
});
/* Route::get('create', [FilmController::class, 'create']);
Route::post('store', [FilmController::class, 'store'])->name('store'); */
Route::get('/grafico1', function () {
    return view('grafico1');
})->name('grafico1');
Route::get('/films', [FilmController::class, 'films'])->name('films');
Route::get('/meses', [GraficoController::class, 'meses'])->name('meses');
Route::get('/alquilerciudades', [GraficoController::class, 'alquileresXciudad1'])->name('alquileresXciudad1');
Route::post('/alquilerciudades', [GraficoController::class, 'alquileresXciudad2'])->name('alquileresXciudad2');
Route::get('/alquilerciudades+', [GraficoController::class, 'alquileresXciudad3'])->name('alquileresXciudad3');
Route::post('/alquilerciudades+', [GraficoController::class, 'alquileresXciudad4'])->name('alquileresXciudad4');
Route::get('/alquilerciudades2', [GraficoController::class, 'alquileresXciudad5'])->name('alquileresXciudad5');
Route::post('/alquilerciudades2', [GraficoController::class, 'alquileresXciudad6'])->name('alquileresXciudad6');
Route::get('/alquilerciudades3', [GraficoController::class, 'alquileresXciudad7'])->name('alquileresXciudad7');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
