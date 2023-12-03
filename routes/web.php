<?php

use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/notas', function () {
   $notes = Note::query()
       ->orderByDesc('id')
       ->get()
   ;

   return view('notes.index')->with('notes', $notes);
})->name('notes.index');

Route::get('/notas/{id}', function ($id) {
    return 'Detalle de la nota: '.$id;
})->name('notes.view');

Route::get('/notas/crear', function () {
   return view('notes.create');
})->name('notes.create');

Route::get('/notas/{id}/editar', function ($id) {
    $note = Note::findOrFail($id);

    return 'Editar nota: '.$note->title;
})->name('notes.edit');





