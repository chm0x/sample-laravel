<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

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
            'editUrl' => route('notes.edit', [ 'id' => $this->note->id ]),
        ]);
        // return view('components.note-card', [
        //     'editUrl' => route('notes.edit', [ 'id' => $this->note->id ]),
        //     'renderedContent' => new HtmlString(Str::markdown($this->note->content, [
        //         'html_input' => 'escape'
        //         // 'html_input' => 'strip'
        //     ])),
        // ]);
        // return view('components.note-card', [
        //     'editUrl' => route('notes.edit', [ 'id' => $this->note->id ]),
        //     'renderedContent' => Str::markdown($this->note->content, [
        //         'html_input' => 'escape'
        //         // 'html_input' => 'strip'
        //     ]),
        // ]);
        // return view('components.note-card', [
        //     'note' => $this->note
        // ]);
    }

    public function renderContent(): HtmlString{
        return new HtmlString(Str::markdown($this->note->content, [
            'html_input' => 'escape'
            // 'html_input' => 'strip'
        ]));
    }
}
