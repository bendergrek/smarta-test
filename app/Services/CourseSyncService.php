<?php

declare(strict_types=1);

namespace App\Services;

//use App\DTOs\LearnProgramDTO;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

final class CourseSyncService
{
    public function syncFromApi(): int
    {
        $response = Http::withOptions(['verify' => false])
            ->get('https://edu.rosmintrud.ru/api/Reference/GetLearnProgram', [
                'IsActive' => true,
            ]);

        if (! $response->successful()) {
            throw new \Exception('Ошибка при получении справочника: '.$response->status());
        }

        $data = $response->json();
/*
        $count = 0;
        foreach ($data as $item) {
            $dto = LearnProgramDTO::fromArray($item);
            LearnProgram::updateOrCreate(
                ['external_id' => $dto->id],
                $dto->toArray()
            );
            $count++;
        }

        return $count;*/
        return  3;
    }
}
