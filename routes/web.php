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
    return view('welcome');
});

Route::get('/notas', function() {

    $notes = [
        'Primera Nota',
        'Segunda Nota',
        'Tercera Nota',
        'Cuarta Nota3',
        '<script>alert("Codigo Malicioso")</script>'
    ];

    return view('notes.index')->with('notes', $notes );
});


Route::get('/notas/crear', function(){
    return view('notes.create');
});

Route::get('/notas/{id}', function($id) {
    return 'Detalle de la nota: '.$id;
});

Route::get('/notas/{id}/editar', function($id){
    return 'Editar la Nota: ' . $id;
});





// Parametros Dinamicos

// Route::get('/notas/detalle/{id}', function($id) {
//     return 'Detalle del '.$id;
// });


// Route::get('/notas/{id}/editar', function($id){
//     return 'Editar Nota con el ID: '.$id;
// });


// RESTRICCIONES
// Route::get('/notas/detalle2/{id}', function($id) {
//     return 'Detalle del '.$id;
// })->where('id','\d+');
// Route::get('/notas/detalle3/{id}', function($id) {
//     return 'Detalle del '.$id;
// })->whereNumber('id');

