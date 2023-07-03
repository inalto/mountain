<?php

namespace App\Http\Livewire;

use App\Models\ContentCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataTableContentCategory extends LivewireDatatable
{
    public $model = ContentCategory::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable(),

            Column::name('slug')->searchable(),

            DateColumn::name('created_at'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.datatables.table-actions', ['id' => $id, 'name' => $name]);
            }),
        ];
    }
}
