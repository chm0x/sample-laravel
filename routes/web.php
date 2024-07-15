<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// Does not need the DB.
use Illuminate\Support\Facades\DB;

// Para validar
use Illuminate\Validation\Rule;

// Controlladores
use App\Http\Controllers\NoteController;

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

Route::get('/home', function () {
    return view('welcome');
});

# PAGINA PRINCIPAL DE NOTES
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

// VIEW: CREAR NOTAS
Route::get('/notes/create', [NoteController::class,'create'])->name('notes.create');

// GUardar a la base de datos
Route::post('/notes', [NoteController::class,'store'])->name('notes.store');

# Detalles de la nota
Route::get('/notes/detail/{id}', [NoteController::class, 'show'])->name('notes.detail');

// Editar la Nota con el ID
Route::get('/notes/edit/{id}', [NoteController::class,'edit'])->name('notes.edit');

// Actualizar la nota
Route::put('/notes/detail/{id}', [NoteController::class,'update'])->name('notes.update');

// Eliminar una nota
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');