<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $field = $request->validate([
            'username' => 'required|string',
            // 'email' => 'required|email',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'username' => $field['username'],
            'email' => $field['email'],
            // 'password' => $request->password,
            'password' => bcrypt($field['password']),
            'role' => 'user',
            'avatar' => 'avatar.png',
            'background_image' => 'background_image.png',
        ]);

        $token = $user->createToken('register-token', ['user'])->plainTextToken;
        // $token = $user->createToken(
        //     'token-name', ['user'], now()->addDay()
        // )->plainTextToken;

        // return response()->json($user);
        $response = [
            'user' => $user,
            'token' => $token,
            // 'token' => $user->tokens;
        ];
        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials!'
            ], 401);
        }

        $token = $user->createToken('login-token', ['create', 'update'])->plainTextToken;
        // $token = $user->createToken(
        //     'token-name', ['user'], now()->addDay()
        // )->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            // 'tokens' => $user->tokens,
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        // $request->header('Authorization');
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function forgetPassword(Request $request) {
        $field = $request->validate([
            "email" => "required|string|email",
            "new_password" => "required|string",
            "confirmed_new_password" => "required|string"
        ]);
        

        $user = User::where('email', $field["email"])->first();
        $user->fill([
            "password" => bcrypt($field["new_password"])
        ]);

        $token = $user->createToken('register-token', ['user'])->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ]
        );


    }
}
