<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PingController extends Controller{
    public function __invoke() : JsonResponse{
        // throw new \Exception('Not implemented');
        return response() -> json([
            'message' => 'pong',
            'timestamp' => now() -> toIso8601String(),
        ]);
    }
}
