<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CapsuleController;
use App\Http\Controllers\Common\AuthController;


Route::group(["prefix" => "v0.1"], function () {
    Route::group(["middleware" => "auth:api"], function () {
        //AUTHENTICATED APIs
        Route::group(["prefix" => "user"], function () {
            // get all capsules or a specific capsule
            Route::get("/capsules/{id?}", [CapsuleController::class, "getAllCapsules"]);
            // add or update a capsule
            Route::post("/add_update_capsule/{id?}", [CapsuleController::class, "addOrUpdateCapsule"]);
        });

        Route::group(["prefix" => "admin"], function () {
            Route::group(["middleware" => "auth:admin"], function () {
                
            });
        });

    });


    //UNAUTHENTICATED APIs
    Route::group(["prefix" => "guest"], function () {
        Route::post("/login", [AuthController::class, "login"]);
        Route::post("/register", [AuthController::class, "register"]);
    });

});









