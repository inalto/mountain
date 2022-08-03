<?php

namespace App\Http\Livewire\Inalto\Admin\Users;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [

            NumberColumn::name('id')->filterable(),

            Column::name('name')->filterable()->searchable(),

            Column::name('email')->truncate()->filterable()->searchable(),

            DateColumn::name('created_at')->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('inalto.components.users-table-actions', ['id' => $id, 'name' => $name]);
            }),
        ];
    }
}
