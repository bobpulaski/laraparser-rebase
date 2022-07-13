<div>

    {{--@include('livewire.project.create-modal')
    @include('livewire.chapter.create-modal')--}}


    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <div class="d-flex justify-content-between">
            <div class="nav-header">ПРОЕКТЫ</div>
            <div class="mr-2">
                @livewire('project-component')
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

                    {{--@foreach($chapters as $chapter)
                        @if($chapter->project_id == $project->id)
                            <li class="nav-item font-weight-light">
                                <a href="" class="nav-link --}}{{--@if ($chapter->id === $activeChapterId) active @endif--}}{{--">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $chapter->title }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach--}}

                        @livewire('chapter-component')

                </ul>


            </li>
        @endforeach

    </ul>


</div>
