<?php

namespace App\Http\Controllers;

use App\Actions\User\ProfileAction;
use App\Actions\User\LoginAction;
use App\Actions\User\RegisterAction;
use App\Actions\User\VerifyAction;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\VerifyRequest;
use App\Http\Transformers\UserTransformer;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use League\Fractal\Serializer\ArraySerializer;

class UserController extends Controller
{
    /**
     * Register user.
     */
    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        $action->execute($request->validated());

        return response()->json([
            'message' => __('success'),
        ]);
    }

    /**
     * Verify user profile.
     */
    public function verify(VerifyRequest $request, VerifyAction $action): JsonResponse
    {
        $action->execute(
            $request->input('phone'),
            $request->input('code'),
        );

        return response()->json([
            'message' => __('success'),
        ]);
    }

    /**
     * Login user.
     *
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $token = $action->execute($request->validated());

        return response()->json([
            'message' => __('success'),
            'token' => $token,
            'user' => fractal_data(
                auth()->user(),
                new UserTransformer,
            ),
        ]);
    }

    /**
     * Get user profile.
     */
    public function profile(ProfileAction $action): JsonResponse
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
