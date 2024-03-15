<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerHelpers();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register helpers.
     */
    protected function registerHelpers(): void
    {
        $helpers = glob(app_path('Helpers/*.php'));

        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
