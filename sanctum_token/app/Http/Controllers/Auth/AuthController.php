<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController
{
    public function registration(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string']
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'exists:users'],
            'password' => ['required', 'string']
        ]);

        if (!auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'Неверный логин или пароль'], 422);
        }

        $user = auth()->user();
        $user->tokens()->delete();
        $token = $user->createToken('myToken', ['protected_level:one'], now()->addMinutes(8000));
//        $token = auth()->user()->createToken($request->token_name, ['protected_level:one'], now()->addMinutes(8000));

        return response()->json(['user' => auth()->user(), 'token' => $token?->plainTextToken ?? null]);
    }

    public function logout(): JsonResponse
    {
        $tokens = Auth::guard('api')->user()->tokens()->delete();
//        $tokens = Auth::guard('api')->user()->tokens;

//        $user->tokens()->delete();
//        $request->user()->currentAccessToken()->delete();
//        $user->tokens()->where('id', $tokenId)->delete();

        return response()->json(['logout' => $tokens]);
    }

    public function me(): JsonResponse
    {

        $user = auth()->user();
        $user->load('tokens');

        return response()->json(['me' => $user]);
    }

    public function refresh(Request $request): JsonResponse
    {
        $token = explode(' ', $request->header('Authorization'))[1] ?? null;
        $user = auth()->user();
        PersonalAccessToken::findToken($token)->delete();
        $newToken = $user->createToken('myToken', ['protected_level:one'], now()->addMinutes(8000));

        return response()->json(['user' => $user, 'refreshToken' => $newToken]);
    }
//    public function tokensCreate(Request $request): JsonResponse
//    {
//        $token = $request->user()->createToken($request->token_name);
//
//        return response()->json(['token' => $token->plainTextToken]);
//    }
    public function tokensCreate(Request $request, User $user): JsonResponse
    {
        $token = $user->createToken($request->token_name, ['protected_level:one'], now()->addMinutes(8000));

        return response()->json(['token' => $token->plainTextToken]);
    }
}
