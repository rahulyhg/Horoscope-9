<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * @param string|null $message
     * @param int $code
     * @param array $errors
     *
     * @return JsonResponse
     */
    protected function fail($message = null, $code = 500, $errors = []) 
    {
        return response()->json([
            'status' => 'failure',
            'status_code' => $code,
            'message' => $message ? $message : 'Internal Server Error',
            'errors' => $errors,
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param $data
     * @param array $meta
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function success($data, $meta = [], $code = 200) 
    {
        return response()->json([
            'status' => 'success',
            'status_code' => $code,
            'message' => JsonResponse::$statusTexts[$code] = 'OK',
            'data' => $data,
            'meta' => $meta,
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_OK);
    }
}
