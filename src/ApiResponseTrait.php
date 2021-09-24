<?php

namespace KontribusiKuy\Latraits;

use Illuminate\Validation\ValidationException;

/**
 * 
 */
trait ApiResponseTrait
{
    public static function apiResponse($data = [], $statusCode = 200)
    {
        return response()->json($data, $statusCode)->throwResponse();
    }

    public static function notFoundError()
    {
        return ApiResponse::apiResponse(['message' => 'Data not found'], 404);
    }

    public static function responseSuccess($data)
    {
        return ApiResponse::apiResponse($data);
    }

    public static function validationError(ValidationException $exception)
    {
        return ApiResponse::apiResponse(['message' => $exception->getMessage(), 'errors' => $exception->errors()], 422);
    }
}
