<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index()
    {

    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create an API token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user->only(['id', 'name', 'email', 'created_at']), // Return limited user data
            'token' => $token,
        ], 201);
    }

    public function login(LoginRequest $loginRequest)
    {

        if (Auth::attempt(['email' => $loginRequest->email, 'password' => $loginRequest->password])) {
            $user = Auth::user();
            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user->only(['id', 'name', 'email']),
                'token' => $user->createToken('MyApp')->plainTextToken
            ]);
        } else {
            return ['error' => 'Unauthorised'];
        }

    }

    public function getUser(Request $request)
    {
        return response()->json([
            'message' => 'Get User successfully',
            'user' => $request->user(),
        ]);

    }
}
