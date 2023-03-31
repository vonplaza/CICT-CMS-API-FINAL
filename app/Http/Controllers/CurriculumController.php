<?php

namespace App\Http\Controllers;

use App\Http\Requests\approveCurriculum;
use App\Models\Curriculum;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Http\Resources\CurriculumResource;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculums = Curriculum::all();
        // $curriculums = Curriculum::with('curriculumLevels')->get();
        // return new CurriculumResource($curriculums);
        return response()->json($curriculums);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function approveCurriculum(Request $request, $id)
    {
        if ($request->user()->tokenCan('can_approve_revision')) {
            $curriclum = Curriculum::find($id);

            if ($curriclum)
                $curriclum->update(['status' => 'a']);

            return response()->json(['message' => 'success', 'curriclum' => $curriclum]);
        }
        return response()->json(['message' => 'you are not authorized'], 403);
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(StoreCurriculumRequest $request)
    {
        return Curriculum::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $curriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        //
    }
}
