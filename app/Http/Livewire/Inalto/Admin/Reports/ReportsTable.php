<?php

namespace App\Http\Livewire\Inalto\Admin\Reports;

use App\Models\Report;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ReportsTable extends LivewireDatatable
{
    public $model = Report::class;

    public function builder()
    {
        return Report::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),
            Column::name('title')
                ->label('Titolo')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),
            DateColumn::name('created_at')
                ->label('Data')
                ->filterable(),
            Column::name('slug')->hide(),
            Column::callback(['id', 'slug'], function ($id, $slug) {
                return view('inalto.components.reports-table-actions', ['id' => $id, 'slug' => $slug]);
            }),
        ];
    }
}
