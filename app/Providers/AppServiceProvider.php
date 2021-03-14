<?php

namespace App\Providers;

use App\Libraries\Address\AddressFinder;
use App\Libraries\Address\ViaCep\ViaCepAddressFinder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(AddressFinder::class, function(){
            return new ViaCepAddressFinder(config('services.address'));
        });
    }
}
