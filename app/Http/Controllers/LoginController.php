<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
{
    $credentials = $request->only('email', 'password');

    // REMOVA O TRY/CATCH → DEIXE O ERRO APARECER
    $token = JWTAuth::attempt($credentials);

    if (!$token) {
        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    return $this->respondWithToken($token);
}

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60 // CORRETO
        ]);
    }
}