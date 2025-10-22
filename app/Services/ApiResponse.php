<?php
namespace App\Services;

use \Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data): JsonResponse
    {
        return response()->json([
            "messege" => "success",
            "status_code" => 200
            ,
            "data" => $data
        ], 200);
    }
    public static function error($messege): JsonResponse
    {
        return response()->json(["status_code" => 500, "messege" => $messege], 500);
    }
    public static function unauthorized(): JsonResponse
    {
        return response()->json(["status_code" => 401, "messege" => "Unauthorized access"], 401);
    }
}