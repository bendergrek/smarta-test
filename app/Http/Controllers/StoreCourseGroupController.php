<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class StoreCourseGroupController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'courses' => 'nullable|array|max:3',
            'courses.*' => 'exists:courses,id',
        ]);

        $user = Auth::user();

        $courseGroup = $user->courseGroups()->create(['name' => $validated['name']]);
        $courseGroup->courses()->sync($validated['courses']);

        return redirect()->route('course-groups')->with('success', 'Группа курсов создана');
    }
}
