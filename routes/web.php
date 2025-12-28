<?php

use App\Http\Controllers\CreateCourseGroupController;
use App\Http\Controllers\EditUserCoursesController;
use App\Http\Controllers\GetCourseGroupsController;
use App\Http\Controllers\GetCoursesController;
use App\Http\Controllers\StoreCourseGroupController;
use App\Http\Controllers\SyncCoursesController;
use App\Http\Controllers\UpdateUserCoursesController;
use App\Http\Controllers\ViewCourseGroupController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/courses');

    Route::get('courses', GetCoursesController::class)
        ->name('courses');

    Route::get('course-groups', GetCourseGroupsController::class)
        ->name('course-groups');

    Route::get('course-groups/view/{group}', ViewCourseGroupController::class)
        ->name('course-groups.view');

    Route::get('course-groups/create', CreateCourseGroupController::class)
        ->name('course-groups.create');

    Route::post('course-groups/create', StoreCourseGroupController::class)
        ->name('course-groups.store');

    Route::post('courses/sync', SyncCoursesController::class)
        ->name('courses.sync');

    Route::get('user/courses', EditUserCoursesController::class)
        ->name('user.courses');

    Route::post('user/courses', UpdateUserCoursesController::class)
        ->name('user.courses.update');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
