<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    /**
     * Handle the post "creating" event.
     */
    public function creating(Post $post): void
    {
        if (! Auth::guard('user')->check()) {
            return;
        }

        $post->setAttribute('user_id', auth()->id());
    }
}
