<?php

namespace App\Http\Livewire\Routines;

use App\Models\Routine;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class RoutineTable extends DataTableComponent
{
    protected $model = Routine::class;

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
            ImageColumn::make(__('common.image'))
                ->location(
                    fn($row) => asset($row->previewImage)
                )
                ->attributes(fn($row) => [
                    'class' => 'rounded-full',
                    'style' => 'width: 30px;',
                    'alt' => $row->name . ' Avatar',
                ]),
            Column::make(__('common.name'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('common.owner'), "owner.first_name")
                ->sortable()
                ->searchable(),
            Column::make(__('common.created_at'), "created_at")
                ->sortable(),
            Column::make(__('common.updated_at'), "updated_at")
                ->sortable(),

            ButtonGroupColumn::make(__('common.actions'))
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('preview')
                        ->title(fn($row) => __('common.preview'))
                        ->location(fn($row) => route('routines.show', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-sm btn-primary',
                            ];
                        }),
                    LinkColumn::make('edit')
                        ->title(fn($row) => __('common.edit'))
                        ->location(fn($row) => route('routines.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-sm btn-secondary',
                            ];
                        }),
                    LinkColumn::make('delete')
                        ->title(fn($row) => __('common.delete'))
                        ->location(fn($row) => route('routines.destroy', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-sm btn-danger',
                            ];
                        }),
                ]),
        ];
    }
}
