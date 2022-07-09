<div>

    @include('livewire.project.create-modal')


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
                    @livewire('chapter-node', ['project_id' => $project->id])

                </ul>

            </li>
        @endforeach

        <li class="nav-item">
            <button type="button" class="btn btn-block btn-outline-info btn-xs my-4 w-75 ml-2"
                    data-toggle="modal"
                    data-target="#createProjectModal" data-backdrop="false">
                Добавить новый проект
            </button>
        </li>


    </ul>


</div>
