<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function index(): JsonResponse
    {
        $array = [
            [
                'id' => 1,
                'name' => 'one'
            ],
            [
                'id' => 2,
                'name' => 'two'
            ],
            [
                'id' => 3,
                'name' => 'three'
            ],
        ];
        return response()->json($array);
    }
}
