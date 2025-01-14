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
    return 'Bienvenido a la aplicacion ';
})->name('home.1');

Route::get('/notes', function () {
    
    $notes = [
        'Primera Nota',
        'Segunda Nota',
        'Tercera Nota',
        'Cuarta  Nota',
        'Quinta  Nota',
    ];

return view('notes.index')->with('notes', $notes); // El primer argumento del metodo ->with es con el que vamos a llamara la variable en la vista de blade
// y el segundo argumento es la variable que queremos traer para que el primer argumento envie a blade
})->name('notes.index');

Route::get('/notes/create', function () {
    return view('notes.create');
 })->name('notes.create');

 Route::get('/notes/{id}', function ($id) {
    return 'Detalle de la nota: '.$id;
})->name('notes.view');


Route::get('/notes/{id}/edit', function ($id) {
    return 'Editar nota: '.$id;
})->name('notes.edit');