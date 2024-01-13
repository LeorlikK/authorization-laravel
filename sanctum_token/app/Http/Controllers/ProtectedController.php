<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function protectedOneLevel(Request $request): JsonResponse
    {
        $array = [
            [
                'id' => 1,
                'name' => '1'
            ],
            [
                'id' => 2,
                'name' => '2'
            ],
            [
                'id' => 3,
                'name' => '3'
            ],
            [
                'id' => $request->user(),
            ],
        ];
        return response()->json($array);
    }

    public function protectedTwoLevel(): JsonResponse
    {
        $array = [
            [
                'id' => 4,
                'name' => '4'
            ],
            [
                'id' => 5,
                'name' => '5'
            ],
            [
                'id' => 6,
                'name' => '6'
            ],
        ];
        return response()->json($array);
    }

    public function protectedThreeLevel(): JsonResponse
    {
        $array = [
            [
                'id' => 7,
                'name' => '7'
            ],
            [
                'id' => 8,
                'name' => '8'
            ],
            [
                'id' => 9,
                'name' => '9'
            ],
        ];
        return response()->json($array);
    }
}
