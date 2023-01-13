<?php

namespace App\Providers;

use App\Services\wgaw\class\CurlClass;
use Illuminate\Support\ServiceProvider;

class WGawronskiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->bind('App\Services\wgaw\interfaces\CurlInterface', 'App\Services\wgaw\class\CurlClass');
        $this->app->bind('App\Services\wgaw\interfaces\CurlInterface', function(){
            return new CurlClass(config('global.currency.nbpServiceApi'));
        });
    }
}
