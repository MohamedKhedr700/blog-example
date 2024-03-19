<?php

namespace App\Http\Controllers\Post;

use App\Actions\Post\CreateAction;
use App\Actions\Post\ListAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\ListRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Transformers\Post\PostTransformer;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    /**
     * Creat a post.
     */
    public function store(StoreRequest $request, CreateAction $action): JsonResponse
    {
        $action->execute($request->validated());

        return $this->message(__('message.success'));
    }

    /**
     * Creat a post.
     */
    public function index(ListRequest $request, ListAction $action): JsonResponse
    {
        $filter = array_merge($request->validated(), [
            'descriptionLimit' => 1,
        ]);

        $posts = $action->execute(
            $filter,
            ['*'],
            ['user:id,username'],
        );

        return $this->resources(
            fractal_data($posts, new PostTransformer),
        );
    }
}
