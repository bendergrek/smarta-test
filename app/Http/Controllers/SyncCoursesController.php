<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CourseSyncService;
use Illuminate\Http\RedirectResponse;

final class SyncCoursesController extends Controller
{
    public function __invoke(CourseSyncService $courseSyncService): RedirectResponse
    {
        $courseSyncService->syncFromApi();

        return back();
    }
}
