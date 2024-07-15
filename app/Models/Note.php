<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content'];


    // Ya no es necesario poner. POrque ya pusimos en el Componente "NoteCard"
    // public function editUrl(){

    //     return route('notes.edit', [ 'id' => $this->id ]);
    // }

    // public function create(){

    // }
}
