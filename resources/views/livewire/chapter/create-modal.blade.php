<!-- Modal -->
<div wire:ignore.self class="modal fade " id="createChapterModal" tabindex="-1" data-backdrop="static" data-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
{{--    <h1>({{ $project->id }})</h1>--}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создать новый парсер</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="labelForChapterTitleInput">Имя</label>
                <input id="labelForChapterTitleInput" type="text" class="form-control" placeholder="Название нового парсера"
                       wire:model="chapterTitle">
                @error('chapterTitle') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button wire:click.prevent="storeChapter()" type="button" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </div>
</div>