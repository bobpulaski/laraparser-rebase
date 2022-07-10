<div>

    @include('livewire.project.create-modal')
    @include('livewire.chapter.create-chapter-modal')


    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">ПРОЕКТЫ</li>


        @foreach($projects as $project)
                <li class="nav-item @if ($project->id === $activeProjectId) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <p>
                            {{ $project->title }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview border-bottom pb-3"
                        style="@if ($project->id === $activeProjectId) display: block; @else display: none; @endif">

                        @foreach($chapters as $chapter)
                            @if($chapter->project_id == $project->id)
                                <li class="nav-item">
                                    <a href="" class="nav-link @if ($chapter->id === $activeChapterId) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $chapter->title }}</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        <button type="button" wire:click.prevent="projectEdit({{ $project->id }})" class="btn btn-info">
                            Изменить
                        </button>
                        <button type="button" wire:click.prevent="ChapterAdd({{ $project->id }})" class="btn btn-info">
                            Добавить парсер
                        </button>

                    </ul>


                </li>
            @endforeach

            <li class="nav-item">
                <button type="button" wire:click.prevent="createProject"
                        class="btn btn-block btn-outline-info btn-xs my-4 w-75 ml-2">
                    Добавить новый проект
                </button>
            </li>


    </ul>


</div>
