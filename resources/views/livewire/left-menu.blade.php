<div>

    @include('livewire.project.create-modal')
    @include('livewire.chapter.create-modal')


    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <div class="d-flex justify-content-between">
            <div class="nav-header">ПРОЕКТЫ</div>
            <div class="nav-header">
                <button type="button" title="Новый проект" class="btn btn-outline-light btn-xs" data-toggle="modal"
                        data-target="#createProjectModal">+
                </button>
            </div>
        </div>


        @foreach($projects as $project)
            <li class="nav-item @if ($project->id === $activeProjectId) menu-is-opening menu-open @endif">
                <a href="#" class="nav-link">
                    <p>
                        {{ $project->title }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview {{--border-bottom--}} pb-3"
                    style="@if ($project->id === $activeProjectId) display: block; @else display: none; @endif">

                    @foreach($chapters as $chapter)
                        @if($chapter->project_id == $project->id)
                            <li class="nav-item font-weight-light">
                                <a href="" class="nav-link {{--@if ($chapter->id === $activeChapterId) active @endif--}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $chapter->title }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach

                    {{--<button type="button" wire:click.prevent="projectEdit({{ $project->id }})" class="btn btn-info">
                        Изменить
                    </button>--}}

                    <button type="button" wire:click.prevent="storeChapter({{ $project->id }})" title="Новый парсер"
                            class="btn btn-outline-light btn-xs" {{--data-toggle="modal" data-target="#createChapterModal"--}}>
                        Добавить новый парсер
                    </button>

                </ul>


            </li>
        @endforeach

    </ul>


</div>
