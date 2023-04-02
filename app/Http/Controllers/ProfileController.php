<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;
use Nette\Utils\Validators;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        // $profiles = User::with('profile')->get();
        return ProfileResource::collection($profiles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        return Profile::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return response()->json(new ProfileResource($profile));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->update($request->all());
        return Profile::find($request->userId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function uploadPic(Request $request)
    {
        $file = $request->file('image');
        if (!$file)
            return response()->json(['message' => 'profile pic is required']);


        $userId = $request->user()->id;
        $fileName = $userId . '-' . time() . '-' . $file->getClientOriginalName();
        Storage::putFileAs('profilePics', $file, $fileName);

        $profile = Profile::find($userId);
        $profile->profile_pic = $fileName;
        $profile->save();

        return response()->json(['message' => 'success', 'data' => $request->user()->profile]);
    }

    // public function getProfilePic($filename)
    // {
    //     $path = storage_path('app/public/images/' . $filename);

    //     if (!Storage::exists($path)) {
    //         abort(404);
    //     }

    //     $file = Storage::get($path);
    //     $type = Storage::mimeType($path);

    //     $response = response($file, 200)->header('Content-Type', $type);

    //     return $response;
    // }
}
