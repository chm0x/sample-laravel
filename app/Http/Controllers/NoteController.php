<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    public function index()
    {

        $notes = Note::query()
            ->orderBy('id', 'desc')
            ->get();

        return view('notes.index')->with('notes', $notes);
    }

    public function show(int $id)
    {
        return 'Detalle de la Nota: ' . $id;
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        // VALIDACIONES 
        $request->validate([
            // 'title' => 'required|min:5|unique:notes,title',
            'title' => ['required', 'min:5', Rule::unique('notes', 'title')],
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
        // return back();

        return to_route('notes.index');
    }

    public function edit($id){
        $note = Note::findOrFail($id);

        return 'Editar nota: '. $note->title;
    }
}
