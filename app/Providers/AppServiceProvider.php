<?php

namespace App\Providers;

use App\Services\Contracts\SmsProvider;
use App\Services\TwilioProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the container singletons that should be registered.
     */
    public array $singletons = [
        SmsProvider::class => TwilioProvider::class,
    ];

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
    }
}
