<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('profile', 'department')->get();
        return response()->json($users);
        return UserResource::collection($users, $withProfile = 'asdas');
    }

    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = $request->user();

        if (!Hash::check($fields['currentPassword'], $user->password)) {
            return response()->json([
                'message' => 'current password is invalid'
            ], 401);
        }

        $user->update([
            'password' => bcrypt($fields['password'])
        ]);

        return response()->json([
            'message' => 'password succesfully change',
            'success' => true
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(new UserResource($user, ''));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // return $user;
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
