<?php

namespace App\Services\User;

use App\Models\Capsule;

class CapsuleService
{

    static function getAllCapsules($id = null)
    {
        if (!$id) {
            return Capsule::all();
        }
        return Capsule::find($id);
    }

    static function createOrUpdateCapsule($data, $capsule)
    {
        $id = $data['id'];

        $capsule->user_id = $id && !isset($data['user_id']) ?
            $capsule->user_id : $data['user_id'];

        $capsule->title = $id && !isset($data['title']) ?
            $capsule->title : $data['title'];

        $capsule->message = $id && !isset($data['message']) ?
            $capsule->message : $data['message'];

        $capsule->reveal_date = $id && !isset($data['reveal_date']) ?
            $capsule->reveal_date : $data['reveal_date'];

        $capsule->is_revealed = $id && !isset($data['is_revealed']) ?
            $capsule->is_revealed : $data['is_revealed'];

        $capsule->privacy = $id && !isset($data['privacy']) ?
            $capsule->privacy : $data['privacy'];

        $capsule->mood = $id && !isset($data['mood']) ?
            $capsule->mood : $data['mood'];

        $capsule->save();
        return $capsule;
    }
}

