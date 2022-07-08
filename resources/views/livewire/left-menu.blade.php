<div>
    @include('livewire.project.create-modal')



    @foreach($projects as $project)
        <li class="nav-item {{--menu-open--}} @if ($project->title === $activeProjectItem) menu-open @endif">
            <a href="#" class="nav-link {{--active--}}">
                {{--<i class="nav-icon fas fa-tachometer-alt"></i>--}}
                <p>
                    <i class="right fas fa-angle-left"></i>
                    {{ $project->title }}
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item ml-2">
                    <a href="../UI/general.html" class="nav-link active">
                        {{--<i class="far fa-circle nav-icon"></i>--}}
                        <p>General</p>
                    </a>
                </li>
            </ul>

        </li>
    @endforeach

</div>
