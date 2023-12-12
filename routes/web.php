<?php

use App\Http\Controllers\NoteController;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

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
    return 'Página de inicio';
});

Route::get('/notas', [NoteController::class, 'index'])->name('notes.index');

Route::get('/notas/{id}', [NoteController::class, 'show'])->name('notes.view');

Route::get('/notas/crear', [NoteController::class, 'create'])->name('notes.create');

Route::post('/notas', [NoteController::class, 'store'])->name('notes.store');

Route::get('/notas/{id}/editar', [NoteController::class, 'edit'])->name('notes.edit');





