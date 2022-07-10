<!-- Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создать новый проект</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">
                    <label for="createNewProjectInput">Имя</label>
                    <input type="text" class="form-control" id="createNewProjectInput" placeholder="Название проекта"
                           wire:model.defer="title">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button wire:click.prevent="storeProject()" type="button" class="btn btn-primary" data-dismiss="modal">Создать
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
