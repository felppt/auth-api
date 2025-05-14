<?php

namespace App\Enums;

enum TaskStatus: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::NEW => 'Новая',
            self::IN_PROGRESS => 'В процессе',
            self::COMPLETED => 'Завершена',
        };
    }

    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
