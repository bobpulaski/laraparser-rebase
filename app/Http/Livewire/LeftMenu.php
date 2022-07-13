<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LeftMenu extends Component
{
    public $projects;
    public $chapters;
    public $chapterTitle;
    public $activeProjectId;


    public $activeChapterId;

    protected $listeners = ['projectAdded' => 'render'];

    public function render()
    {

        $this->projects = Project::where('user_id', Auth::id())
            ->toBase()
            ->get();

        $this->chapters = DB::table('chapters')
            ->leftJoin('projects', 'chapters.project_id', '=', 'projects.id')
            ->where('user_id', Auth::id())
            ->select('chapters.*')
            ->get();

        return view('livewire.left-menu');
    }


    public function projectEdit(Project $project)
    {

        //dd ($project);

        //dd ($this->project_id);


        /*$project = Project::find ($project_id);
        if ($project) {
            $this->title = $project->title;
        } else {
            return redirect ()->to ('/dashboard');
        }*/
    }

    /*    public function ChapterAdd (Project $project)
        {
            $this->project_id = $project->id;

            $this->dispatchBrowserEvent ('show-chapter-modal-form-event');
        }*/


}
