<?php

namespace App\Enums;

enum InvoiceType: int
{
    case OUTCOME = 0;
    case INCOME = 1;

    public static function options(): array
    {
        return array_map(function ($type) {
            return $type->value;
        }, self::cases());
    }
}
