<?php

namespace App\Http\Livewire\WorkoutPlans;

use App\Models\Exercise;
use App\Models\WorkoutPlan;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class WorkoutPlanTable extends DataTableComponent
{
    protected $model = WorkoutPlan::class;

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
            Column::make(__('common.name'), "name")
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
                    LinkColumn::make('edit')
                        ->title(fn($row) => __('common.edit'))
                        ->location(fn($row) => route('workout-plans.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-sm btn-secondary',
                            ];
                        }),
                ]),

            ComponentColumn::make(__('common.delete'), 'id')
                ->component('delete-form')
                ->attributes(fn($value, $row, Column $column) => [
                    'url' => route('workout-plans.destroy', $row)
                ]),
        ];
    }
}
