<?php

declare(strict_types=1);

namespace App\Data;

final readonly class CourseData
{
    public function __construct(
        public int $id,
        public string $code,
        public string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? 0,
            code: $data['code'] ?? '',
            name: $data['title'] ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
        ];
    }
}
