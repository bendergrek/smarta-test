<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

final class CreateCourseGroupController extends Controller
{
    public function __invoke(): View
    {
        $courses = Course::all();

        return view('course-group.create', compact('courses'));
    }
}
