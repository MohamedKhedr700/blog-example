<?php

namespace App\Http\Controllers\User;

use App\Actions\User\VerifyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\VerificationRequest;
use Illuminate\Http\JsonResponse;

class VerificationController extends Controller
{
    /**
     * Invoke a controller method.
     */
    public function __invoke(VerificationRequest $request, VerifyAction $action): JsonResponse
    {
        $action->execute($request->input('phone'));

        return response()->json([
            'message' => __('success'),
        ]);
    }
}
