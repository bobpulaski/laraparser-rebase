<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectComponent extends Component
{

    public $projectTitle;
    public $activeProjectId;



    protected $rules = [
        'projectTitle' => 'required|min:3|max:20',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store ()
    {
        $this->validate([
            'projectTitle' => 'required|min:3|max:20',
        ]);

        $projects = new Project();
        $projects->user_id = Auth::id ();
        $projects->title = $this->projectTitle;
        $projects->save ();

        $this->emitUp('projectAdded');

        $this->activeProjectId = $projects->id;

        $this->dispatchBrowserEvent ('hide-project-modal-form-event');
    }


    public function render()
    {
        return view('livewire.project-component');
    }
}
