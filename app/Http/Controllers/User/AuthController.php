<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function registration(RegistrationRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'token' => $token, 'user' => $user]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return response()->json(['success' => false, 'errors' => 'Неверные данные']);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['success' => true, 'token' => $token, 'user' => $user,]);
    }

    public function logout(Request $request)
    {
        $accessToken = $request->user()->currentAccessToken();

        if (!$accessToken) {
            return response()->json(['success' => false, 'message' => 'Токен не найден']);
        }

        $accessToken->delete();
        return response()->json(['success' => true]);
    }
}
