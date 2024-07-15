<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Note;

class NoteCard extends Component
{
    // public Note $note;

    /**
     * Create a new component instance.
     */
    public function __construct(public Note $note){
        // $this->note = $note;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.note-card', [
            'editUrl' => route('notes.edit', [ 'id' => $this->note->id ])
        ]);
        // return view('components.note-card', [
        //     'note' => $this->note
        // ]);
    }
}
