<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subject = Subject::all();
        $subject = Subject::with('department')->get();
        return response()->json($subject);
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
    public function store(StoreSubjectRequest $request)
    {
        $file = $request->file('syllabus');

        $subject = Subject::create([
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'department_id' => $request->subject_code
        ]);

        if (!$subject)
            return response()->json(['message' => 'error']);

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
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        return $request;
        // $subject->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
