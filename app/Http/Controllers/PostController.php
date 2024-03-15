<?php

namespace App\Http\Controllers;

use App\Actions\Post\CreateAction;
use App\Actions\Post\ListAction;
use App\Actions\User\RegisterAction;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
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
        $posts = $action->execute();

        return response()->json([
            'message' => __('success'),
            'resources' => fractal($posts),
        ]);
    }
}
