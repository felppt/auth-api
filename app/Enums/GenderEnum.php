<?php

namespace App\Enums;

enum GenderEnum: string
{
    case male = 'male';
    case female = 'female';

    public static function select(): array
    {
        return [
            self::male->value => "Мужской",
            self::female->value => "Женский",
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::male => 'Мужской',
            self::female => 'Женский',
        };
    }
}
