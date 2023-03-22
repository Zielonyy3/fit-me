<?php

namespace App\Http\Livewire\Users;

use App\Models\Exercise;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setEmptyMessage(__('common.no_results_found'));
        $this->setColumnSelectStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            ImageColumn::make(__('common.avatar'))
                ->location(fn($row) => asset($row->previewImage))
                ->attributes(fn($row) => [
                    'class' => 'rounded-full',
                    'style' => 'width: 30px;',
                    'alt' => $row->name . ' Avatar',
                ]),
            Column::make(__('common.first_name'), "first_name")
                ->sortable()
                ->searchable(),
            Column::make(__('common.last_name'), "last_name")
                ->sortable()
                ->searchable(),
            Column::make(__('common.email'), "email")
                ->sortable()
                ->searchable(),
            Column::make(__('common.updated_at'), "updated_at")
                ->sortable(),

            ButtonGroupColumn::make(__('common.actions'))
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('edit')
                        ->title(fn($row) => __('common.edit'))
                        ->location(fn($row) => route('users.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-sm btn-secondary',
                            ];
                        }),
                ]),
            ComponentColumn::make(__('common.delete'), 'id')
                ->component('delete-form')
                ->attributes(fn($value, $row, Column $column) => [
                    'url' => route('exercises.destroy', $row)
                ]),
        ];
    }
}
