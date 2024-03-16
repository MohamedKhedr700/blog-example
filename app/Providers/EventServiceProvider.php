<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Verification;
use App\Observers\PostObserver;
use App\Observers\VerificationObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        Verification::observe(VerificationObserver::class);
    }
}
