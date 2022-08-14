<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LeftMenu extends Component
{
    public $projects; // Для получение данных из модели Project
    public $chapters; // Для получение данных из модели Chapter
    public $title; // Поле в обеих моделях, к которому идет привязка компонента

    public $activeProjectId; // Получаем текущий ID записи модели Project для определения активного пункта меню
    public $activeChapterId; // Получаем текущий ID записи модели Chapter для определения активного пункта меню

    public $whatKindOfModal = ''; // Определяем с каким окном какой модели работаем
    public $submitButtonState = 'disabled'; // Определяем состояние кнопки "Создать" активна или нет при валидации формы

    public $projectId;
    public $projectTitle;

    public $chapterId;
    public $chapterTitle;

    protected $rules = [
        'title' => 'required|min:3|max:20',
    ];
    public function updated($propertyName)
    {
        $this->submitButtonState = 'disabled';
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
        $this->dispatchBrowserEvent('toastr-project-stored-event');
    }

    public function storeChapter()
    {
        $chapters = Chapter::create([
            'project_id' => $this->activeProjectId,
            'title' => $this->title,
        ]);
        $this->activeChapterId = $chapters->id;
        $this->dispatchBrowserEvent('hide-chapter-modal-form-event');
        $this->dispatchBrowserEvent('toastr-chapter-stored-event');
    }

    public function projectDeleteShowModal($projectId)
    {
        $this->whatKindOfModal = 'project';
        $this->projectId = $projectId;
        $this->projectTitle = Project::find($projectId)->title;
        $this->dispatchBrowserEvent('show-project-delete-modal-form-event');
    }

    public function projectDelete()
    {
        dd($this->projectId);
    }

    public function chapterDeleteShowModal($chapterId)
    {
        $this->whatKindOfModal = 'chapter';
        $this->chapterId = $chapterId;
        $this->chapterTitle = Chapter::find($chapterId)->title;
        $this->dispatchBrowserEvent('show-chapter-delete-modal-form-event');
    }

    public function chapterDelete()
    {
        DB::table('chapters')
            ->where('id', $this->chapterId)
            ->delete();
            
        $this->dispatchBrowserEvent('hide-chapter-delete-modal-form-event');
        $this->dispatchBrowserEvent('toastr-chapter-deleted-event');
    }

    public function render()
    {
        /*$this->projects = Project::where('user_id', Auth::id())
            ->toBase()
            ->get();*/

        $this->projects = DB::table('projects')
            ->where('user_id', Auth::id())
            ->select('id', 'title')
            ->get();

        $this->chapters = DB::table('chapters')
            ->leftJoin('projects', 'chapters.project_id', '=', 'projects.id')
            ->where('user_id', Auth::id())
            ->select('chapters.*')
            ->get();

        return view('livewire.left-menu');
    }
}
