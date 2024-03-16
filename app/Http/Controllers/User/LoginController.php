<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Transformers\User\UserTransformer;
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

        return $this->success([
            'message' => __('message.success'),
            'token' => $token,
            'user' => fractal_data(auth()->user(), new UserTransformer),
        ]);
    }
}
