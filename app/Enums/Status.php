<?php

namespace App\Enums;

enum Status: string
{
    case NOT_STARTED = 'not_started';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public static function getSelectOptions(): array
    {
        return [
            '' => __('Chose Status'),
            self::NOT_STARTED->value => __("Haven't started yet"),
            self::IN_PROGRESS->value => __('In progress'),
            self::COMPLETED->value => __('Completed'),
            self::CANCELLED->value => __('Cancelled'),
        ];
    }
    public static function getLabel(string $value): string
    {
        return match ($value) {
            self::NOT_STARTED->value => __("Haven't started yet"),
            self::IN_PROGRESS->value => __('In progress'),
            self::COMPLETED->value => __('Completed'),
            self::CANCELLED->value => __('Cancelled'),
        };
    }
}
