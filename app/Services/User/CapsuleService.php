<?php

namespace App\Services\User;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

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

    static function createOrUpdateCapsule(Request $request, $capsule)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'reveal_date' => 'required|date',
            'is_revealed' => 'required|boolean',
            'privacy' => 'required|boolean',
            'mood' => 'required|string',
        ]);

        $capsule->user_id = $request['user_id'] ?? $capsule->user_id;
        $capsule->title = $request['title'] ?? $capsule->title;
        $capsule->message = $request['message'] ?? $capsule->message;
        $capsule->reveal_date = $request['reveal_date'] ?? $capsule->reveal_date;
        $capsule->is_revealed = $request['is_revealed'] ?? $capsule->is_revealed;
        $capsule->privacy = $request['privacy'] ?? $capsule->privacy;
        $capsule->mood = $request['mood'] ?? $capsule->mood;

        $ip = $request->ip();
        $position = Location::get(ip: $ip);

        $capsule->ip = $ip;
        $capsule->country_name = $position && is_object($position) ? $position->countryName : null;
        $capsule->country_code = $position && is_object($position) ? $position->countryCode : null;
        $capsule->region_code = $position && is_object($position) ? $position->regionCode : null;
        $capsule->region_name = $position && is_object($position) ? $position->regionName : null;
        $capsule->city_name = $position && is_object($position) ? $position->cityName : null;
        $capsule->zip_code = $position && is_object($position) ? $position->zipCode : null;
        $capsule->latitude = $position && is_object($position) ? $position->latitude : null;
        $capsule->longitude = $position && is_object($position) ? $position->longitude : null;
        $capsule->timezone = $position && is_object($position) ? $position->timezone : null;

        $capsule->save();
        return $capsule;
    }

    static function getCapsulesByUserId($id)
    {
        if (!$id) {
            return null;
        }

        $capsules = Capsule::where('user_id', $id)->get();
        return $capsules;
    }

    static function getCapsulesByCountry($country)
    {
        $capsules = Capsule::whereCountryName($country)->get();
        return $capsules;
    }

    static function getCapsulesByMood($mood)
    {
        $capsules = Capsule::whereMood($mood)->get();
        return $capsules;
    }

}

