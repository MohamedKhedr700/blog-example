<?php

namespace App\Http\Controllers\User;

use App\Actions\User\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * Invoke a controller method.
     */
    public function __invoke(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        $action->execute($request->validated());

        return response()->json([
            'message' => __('success'),
        ]);
    }
}
