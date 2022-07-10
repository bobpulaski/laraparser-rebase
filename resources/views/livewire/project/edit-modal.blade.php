<!-- Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создать новый проект</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form wire:submit.prevent="updateProject">
                @csrf
                <div class="modal-body">
                    <label for="editProjectInput">Имя</label>
                    <input type="text" class="form-control" id="editProjectInput" placeholder="Название проекта"
                           wire:model.defer="title">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Отмена</button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>

        </div>
    </div>
</div>