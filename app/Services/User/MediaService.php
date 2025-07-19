<?php

namespace App\Services\User;

use App\Models\Attachment;
use App\Models\Audio;
use App\Models\Image;
use Illuminate\Auth\Events\Attempting;

class MediaService
{

    static function getAllMedia($id = null)
    {
        if (!$id) {
            return Attachment::all();
        }
        return Attachment::find($id);
    }

    static function addOrUpdateMedia($data, $attachment)
    {
        $attachment->capsule_id = $data['capsule_id'] ?? $attachment->capsule_id;
        $attachment->url = $data['url'] ?? $attachment->url;
        $attachment->attachable_id = $data['attachable_id'] ?? $attachment->attachable_id;
        $attachment->attachable_type = $data['attachable_type'] ?? $attachment->attachable_type;

        $attachment->save();
        return $attachment;
    }

    static function getMediaByCapsuleId($id = null)
    {
        if (!$id) {
            return null;
        }

        $media = Attachment::where('capsule_id', $id)->get();
        return $media;
    }

}