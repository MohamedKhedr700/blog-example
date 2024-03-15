<?php

namespace App\Actions\Post;

use App\Models\Post;

class CreateAction
{
    /**
     * Handle the action.
     */
    public function execute(array $data): Post
    {
        return Post::create($data);
    }
}
