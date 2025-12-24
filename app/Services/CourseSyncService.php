<?php

declare(strict_types=1);

namespace App\Services;

//use App\DTOs\LearnProgramDTO;
use App\Data\CourseData;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

final class CourseSyncService
{
    public function syncFromApi(): void
    {
        $response = Http::withOptions(['verify' => false])
            ->get('https://edu.rosmintrud.ru/api/Reference/GetLearnProgram', [
                'IsActive' => true,
            ]);

        if (! $response->successful()) {
            throw new \Exception('Ошибка при получении справочника: '.$response->status());
        }

        $data = $response->json();
        $courses = $data['learnPrograms'];

        foreach ($courses as $course) {
            $courseData = CourseData::fromArray($course);
            Course::updateOrCreate(
                ['id' => $courseData->id],
                $courseData->toArray()
            );
        }
    }
}
