<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Player;
use Illuminate\Support\Facades\DB;
use App\Enums\Network;

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

    public function getScoreByStudentSubjectId($studentId, $subjectId)
    {
        $student = $this->model->with(['coaches' => function ($query) use ($subjectId) {
            $query->where('coaches.id', $subjectId);
        }])->findOrFail($studentId);

        $subject = $student->subjects->first();

        if ($subject) {
            return $subject->pivot->score;
        } else {
            return null;
        }
    }

    public function updateScore($studentId, $scores)
    {
        $student = $this->findOrFail($studentId);
        $student->subjects()->sync($scores);
    }

    public function registerSubject($studentId, $subjectId)
    {
        $student = $this->model->findOrFail($studentId);
        $student->subjects()->attach($subjectId);
        if ($student->status == \App\Enums\Status::NOT_STUDIED_YET->value) {
            $student->update(['status' => \App\Enums\Status::STUDYING->value]);
        }
        return $student;
    }
}
