<!-- Modal -->
<div wire:ignore.self class="modal fade " id="createProjectModal" tabindex="-1" data-backdrop="static" data-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создать новый проект</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="labelForProjectTitleInput">Имя</label>
                <input id="labelForProjectTitleInput" type="text" class="form-control" placeholder="Название нового проекта"
                       wire:model="projectTitle">
                @error('projectTitle') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button wire:click.prevent="storeProject" type="button" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </div>
</div>