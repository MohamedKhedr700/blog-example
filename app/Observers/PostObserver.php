<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        if (! Auth::guard('user')) {
            return;
        }

        $post->setUser(auth()->id());

//        $post->save();
    }
}
