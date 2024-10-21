<?php

namespace App\Enums;

enum Status: int
{
    case NOT_STARTED = 1;
    case IN_PROGRESS = 2;
    case COMPLETED = 3;

    public static function getSelectOptions(): array
    {
        return [
            '' => __('Chose Status'),
            self::NOT_STARTED->value => __("Haven't started yet"),
            self::IN_PROGRESS->value => __('In progress'),
            self::COMPLETED->value => __('Finished'),
        ];
    }
}
