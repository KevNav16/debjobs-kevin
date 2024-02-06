<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;

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

Route::get('/', HomeController::class)->name('home');
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');
//crear las vacantes
Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
//ruta para editar las vacantes con route modelbidin
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
//mostrar vacantes en general sin restriccion
Route::get('/vacantes/{vacante}/', [VacanteController::class, 'show'])->name('vacantes.show');
// candidatos
Route::get('/candidatos/{vacante}/', [CandidatoController::class, 'index'])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//notificacion
Route::get('/notificaciones',NotificacionController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
