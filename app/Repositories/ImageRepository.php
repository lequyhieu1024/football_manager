<?php

namespace App\Repositories;



use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageRepository extends BaseRepository
{
    public function getModel()
    {
        return Image::class;
    }
    public function createImage($yard_id, $data) {
        if (is_array($data)) {
            foreach ($data['thumbnail'] as $thumbnail) {
            $thumbnail = Storage::disk('public')->put('uploads', $thumbnail);
                $data = [
                    'yard_id' => $yard_id,
                    'thumbnail' => $thumbnail,
                    'is_active' => 1,
                ];
                $this->model->create($data);
            }
        }
    }
}
