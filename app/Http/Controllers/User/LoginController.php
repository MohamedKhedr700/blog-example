<?php

namespace App\Http\Controllers\User;

use App\Helpers\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Transformers\UserTransformer;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Invoke a controller method.
     *
     * @throws AuthenticationException
     */
    public function __invoke(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $token = $action->execute($request->validated());

        return response()->json([
            'message' => __('success'),
            'token' => $token,
            'user' => fractal_data(auth()->user(), new UserTransformer),
        ]);
    }
}
