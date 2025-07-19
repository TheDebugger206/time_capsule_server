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
            Route::get("/capsules", [CapsuleController::class, "getAllCapsules"]);
            Route::post("/add_update_capsule/{id?}", [CapsuleController::class, "addOrUpdateCapsule"]);

        });

        Route::group(["prefix" => "admin"], function () {
            Route::group(["middleware" => "auth:admin"], function () {
                // Route::get("/tasks", [TaskAdminController::class, "getAllTasks"]);
                // Route::get("/remove_tasks", [TaskController::class, "removeTasks"]);
            });
        });

    });


    //UNAUTHENTICATED APIs
    Route::group(["prefix" => "guest"], function () {
        Route::post("/login", [AuthController::class, "login"]);
        Route::post("/register", [AuthController::class, "register"]);
    });

});









