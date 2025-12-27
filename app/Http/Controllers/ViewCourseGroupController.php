<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CourseGroup;
use Illuminate\View\View;

final class ViewCourseGroupController extends Controller
{
    public function __invoke(CourseGroup $group): View
    {
        return view('course-group.view', compact('group'));
    }
}
