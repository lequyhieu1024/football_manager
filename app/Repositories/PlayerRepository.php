<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Player;
use Illuminate\Support\Facades\DB;
use App\Enums\MatchType;

class PlayerRepository extends BaseRepository
{
    public function getModel()
    {
        return Player::class;
    }

    public function filter(array $data)
    {
        $query = $this->model->query();

        if (isset($data['age_from'])) {
            $dateFrom = Carbon::now()->subYears($data['age_from'])->toDateString();
            $query->where('yob', '<=', $dateFrom);
        }
        if (isset($data['age_to'])) {
            $dateTo = Carbon::now()->subYears($data['age_to'])->toDateString();;
            $query->where('yob', '>=', $dateTo);
        }
//        if (isset($data['score_from']) || isset($data['score_to'])) {
//            $query->whereHas('coaches', function ($query) use ($data) {
//                $query->select(DB::raw('AVG(score) as avg_score'))
//                    ->groupBy('student_id');
//
//                if (isset($data['score_from'])) {
//                    $query->having('avg_score', '>=', $data['score_from']);
//                }
//                if (isset($data['score_to'])) {
//                    $query->having('avg_score', '<=', $data['score_to']);
//                }
//            });
//        }
        return $query->paginate($data['size'] ?? 12);
    }
}
