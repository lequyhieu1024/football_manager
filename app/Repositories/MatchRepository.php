<?php

namespace App\Repositories;

use App\Enums\Status;
use App\Models\Coach;
use App\Models\FMatch;

class MatchRepository extends BaseRepository
{
    public function getModel()
    {
        return FMatch::class;
    }
    public function filter($data)
    {
        $query = $this->model->query();
        if (isset($data['club'])) {
            $query->where(function ($q) use ($data) {
                $q->where('club1_id', $data['club'])
                    ->orWhere('club2_id', $data['club']);
            });
        }
        if (isset($data['yard'])) {
            $query->whereHas('yard', function ($q) use ($data) {
                $q->where('yard_id', $data['yard']);
            });
        }
        if (isset($data['date_from'])) {
            $query->whereDate('at_day', '>=', $data['date_from']);
        }
        if (isset($data['date_to'])) {
            $query->whereDate('at_day', '<=', $data['date_to']);
        }
        if (isset($data['time_from'])) {
            $query->whereTime('at_time', '>=', $data['time_from']);
        }
        if (isset($data['time_to'])) {
            $query->whereTime('at_time', '<=', $data['time_to']);
        }
        return $query->paginate($data['size'] ?? 20);
    }
    public function cancelMatch($id) {
        $match = $this->model->findOrFail($id);
        $match->status = Status::CANCELLED->value;
        $match->save();
    }
}
