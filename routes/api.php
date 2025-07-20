<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\CapsuleController;
use App\Http\Controllers\Common\AuthController;


Route::group(["prefix" => "v0.1"], function () {
    Route::group(["middleware" => "auth:api"], function () {

        //AUTHENTICATED APIs
        Route::group(["prefix" => "user"], function () {

            // capsules
            Route::get("/capsules/{id?}", [CapsuleController::class, "getAllCapsules"]);
            Route::post("/capsule/{id?}", [CapsuleController::class, "addOrUpdateCapsule"]);
            Route::get("/user_capsules/{id?}", [CapsuleController::class, "getCapsulesByUserId"]);
            Route::get("/country_capsules/{country?}", [CapsuleController::class, "getCapsulesByCountry"]);
            Route::get("/mood_capsules/{mood?}", [CapsuleController::class, "getCapsulesByMood"]);

            // media
            Route::get("/media/{id?}", [MediaController::class, "getAllMedia"]);
            Route::post("/media/{id?}", [MediaController::class, "addOrUpdateMedia"]);
            Route::get("/capsule_media/{id?}", [MediaController::class, "getMediaByCapsuleId"]);

        });

        // Route::group(["prefix" => "admin"], function () {
        //     Route::group(["middleware" => "auth:admin"], function () {

        //     });
        // });

    });

    //UNAUTHENTICATED APIs
    Route::group(["prefix" => "guest"], function () {
        Route::post("/login", [AuthController::class, "login"]);
        Route::post("/register", [AuthController::class, "register"]);
    });

});









