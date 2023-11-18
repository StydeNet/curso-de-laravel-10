<?php

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
   $notes = [
       'Primera nota',
       'Segunda nota',
       'Tercera nota',
       'Cuarta nota',
       'Quinta nota',
       '<script>alert("Código malicioso")</script>',
   ];

   return view('notes.index')->with('notes', $notes);
})->name('notes.index');

Route::get('/notas/{id}', function ($id) {
    return 'Detalle de la nota: '.$id;
})->name('notes.view');

Route::get('/notas/crear', function () {
   return view('notes.create');
})->name('notes.create');

Route::get('/notas/{id}/editar', function ($id) {
    return 'Editar nota: '.$id;
})->name('notes.edit');





