<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CON ORM
        $note = new Note();
        
        $note->title = "Hola Mundo";
        $note->content = "Contenido del Hola Mundo";

        $note->save();

        // Otra forma de asignar
        $note = new Note([
            'title' => 'Mi nuevo titulo 2',
            'content' => 'contenido 2',
        ]);

        $note->save();


        // SIN ORM
        // DB::table("notes")->insert([
        //     'title' => 'Nota 1',
        //     'content' => 'Contenido 1',
        // ]);

        // DB::table("notes")->insert([
        //     'title' => 'Nota 2',
        //     'content' => 'Contenido 2',
        // ]);
        // ...
    }
}
