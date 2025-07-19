<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Services\User\MediaService;
use DateMalformedIntervalStringException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaController extends Controller
{
    function getAllMedia($id = null)
    {
        $media = MediaService::getAllMedia($id);
        return $this->responseJSON($media);
    }
    function addOrUpdateMedia(Request $request, $id = null)
    {

        $attachment = new Attachment();

        if ($id) {
            $attachment = MediaService::getAllMedia($id);
        }

        $attachment = MediaService::addOrUpdateMedia($request, $attachment);
        return $this->responseJSON($attachment);
    }

    function getMediaByCapsuleId($id = null)
    {
        $media = MediaService::getMediaByCapsuleId($id);
        return $this->responseJSON($media);
    }

}
