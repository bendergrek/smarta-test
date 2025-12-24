<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\CourseSyncService;
use Illuminate\Console\Command;

final class SyncCourseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-course';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Синхронизирует справочник курсов';

    /**
     * Execute the console command.
     */
    public function handle(CourseSyncService $courseSyncService): void
    {
        $courseSyncService->syncFromApi();
    }
}
