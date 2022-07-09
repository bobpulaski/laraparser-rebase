<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChapterNode extends Component
{
    public $project_id;

    function mount ($project_id)
    {
        $this->project_id = $project_id;
    }

    public function render ()
    {
        return view ('livewire.chapter-node');
    }
}
