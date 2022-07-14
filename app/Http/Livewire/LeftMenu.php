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

    public $title;

    public $whatKindOfModal = '';

    public $activeProjectId;
    public $activeChapterId;

    public $submitButtonState = 'disabled';

    protected $rules = [
        'title' => 'required|min:3|max:20',
    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
        $this->submitButtonState = 'enabled';
    }

    public function resetAll()
    {
        $this->submitButtonState = 'disabled';
        $this->reset('title');
        $this->resetValidation('title');
    }

    public function projectAddShowModal()
    {
        $this->resetAll();
        $this->whatKindOfModal = 'project';
        $this->dispatchBrowserEvent('show-project-modal-form-event');
    }

    public function chapterAddShowModal($projectId)
    {
        $this->resetAll();
        $this->activeProjectId = $projectId;
        $this->whatKindOfModal = 'chapter';
        $this->dispatchBrowserEvent('show-chapter-modal-form-event');
    }


    public function storeProject()
    {
        $this->validate();
        $projects = Project::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
        ]);
        $this->activeProjectId = $projects->id;
        $this->dispatchBrowserEvent('hide-project-modal-form-event');
    }

    public function storeChapter()
    {
        $chapters = Chapter::create([
            'project_id' => $this->activeProjectId,
            'title' => $this->title,
        ]);
        $this->activeChapterId = $chapters->id;
        $this->dispatchBrowserEvent('hide-chapter-modal-form-event');
    }

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


}
