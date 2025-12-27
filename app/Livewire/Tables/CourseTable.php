<?php

declare(strict_types=1);

namespace App\Livewire\Tables;

use App\Models\Course;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

final class CourseTable extends DataTableComponent
{
    protected $model = Course::class;

    public ?int $perPage = 100;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([50, 100])
            ->setEmptyMessage('Нет курсов. Необходимо их импортировать.')
            ->setColumnSelectHiddenOnTablet()
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
                ->searchable()
                ->sortable(),

            Column::make('Код', 'code')
                ->sortable(),

            Column::make('Название', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Дата добавления', 'created_at')
                ->sortable(),
        ];
    }
}
