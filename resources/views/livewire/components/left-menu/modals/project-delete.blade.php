<div class="modal fade" id="projectDeleteModal" data-backdrop="static" data-keyboard="true" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Удалить проект «{{ $projectTitle }}»?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-secondary">
                    <small>При удалении проекта также будут удалены все связанные с ним <strong>парсеры</strong>. Это действие
                        отменить не удастся.</small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Отмена') }}</button>
                <button wire:click="projectDelete" type="button" class="btn btn-danger">{{ __('Удалить') }}</button>
            </div>
        </div>
    </div>
</div>
