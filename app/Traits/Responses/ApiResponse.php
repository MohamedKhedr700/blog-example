<?php

namespace App\Traits\Responses;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * Success Response.
     */
    public function success(mixed $data, int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return new JsonResponse($data, $statusCode);
    }

    /**
     * Error Response.
     */
    public function error(mixed $data, string $message = '', int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        if (! $message) {
            $message = Response::$statusTexts[$statusCode];
        }

        $data = [
            'error' => true,
            'message' => $message,
            'errors' => $data,
        ];

        return new JsonResponse($data, $statusCode);
    }

    /**
     * Response with message and status code 200.
     */
    public function message(string $message = ''): JsonResponse
    {
        return $this->success([
            'message' => $message,
        ]);
    }

    /**
     * Response with resource and status code 200.
     */
    public function resource(mixed $data, string $message = ''): JsonResponse
    {
        return $this->success([
            'message' => $message,
            'resource' => $data,
        ]);
    }

    /**
     * Response with resources and status code 200.
     */
    public function resources(mixed $data, string $message = ''): JsonResponse
    {
        $response['message'] = $message;

        if (array_key_exists('data', $data)) {
            $response['resources'] = $data['data'];
        }

        if (array_key_exists('additionalData', $data)) {
            $response['additionalData'] = $data['additionalData'];
        }

        if (array_key_exists('meta', $data)) {
            $response['meta'] = $data['meta'];
        }

        return $this->success($response);
    }

    /**
     * Response with status code 400.
     */
    public function badRequest(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, $message, Response::HTTP_BAD_REQUEST);
    }

    /**
     * Response with status code 401.
     */
    public function unauthorized(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, $message, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Response with status code 403.
     */
    public function forbidden(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, $message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Response with status code 404.
     */
    public function notFound(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, $message, Response::HTTP_NOT_FOUND);
    }

    /**
     * Response with status code 409.
     */
    public function conflict(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, $message, Response::HTTP_CONFLICT);
    }

    /**
     * Response with status code 422.
     */
    public function unprocessable(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, $message, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
