<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* Lista de controladores necesarios para el correcto funcionamiento de la aplicación. */
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DonativoController;
use App\Http\Controllers\VoluntariadoController;
use App\Http\Controllers\ApadrinamientoController;
use Illuminate\Routing\RouteRegistrar;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('usuarios', UserController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('animales', AnimalController::class);
Route::resource('donativos', DonativoController::class);
Route::resource('tareas', TareaController::class);
Route::resource('voluntariados', VoluntariadoController::class); 
Route::resource('apadrinamientos', ApadrinamientoController::class); 

require __DIR__.'/auth.php';
