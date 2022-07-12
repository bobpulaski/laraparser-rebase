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
    public $projectTitle;
    public $chapterTitle;
    public $project_id;
    public $activeProjectId;

    public $chapters;
    public $activeChapterId;

    protected $rules = [
        'projectTitle' => 'required|min:3|max:20',
        'chapterTitle' => 'required|min:3|max:20',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

        public function storeProject ()
    {
        $this->validate([
            'projectTitle' => 'required|min:3|max:20',
        ]);

        $projects = new Project();
        $projects->user_id = Auth::id ();
        $projects->title = $this->projectTitle;
        $projects->save ();

        $this->activeProjectId = $projects->id;

        $this->dispatchBrowserEvent ('hide-project-modal-form-event');
    }

    public function storeChapter ($id)
    {
        //dd($id);
        $this->dispatchBrowserEvent ('show-chapter-modal-form-event');

        /*$this->validate([
            'chapterTitle' => 'required|min:3|max:20',
        ]);*/

        $chapters = new Chapter();
        $chapters->project_id = $id;
        $chapters->title = $this->chapterTitle;
        $chapters->save ();

        $this->activeChapterId = $chapters->id;
        $this->activeProjectId = $id;
    }

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

        return view ('livewire.left-menu');
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

/*    public function ChapterAdd (Project $project)
    {
        $this->project_id = $project->id;

        $this->dispatchBrowserEvent ('show-chapter-modal-form-event');
    }*/



}
