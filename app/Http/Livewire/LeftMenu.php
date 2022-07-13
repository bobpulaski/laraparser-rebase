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

    public $projectTitle;
    public $chapterTitle;

    public $projectId;

    public function render ()
    {

        $this->projects = Project::where ('user_id', Auth::id ())
            ->toBase ()
            ->get ();

        $this->chapters = DB::table ('chapters')
            ->leftJoin ('projects', 'chapters.project_id', '=', 'projects.id')
            ->where ('user_id', Auth::id ())
            ->select ('chapters.*')
            ->get ();

        return view ('livewire.left-menu');
    }

    public function storeProject ()
    {
        Project::create([
            'user_id' => Auth::id (),
            'title' => $this->projectTitle,
        ]);

        $this->dispatchBrowserEvent ('hide-project-modal-form-event');
    }


    public function chapterShowModal ($projectId)
    {

        $this->projectId = $projectId;
        $this->dispatchBrowserEvent ('show-chapter-modal-form-event');
    }

    public function storeChapter ()
    {

        //dd($this->projectId);

        Chapter::create([
            'project_id' => $this->projectId,
            'title' => $this->chapterTitle,
        ]);

        $this->dispatchBrowserEvent ('hide-chapter-modal-form-event');
    }




    /*public function storeChapter ()
    {
        Project::create([
            'user_id' => Auth::id (),
            'title' => $this->projectTitle,
        ]);

        $this->dispatchBrowserEvent ('hide-project-modal-form-event');
    }*/


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

    /*    public function ChapterAdd (Project $project)
        {
            $this->project_id = $project->id;

            $this->dispatchBrowserEvent ('show-chapter-modal-form-event');
        }*/


}
