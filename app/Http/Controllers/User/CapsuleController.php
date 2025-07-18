<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\CapsuleService;
use Illuminate\Http\Request;
use App\Models\Capsule;

class CapsuleController extends Controller
{

    function getAllCapsules()
    {
        $capsules = CapsuleService::getAllCapsules();
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

}
