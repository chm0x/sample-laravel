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

Route::get('/notes', function() {

    // SIN ORM
    // $notes = DB::table('notes')->get();

    // CON ORM
    // $notes = Note::all();
    $notes = Note::query()
             ->orderBy('id', 'desc')
             ->get();

    
    return view('notes.index')->with('notes', $notes );
})->name('notes.index');


// CREAR NOTAS
Route::get('/notes/create', function(){
    return view('notes.create');
})->name('notes.create');

Route::post('/notes', function(Request $request){

    // Hay maneras para guardar a la DB

    // PRIMERA
    // Note::create(Request::all());

    // SEGUNDA
    // Note::create([
    //     'title' => Request::input('title'),
    //     'content' => Request::input('content'),
    //     // OPcional:
    //     // 'user_id' => auth()->id(),
    // ]);

    // TERCERA
    // Note::create(Request::all() + ['user_id' => auth()->id() ]);


    // VALIDACIONES 
    $request->validate([
        // 'title' => 'required|min:5|unique:notes,title',
        'title' => ['required', 'min:5', Rule::unique('notes', 'title') ],
        'content' => 'required',
    ]);
    // CON EL Illuminate\Http\Request
    Note::create([
        'title' => $request->input('title'),
        'content' => $request->input('content')
    ]);

    // return Request::all();
    // return "Procesando la creacion de la nota.";

    // Maneras de Redireccionar 
    // 1
    // return redirect()->route('notes.index');

    // 2
    // return Redirect::route('notes.index');

    // Y este es retornar a la misma pagina de la creacion de notas.

    return back();
})->name('notes.store');


// Ver el Detaller de la Nota con el ID
Route::get('/notes/detail/{id}', function($id) {
    $note = DB::table('notes')->find($id);

    return 'Detalle de la nota: '.$note->title;

})->name('notes.detail');


// Editar la Nota con el ID
Route::get('/notas/edit/{id}', function($id){

    // SIN ORM
    // $note = DB::table('notes')->find($id);
    
    // Con ORM
    $note = Note::findOrFail($id);
    // $note = Note::find($id);

    // dd($note); 

    // var_dump($note); die();

    // abort_if($note === null, 404);

    return 'Editar la Nota: ' . $note->title;
})->name('notes.edit');





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

