<div>
    @foreach ($bibliographies as $bibliography)
        <div class="flex" wire:key="{{ $loop->index }}">
            <div class="w-1/4 form-group py-3">
                <input class="w-full form-control" name="{{ $name }}[{{ $loop->index }}][title]"
                    wire:model="{{ $name }}.{{ $loop->index }}.title" placeholder="Titolo" type="text" />
            </div>
            <div class="w-1/4 form-group p-3">
                <x-input class="w-full form-control" name="{{ $name }}[{{ $loop->index }}][author]"
                    wire:model="{{ $name }}.{{ $loop->index }}.author" placeholder="Autore" type="text" />
            </div>
            <div class="w-1/4  form-group p-3">
                <x-input class="w-full form-control" name="{{ $name }}[{{ $loop->index }}][publisher]"
                    wire:model="{{ $name }}.{{ $loop->index }}.publisher" placeholder="Editore" type="text" />
            </div>
            <div class="w-1/4  form-group p-3">
                <x-input class="w-full form-control" name="{{ $name }}[{{ $loop->index }}][link]"
                    wire:model="{{ $name }}.{{ $loop->index }}.link" placeholder="Link" type="url" />
            </div>
            <button type="button" class="btn w-10 h-10  my-3"
                wire:click.prevent="removeBibliography({{ $loop->index }})">&times;</button>
        </div>
    @endforeach
    <button type="button" class="btn btn-info my-2" wire:click.prevent="addBibliography()">Aggiungi</button>
</div>
