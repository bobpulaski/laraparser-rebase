<div>

    {{--@include('livewire.project.create-modal')
    @include('livewire.chapter.create-modal')--}}


    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <div class="d-flex justify-content-between">
            <div class="nav-header">{{ __('МОИ ПРОЕКТЫ') }}</div>
            <div class="mr-2">
                <!-- Button trigger modal -->
                <button wire:click.prevent="projectAddShowModal" type="button" title="{{ __('Создать новый проект') }}"
                        class="btn btn-block btn-outline-light btn-xs">
                    +
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
                                <a href=""
                                   class="nav-link @if ($chapter->id === $activeChapterId) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $chapter->title }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                <!-- Button trigger Chapter modal -->
                    {{--<button wire:click="chapterAddShowModal({{ $project->id }})" type="button"
                            class="btn btn-outline-light btn-xs">
                        {{ __('Добавить парсер') }}
                    </button>--}}
                    <div class="btn-group btn-block">
                        <button type="button" class="btn btn-xs btn-outline-secondary">{{ __('Проект') }}</button>
                        <button type="button" class="btn btn-xs btn-outline-secondary dropdown-toggle description-icon"
                                data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item small" style="color: #2d3748 !important; cursor: pointer;"
                               wire:click="chapterAddShowModal({{ $project->id }})">{{ __('Добавить парсер') }}</a>
                            <a class="dropdown-item small"
                               style="color: #2d3748 !important; cursor: pointer;">{{ __('Изменить проект') }}</a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item small"
                               style="color: #8B2252 !important; cursor: pointer;">
                                {{ __('Удалить проект') }}
                            </a>
                        </div>
                    </div>
                </ul>
            </li>
        @endforeach
    </ul>


    <!-- Left Menu Modal -->
    <div wire:ignore.self class="modal fade"

         @switch ($whatKindOfModal)
         @case ('project')
         id="projectModal"
         @break
         @case ('chapter')
         id="chapterModal"
         @break
         @default
         id="NoKind"
         @endswitch

         data-backdrop="static"
         data-keyboard="true"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    @switch ($whatKindOfModal)
                        @case ('project')
                        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Создать новый проект') }}</h5>
                        @break
                        @case ('chapter')
                        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Создать новый прасер') }}</h5>
                        @break
                        @default
                        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Заголовок не определен') }}</h5>
                    @endswitch


                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Отмена') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>


                <div class="modal-body">


                    @switch ($whatKindOfModal)
                        @case ('project')
                        <p class="text-secondary">
                            <small>В проектах удобно группировать парсеры по логике их применения к разбору веб-страниц.
                                Например, к одному сайту или одному разделу сайта.</small>
                        </p>
                        @break
                        @case ('chapter')
                        <p class="text-secondary">
                            <small>В парсере...</small>
                        </p>
                        @break
                        @default

                    @endswitch


                    <div class="form-group">

                        @switch ($whatKindOfModal)
                            @case ('project')
                            <label for="exampleInputEmail1">{{ __('Имя') }}</label>
                            <input wire:model="title" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="{{ __('Название проекта') }}">
                            @break
                            @case ('chapter')
                            <label for="exampleInputEmail1">{{ __('Имя') }}</label>
                            <input wire:model="title" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="{{ __('Название парсера') }}">
                            @break
                            @default
                        @endswitch

                    </div>
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{ __('Отмена') }}</button>

                    @switch ($whatKindOfModal)
                        @case ('project')
                        @switch($submitButtonState)
                            @case('disabled')
                            <button wire:click="storeProject" type="button"
                                    class="btn btn-secondary disabled">{{ __('Создать') }}</button>
                            @break
                            @case('enabled')
                            <button wire:click="storeProject" type="button"
                                    class="btn btn-info">{{ __('Создать') }}</button>
                            @break
                            @default
                        @endswitch
                        @break

                        @case ('chapter')
                        @switch($submitButtonState)
                            @case('disabled')
                            <button wire:click="storeChapter" type="button"
                                    class="btn btn-secondary disabled">{{ __('Создать') }}</button>
                            @break
                            @case('enabled')
                            <button wire:click="storeChapter" type="button"
                                    class="btn btn-info">{{ __('Создать') }}</button>
                            @break
                            @default
                        @endswitch
                        @break
                        @default
                    @endswitch

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener('show-project-modal-form-event', event => {
            $('#projectModal').modal('show');
        })

        window.addEventListener('hide-project-modal-form-event', event => {
            $('#projectModal').modal('hide');
        })

        window.addEventListener('toastr-project-stored-event', event => {
            $(document).ready(function () {
                toastr.options.timeOut = 3500;
                toastr.info('Проект успешно создан!');
            });
        })

        window.addEventListener('show-chapter-modal-form-event', event => {
            $('#chapterModal').modal('show');
        })

        window.addEventListener('hide-chapter-modal-form-event', event => {
            $('#chapterModal').modal('hide');
        })

        window.addEventListener('toastr-chapter-stored-event', event => {
            $(document).ready(function () {
                toastr.options.timeOut = 3500;
                toastr.info('Парсер успешно создан!');
            });
        })

    </script>

</div>
