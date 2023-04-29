<?php

namespace App\Http\Controllers;

use App\Models\ElectiveOnlySubject;
use App\Http\Requests\StoreElectiveOnlySubjectRequest;
use App\Http\Requests\UpdateElectiveOnlySubjectRequest;
use Illuminate\Support\Facades\Storage;


class ElectiveOnlySubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreElectiveOnlySubjectRequest $request)
    {
        $file = $request->file('syllabus');

        $subject = ElectiveOnlySubject::create($request->all());

        if (!$subject)
            return response()->json(['message' => 'error'], 401);

        if (!$request) {
            $subject_id = $subject->id;
            $fileName = $subject_id . '-' . time() . '-' . $file->getClientOriginalName();
            Storage::putFileAs('syllabus', $file, $fileName);

            $subject->syllabus_path = $fileName;
            $subject->update();
        }

        return response()->json($subject);
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectiveOnlySubject $electiveOnlySubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectiveOnlySubject $electiveOnlySubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectiveOnlySubjectRequest $request, ElectiveOnlySubject $electiveOnlySubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectiveOnlySubject $electiveOnlySubject)
    {
        //
    }
}
