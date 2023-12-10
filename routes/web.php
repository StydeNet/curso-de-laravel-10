<?php

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

Route::post('/notas', function (Request $request) {
    $request->validate([
        'title' => ['required', 'min:3', Rule::unique('notes')],
        'content' => 'required',
    ]);

    Note::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    return back();
})->name('notes.store');

Route::get('/notas/{id}/editar', function ($id) {
    $note = Note::findOrFail($id);

    return 'Editar nota: '.$note->title;
})->name('notes.edit');





