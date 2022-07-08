<!-- Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Название проекта</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
                           wire:model.defer="title">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button wire:click.prevent="store()" type="button" class="btn btn-primary" data-dismiss="modal">Сохранить
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
