<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Faker\Factory as FakerFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // this will force using en_US
        // $this->app->singleton(\Faker\Generator::class, function () {
        //     return FakerFactory::create('en_US');
        // });


    }
}
