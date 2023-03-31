<?php

namespace App\Http\Controllers;

use App\Models\CurriculumLevel;
use App\Http\Requests\StoreCurriculumLevelRequest;
use App\Http\Requests\UpdateCurriculumLevelRequest;
use App\Models\Curriculum;

class CurriculumLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculumLevels = CurriculumLevel::with('curriculumSubjects')->get();
        return response()->json($curriculumLevels);
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
    public function store(StoreCurriculumLevelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CurriculumLevel $curriculumLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CurriculumLevel $curriculumLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurriculumLevelRequest $request, CurriculumLevel $curriculumLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CurriculumLevel $curriculumLevel)
    {
        //
    }
}
