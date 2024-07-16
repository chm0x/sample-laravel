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
            'size' => $this->determineSize($this->note->content),
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

    public function determineSize(string $content): string
    {

        // dd($content);
        // SOLO SE HIZO EL MATCH SI ESTA DENTRO DEL "BACKTICK"
        preg_match_all("/```(.+?)```/s", $content, $matches);

        if(count($matches[0]) === 0 ){
            return "small";
        }
        
        $maxLength = collect($matches[1])
                            ->flatMap(function($block){
                                return explode(PHP_EOL, $block);
                            })
                            ->map(fn($line) => strlen($line))
                            ->max();
        
        if($maxLength > 40){
            return "big";
        }
        if($maxLength > 30){
            return "medium";
        }

        return "small";

    }
}
