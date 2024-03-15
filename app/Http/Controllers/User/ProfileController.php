<?php

namespace App\Http\Controllers\User;

use App\Actions\User\ProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Invoke a controller method.
     */
    public function __invoke(ProfileAction $action): JsonResponse
    {
        return response()->json([
            'message' => __('success'),
            'user' => fractal_data(
                $action->execute(),
                new UserTransformer,
            ),
        ]);
    }
}