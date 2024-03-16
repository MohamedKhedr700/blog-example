<?php

namespace App\Actions\Post;

use App\Actions\Core\Action;
use App\Models\Post;
use Illuminate\Support\Collection;

class ListAction extends Action
{
    /**
     * Handle the action.
     */
    public function execute(array $columns = ['*'], array $relations = []): Collection
    {
        return Post::query()
            ->select($columns)
            ->with($relations)
            ->get();

    }
}
