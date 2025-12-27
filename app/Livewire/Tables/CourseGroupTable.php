<?php

declare(strict_types=1);

namespace App\Livewire\Tables;

use App\Models\CourseGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;

final class CourseGroupTable extends DataTableComponent
{
    public ?int $perPage = 100;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([50, 100])
            ->setColumnSelectHiddenOnTablet()
            ->setEmptyMessage('Нет созданных групп.')
            ->setTableRowUrl(function ($group) {
                return route('course-groups.view', $group);
            })
            ->setPaginationDisabled()
            ->setSearchDisabled();
    }

    /**
     * Колонки таблицы.
     */
    public function columns(): array
    {
        return [
            Column::make('№', 'id')
                ->sortable(),

            Column::make('Название', 'name')
                ->sortable(),

            CountColumn::make('Курсов')
                ->setDataSource('courses'),

            Column::make('Дата добавления', 'created_at')
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();

        return CourseGroup::where('user_id', $user->id);
    }
}
