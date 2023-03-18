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
   return 'Listado de notas';
});

Route::get('/notas/crear', function () {
   return 'Crear nueva nota';
});

Route::get('cursos', function () {
    return [
        'Cursos' => [
            'Curso de Laravel 10',
            'Curso de programación orientada a objetos',
            'Curso de Git',
        ]
    ];
});






