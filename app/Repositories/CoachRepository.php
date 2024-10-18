<?php

namespace App\Repositories;

use App\Models\Coach;

class CoachRepository extends BaseRepository
{
    public function getModel()
    {
        return Coach::class;
    }

    public function getCoachHasClubs()
    {
        $coach = $this->model->club()->get() ?? [];
        $manager = $this->model->manager()->get() ?? [];
        return array_merge(...$coach, ...$manager);
    }

    public function isHasClub($id) {
        $coach = $this->model->club()->find($id) ?? [];
        $manager = $this->model->manager()->find($id) ?? [];

        return array_merge((array)$coach, (array)$manager);
    }

}
