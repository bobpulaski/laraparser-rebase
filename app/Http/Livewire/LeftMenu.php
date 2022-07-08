<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LeftMenu extends Component
{
    public $projects, $title, $activeProjectItem;

    public function render()
    {

        $this->projects = Project::toBase()->get('title');
        return view('livewire.left-menu');
    }

    public function store()
    {
        $projects = new Project();
        $projects->user_id = Auth::id();
        $projects->title = $this->title;
        $projects->save();

        $this->activeProjectItem = $projects->title;
    }
}
