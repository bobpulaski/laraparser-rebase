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
    public $title;
    public $project_id;
    public $activeProjectId;
    public $activeChapterId;

    public $chapters;

    public function render ()
    {

        $this->projects = Project::where ('user_id', Auth::id ())
            ->toBase ()
            ->get ();

        $this->chapters = DB::table ('chapters')
            ->leftJoin ('projects', 'chapters.project_id', '=', 'projects.id')
            ->where ('user_id', Auth::id ())
            ->select('chapters.*')
            ->get ();

        //dd($this->chapters);

        return view ('livewire.left-menu');
    }

    public function createProject ()
    {
        $this->dispatchBrowserEvent ('show-project-modal-form-event');
    }

    public function storeProject ()
    {
        $projects = new Project();
        $projects->user_id = Auth::id ();
        $projects->title = $this->title;
        $projects->save ();

        $this->activeProjectId = $projects->id;
    }

    public function projectEdit (Project $project)
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

    public function ChapterAdd (Project $project)
    {
        $this->project_id = $project->id;
        //$this->project_id = $project->id;

        $this->dispatchBrowserEvent ('show-chapter-modal-form-event');
    }


    public function storeChapter (Project $project)
    {
        $chapters = new Chapter();
        $chapters->project_id = $this->project_id;
        $chapters->title = $this->title;
        $chapters->save ();

        $this->activeChapterId = $chapters->id;
    }
}
