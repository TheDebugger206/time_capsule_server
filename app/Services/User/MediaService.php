<?php

namespace App\Services\User;

use App\Models\Attachment;
use App\Models\Audio;
use App\Models\Image;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;


class MediaService
{

    static function getAllMedia($id = null)
    {
        if (!$id) {
            return Attachment::all();
        }
        return Attachment::find($id);
    }

    static function addOrUpdateMedia(Request $request, $attachment)
    {
        $request->validate([
            'capsule_id' => 'required|integer',
            'url' => 'required|url',
            'attachable_id' => 'required|integer',
            'attachable_type' => 'required|string',
        ]);

        $attachment->capsule_id = $request['capsule_id'] ?? $attachment->capsule_id;
        $attachment->url = $request['url'] ?? $attachment->url;
        $attachment->attachable_id = $request['attachable_id'] ?? $attachment->attachable_id;
        $attachment->attachable_type = $request['attachable_type'] ?? $attachment->attachable_type;

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