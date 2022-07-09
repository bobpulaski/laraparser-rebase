<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LeftMenu extends Component
{
    public $projects, $title, $activeProjectId, $activeChapterId;

    public function render()
    {

        $this->projects = Project::toBase()
            ->where('user_id', Auth::id())
            ->get();
        return view('livewire.left-menu');
    }

    public function storeProject()
    {
        $projects = new Project();
        $projects->user_id = Auth::id();
        $projects->title = $this->title;
        $projects->save();

        $this->activeProjectId = $projects->id;
    }

    public function storeChapter()
    {
        dd(id);

        $chapters = new Chapter();
        $chapters->project_id = $this->activeProjectId;
        $chapters->title = $this->title;
        $chapters->save();

        $this->activeChapterId = $chapters->id;
    }
}
