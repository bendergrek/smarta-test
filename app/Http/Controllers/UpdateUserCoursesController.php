<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class UpdateUserCoursesController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'courses' => 'nullable|array',
            'courses.*' => 'exists:courses,id',
        ]);

        Auth::user()->courses()->sync($validated['courses']);

        return redirect()->back()->with('success', 'Курсы пользователя успешно обновлены!');
    }
}
