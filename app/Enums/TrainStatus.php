<?php

namespace App\Enums;

enum TrainStatus: string
{
    case SCHEDULED = 'scheduled';
    case ON_TIME = 'on_time';
    case DELAYED = 'delayed';
    case CANCELLED = 'cancelled';
    case EARLY = 'early';
}
