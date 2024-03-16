<?php

namespace App\Http\Controllers\Post;

use App\Actions\Post\CreateAction;
use App\Actions\Post\ListAction;
use App\Http\Controllers\Controller;
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

        return response()->json([
            'message' => __('success'),
        ]);
    }

    /**
     * Creat a post.
     */
    public function index(ListAction $action): JsonResponse
    {
        $posts = $action->execute(
            ['*'],
            ['user:id,username'],
        );

        return response()->json([
            'message' => __('success'),
            'resources' => fractal_data($posts, new PostTransformer),
        ]);
    }
}
