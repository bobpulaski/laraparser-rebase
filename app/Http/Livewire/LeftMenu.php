<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class LeftMenu extends Component
{
    public $projects;

    public function render ()
    {

        Project::all ();
        return view ('livewire.left-menu');
    }
}
