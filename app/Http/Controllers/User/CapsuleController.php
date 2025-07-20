<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\CapsuleService;
use Illuminate\Http\Request;
use App\Models\Capsule;

class CapsuleController extends Controller
{

    function getAllCapsules($id = null)
    {
        $capsules = CapsuleService::getAllCapsules($id);
        return $this->responseJSON($capsules);
    }

    function addOrUpdateCapsule(Request $request, $id = null)
    {
        $capsule = new Capsule();

        if ($id) {
            $capsule = CapsuleService::getAllCapsules($id);
        }

        $capsule = CapsuleService::createOrUpdateCapsule($request, $capsule);
        return $this->responseJSON($capsule);
    }

    function getCapsulesByUserId($id = null)
    {
        $capsules = CapsuleService::getCapsulesByUserId($id);
        return $this->responseJSON($capsules);
    }

    function getCapsulesByCountry($country = null)
    {
        $capsules = CapsuleService::getCapsulesByCountry($country);
        return $this->responseJSON($capsules);
    }

    function getCapsulesByMood($mood = null)
    {
        $capsules = CapsuleService::getCapsulesByMood($mood);
        return $this->responseJSON($capsules);
    }


}
