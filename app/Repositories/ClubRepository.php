<?php

namespace App\Repositories;

use App\Models\Club;

class ClubRepository extends BaseRepository
{
    public function getModel()
    {
        return Club::class;
    }
}
