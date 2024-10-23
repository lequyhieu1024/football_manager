<?php

namespace App\Repositories;


use App\Models\Yard;

class YardRepository extends BaseRepository
{
    public function getModel()
    {
        return Yard::class;
    }
}
