<?php

namespace App\Repositories;

use App\Models\Club;
use App\Models\System;

class SystemRepository extends BaseRepository
{
    public function getModel()
    {
        return System::class;
    }
}
