<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

final class EditUserCoursesController extends Controller
{
    public function __invoke(): View
    {
        $courses = Course::all();
        $userCourseIds = auth()->user()->courses()->pluck('id')->toArray();

        return view('user.courses', compact('courses', 'userCourseIds'));
    }
}
