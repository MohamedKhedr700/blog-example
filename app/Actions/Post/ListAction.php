<?php

namespace App\Actions\Post;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Post;

class ListAction extends CoreListAction
{
    /**
     * Index resources.
     */
    protected function index(array $filters = [], array $columns = ['*'], array $relations = [])
    {
        return Post::filter($filters)
            ->select($columns)
            ->with($relations);
    }
}
