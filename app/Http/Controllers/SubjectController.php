<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;
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
            'department_id' => $request->department_id
        ]);

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
        $subject->update($request->all());
        return $subject;
    }

    public function updateSyllabus(Request $request, string $id)
    {
        $request->validate([
            'syllabus' => 'required|file|mimes:pdf'
        ]);

        $subject = Subject::find($id);
        if (!$subject) return response()->json(['message' => 'subject not found'], 404);

        $file = $request->file('syllabus');

        $subject_id = $subject->id;
        $fileName = $subject_id . '-' . time() . '-' . $file->getClientOriginalName();
        Storage::putFileAs('syllabus', $file, $fileName);

        $subject->syllabus_path = $fileName;
        $subject->update();

        return response()->json(['message' => 'syllabus update success', 'subject' => $subject]);
    }

    public function getSyllabus(Request $request, $file)
    {
        // $pdf_file = storage_path('app/pdf/sample.pdf');
        // $headers = ['Content-Type' => 'application/pdf',];
        // return response()->download($pdf_file, 'sample.pdf', $headers);

        $filePath = storage_path('app/syllabus/' . $file);

        if (!file_exists($filePath)) {
            return response()->json(['message' => 'syllabus not found'], 404);
        }

        $fileContents = file_get_contents($filePath);

        return response($fileContents)
            ->header('Content-Type', 'application/pdf');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
