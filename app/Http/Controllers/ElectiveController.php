<?php

namespace App\Http\Controllers;

use App\Models\Elective;
use App\Http\Requests\StoreElectiveRequest;
use App\Http\Requests\UpdateElectiveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Elective::all();
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
    public function store(StoreElectiveRequest $request)
    {
        $file = $request->file('syllabus');

        $subject = Elective::create($request->all());

        if (!$subject)
            return response()->json(['message' => 'error'], 401);

        $subject_id = $subject->id;
        $fileName = $subject_id . '-' . time() . '-' . $file->getClientOriginalName();
        Storage::putFileAs('syllabus', $file, $fileName);

        $subject->syllabus_path = $fileName;
        $subject->update();

        return response()->json($subject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Elective $elective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Elective $elective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectiveRequest $request, Elective $elective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Elective $elective)
    {
        //
    }
}
