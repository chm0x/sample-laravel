<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("notes")->insert([
            'title' => 'Nota 1',
            'content' => 'Contenido 1',
        ]);

        DB::table("notes")->insert([
            'title' => 'Nota 2',
            'content' => 'Contenido 2',
        ]);
        
        DB::table("notes")->insert([
            'title' => 'Nota 3',
            'content' => 'Contenido 3',
        ]);

        DB::table("notes")->insert([
            'title' => 'Nota 4',
            'content' => 'Contenido 4',
        ]);
        DB::table("notes")->insert([
            'title' => 'Nota 5',
            'content' => 'Contenido 5',
        ]);
    }
}
