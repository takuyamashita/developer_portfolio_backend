<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Admin;
use App\Services\AdminAuthenticate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminAuthenticate::class, function ($app){
            
            return new Admin();
        });

        $this->app->bind(\App\Services\ProductService::class, function ($app){

            return new \App\Services\Product;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
