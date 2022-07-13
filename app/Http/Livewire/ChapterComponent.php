<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChapterComponent extends Component
{

    public function store ()
    {
        dd('chapter store');
    }

    public function render()
    {
        return view('livewire.chapter-component');
    }
}
