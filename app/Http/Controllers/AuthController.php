<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $authorize = [
                'reviewer' => ['can_approve_revision', 'can_comment'],

                'admin' => ['can_create_user', 'can_add_subject', 'can_create_curriculum', 'can_submit_revision'],

                'faculty' => ['can_add_subject', 'can_create_curriculum', 'can_submit_revision'],

                'chair' => ['can_add_subject', 'can_create_curriculum', 'can_submit_revision'],
            ];

            $token = $request->user()->createToken('auth-token', $authorize[$request->user()->role])->plainTextToken;
            return response()->json(['token' => $token, 'message' => 'login succesfully', 'user' => $request->user()]);
        }

        return response()->json(['message' => 'Invalid email or password'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getuser(Request $request)
    {
        $user = auth()->user();
        $user = User::where('id', $user['id'])->with('profile', 'department')->first();
        return response()->json($user);
    }
}
