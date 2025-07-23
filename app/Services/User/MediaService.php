<?php

namespace App\Services\User;

use App\Models\Attachment;
use App\Models\Audio;
use App\Models\Image;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaService
{

    static function getAllMedia($id = null)
    {
        if (!$id) {
            return Attachment::all();
        }
        return Attachment::find($id);
    }

    static function addMedia(Request $request)
    {
        $request->validate([
            'capsule_id' => 'required|integer',
            'title' => 'required|string',
            'type' => 'required|in:image,audio',
            'string_base64' => 'required|string',
        ]);

        // base64 decode
        $base64_str = $request->string_base64;
        $imageData = base64_decode($base64_str);

        // store in the storage (/images or /audio)
        $isImage = $request['type'] === 'image';
        $extension = $isImage ? 'png' : 'webm';
        $folder = $isImage ? 'uploads/images' : 'uploads/audio';
        $fileName = Str::random(20) . '.' . $extension;
        $filePath = $folder . $fileName;

        Storage::disk('public')->put($filePath, $imageData);

        // create Image or Audio record
        if ($request['type'] === 'image') {
            $media = new Image();
            $media->title = $request['title'];
            $media->save();
        } else {
            $media = new Audio();
            $media->title = $request['title'];
            $media->save();
        }

        $attachment = new Attachment();
        $attachment->capsule_id = $request['capsule_id'];
        $attachment->url = 'storage/' . $filePath;
        $attachment->type = $request['type'];
        $attachment->attachment_id = $media->id;

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