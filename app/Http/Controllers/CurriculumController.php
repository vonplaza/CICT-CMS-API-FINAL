<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Http\Resources\CurriculumResource;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $curriculums = Curriculum::all();
        $curriculums = Curriculum::with('curriculumLevels')->get();
        return new CurriculumResource($curriculums);
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



    public function store(StoreCurriculumRequest $request)
    {
        // return Curriculum::create($request->all());


        // $request->all();

        $curriculum = [
            'version' => '1.0',
            'user_id' => $request->user()->id,
            'department_id' => $request->user()->department_id,
            'status' => 'p',
        ];
        $subjects = [];


        $inc = 0;
        foreach ($request->subjects as $year_level) {
            $inc++;
            $level = [
                'curriculum_id' => '1',
                'metadata' => $year_level,
                'version' => '1.00',
                'year_level' => $inc,
                'status' => 'p'
            ];
            $subjects[] = $level;
        }
        // $subjects = [];

        return $subjects;
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
