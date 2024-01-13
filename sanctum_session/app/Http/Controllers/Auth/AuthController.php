<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        return response()->json(['user' => auth()->user()]);
    }

    public function logout(): JsonResponse
    {
//        Auth::logout();
//        auth()->logout();
        $user = Auth::guard('web')->logout();

        return response()->json(['logout' => $user]);
    }

    public function me(): JsonResponse
    {
        $user = auth()->user();

        return response()->json(['me' => $user]);
    }

//    public function refresh(Request $request): JsonResponse
//    {
//        $token = explode(' ', $request->header('Authorization'))[1] ?? null;
//        $user = auth()->user();
//        PersonalAccessToken::findToken($token)->delete();
//        $newToken = $user->createToken('myToken', ['protected_level:one'], now()->addMinutes(8000));
//
//        return response()->json(['user' => $user, 'refreshToken' => $newToken]);
//    }
//    public function tokensCreate(Request $request): JsonResponse
//    {
//        $token = $request->user()->createToken($request->token_name);
//
//        return response()->json(['token' => $token->plainTextToken]);
//    }
}
