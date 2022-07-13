<div>

    {{--@include('livewire.project.create-modal')
    @include('livewire.chapter.create-modal')--}}


    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <div class="d-flex justify-content-between">
            <div class="nav-header">PROJECTS</div>
            <div class="mr-2">
                <!-- Button trigger modal -->
                <button type="button" title="Добавить новый проект" class="btn btn-block btn-outline-light btn-xs" data-toggle="modal" data-target="#projectModal">
                    +
                </button>
            </div>
        </div>


        @foreach($projects as $project)
            <li class="nav-item {{--@if ($project->id === $activeProjectId) menu-is-opening menu-open @endif--}}">
                <a href="#" class="nav-link">
                    <p>
                        {{ $project->title }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview {{--border-bottom--}} pb-3"
                    style="{{--@if ($project->id === $activeProjectId) display: block; @else display: none; @endif--}}">

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
                    <!-- Button trigger Chapter modal -->
                        <button wire:click="chapterShowModal({{ $project->id }})" type="button" class="btn btn-block btn-outline-light btn-xs" {{--data-toggle="modal" data-target="#chapterModal"--}}>
                            Add a new chapter
                        </button>
                </ul>
            </li>
        @endforeach

    </ul>


    <!-- Project Create Modal -->
    <div wire:ignore.self class="modal fade" id="projectModal" data-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add A New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input wire:model = "projectTitle" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Project Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="storeProject" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Chapter Create Modal -->
    <div wire:ignore.self class="modal fade" id="chapterModal" data-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input wire:model = "chapterTitle" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Chapter Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="storeChapter" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

</div>
