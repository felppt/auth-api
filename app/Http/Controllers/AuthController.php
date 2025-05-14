<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'unique:users,email', 'email', 'max:250'],
            'password' => ['required', Password::min(8)],
            'gender' => ['nullable', 'string', 'in:male,female'],
        ]);

        if ($validated) {
            $user = User::firstOrCreate([
                'name' => '',
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'gender' => $validated['gender'] ?? '',
            ]);

            $token = $user->createToken("api-token")->plainTextToken;

            return response()->json([
                'message' => 'Успешная регистрация!',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        $returnData = [];
        $returnData['id'] = $user['id'];
        $returnData['email'] = $user['email'];
        $returnData['gender'] = $user['gender'];

        return response()->json($returnData);
    }
}
