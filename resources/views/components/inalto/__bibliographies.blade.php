<div  x-data='bib()'>
    <template x-for="(item, index) in bibliographies" :key="index">
        <div class="flex">
            <div class="w-1/3 form-group py-3">
                <x-input class="w-full form-control" wire:model.defer="{{ $name }}.[index].title"
                    x-model="item.title" placeholder="Titolo" type="text" name="title[]" />
            </div>
            <div class="w-1/3 form-group p-3">
                <x-input class="w-full form-control" wire:model.defer="{{ $name }}.index.author" x-model="item.author" placeholder="Autore"
                    type="text" name="author[]" />
            </div>
            <div class="w-1/3  form-group p-3">
                <x-input class="w-full form-control" wire:model.defer="{{ $name }}.index.link" x-model="item.link" placeholder="Link"
                    type="url" name="link[]" />
            </div>
            <button type="button" class="btn w-10 h-10  my-3" @click="remove(index)">&times;</button>
        </div>
    </template>
    
    {{json_encode($bibliographies)}}

    <button type="button" class="btn btn-info my-2" @click="add()">Aggiungi</button>
</div>

<script>
    function bib() {
        return {
            //"bibliographies": @entangle($attributes->wire('bibliographies')),
            "bibliographies": @json($bibliographies),
            add() {
                this.bibliographies.push({
                    title: "",
                    author: "",
                    link: ""
                });
            },
            remove(index) {
                this.bibliographies.splice(index, 1);
            }
        }
    }
</script>
