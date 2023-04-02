<?php

namespace App\Http\Controllers;

use App\Models\ElectiveSubject;
use App\Http\Requests\StoreElectiveSubjectRequest;
use App\Http\Requests\UpdateElectiveSubjectRequest;
use App\Models\Curriculum;

class ElectiveSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ElectiveSubject::all();
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
    public function store(StoreElectiveSubjectRequest $request)
    {
        $electiveSubject = ElectiveSubject::create($request->all());
        return response()->json($electiveSubject);
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectiveSubject $electiveSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectiveSubject $electiveSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectiveSubjectRequest $request, ElectiveSubject $electiveSubject)
    {
        $electiveSubject->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectiveSubject $electiveSubject)
    {
        //
    }
}
