<?php

namespace App\Providers;

use App\Contracts\LocationInterface;
use App\Contracts\OfficeInterface;
use App\Repositories\LocationRepository;
use App\Repositories\OfficeRepository;
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
        $this->app->bind(
            OfficeInterface::class,
            OfficeRepository::class
        );
        $this->app->bind(
            LocationInterface::class,
            LocationRepository::class
        );
    }
}
