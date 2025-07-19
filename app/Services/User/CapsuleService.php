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
        $capsule->user_id = $data['user_id'] ?? $capsule->user_id;
        $capsule->title = $data['title'] ?? $capsule->title;
        $capsule->message = $data['message'] ?? $capsule->message;
        $capsule->reveal_date = $data['reveal_date'] ?? $capsule->reveal_date;
        $capsule->is_revealed = $data['is_revealed'] ?? $capsule->is_revealed;
        $capsule->privacy = $data['privacy'] ?? $capsule->privacy;
        $capsule->mood = $data['mood'] ?? $capsule->mood;
        $capsule->latitude = $data['latitude'] ?? $capsule->latitude;
        $capsule->longitude = $data['longitude'] ?? $capsule->longitude;

        $capsule->save();
        return $capsule;
    }

    static function getCapsulesByUserId($id)
    {
        if (!$id) {
            return null;
        }

        return Capsule::where('user_id', $id)->get();
    }
}

