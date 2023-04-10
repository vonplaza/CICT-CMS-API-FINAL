<?php

namespace App\Http\Controllers;

use App\Http\Requests\approveCurriculum;
use App\Models\Curriculum;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\SubmitRevisionRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Http\Requests\UpdateRevisionRequest;
use App\Http\Resources\CurriculumResource;
use App\Models\CurriculumOld;
use App\Models\CurriculumRevision;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $curriculums = Curriculum::all();
        $curriculums = Curriculum::with('user.profile', 'department')->get();
        return response()->json($curriculums);
    }

    public function curriculumRevisionList()
    {
        return CurriculumRevision::with('curriculum.department', 'user.profile')->get();
        // return response()->json($curriculums);
    }

    public function curriculumRevision($id)
    {
        return CurriculumRevision::with('curriculum.department', 'user.profile')->find($id);
        // return response()->json($curriculums);
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

            if (!$curriclum) {
                return response()->json(['message' => 'cannot find pending curriclum'], 404);
            }
            $curriclum->update(['status' => 'a']);

            return response()->json(['message' => 'success', 'curriclum' => $curriclum]);
        }
        return response()->json(['message' => 'you are not authorized'], 403);
    }

    public function submitRevision(SubmitRevisionRequest $request)
    {
        // if ($request->user()->tokenCan('can_submit_revision')) {
        if (true) {
            $curriculum = CurriculumRevision::create($request->all());
            return response()->json(['message' => 'success', 'curriculum' => $curriculum]);
        }
        return response()->json(['message' => 'you are not authorized'], 403);
    }

    public function approveRevision(Request $request, $id)
    {
        // if ($request->user()->tokenCan('can_approve_revision')) {
        if (true) {
            $curriculum = CurriculumRevision::find($id);
            if (!$curriculum) {
                return response()->json(['message' => 'cannot find revision curriclum'], 404);
            }

            $refereceCurriculum = Curriculum::find($curriculum->curriculum_id);
            if (!$refereceCurriculum) {
                return response()->json(['message' => 'cannot find revision curriclum'], 404);
            }

            CurriculumOld::create([
                'curriculum_id' => $refereceCurriculum->id,
                'metadata' => $refereceCurriculum->metadata,
                'version' => $refereceCurriculum->version
            ]);

            $refereceCurriculum->metadata = $curriculum->metadata;
            $refereceCurriculum->version = $curriculum->version;
            $refereceCurriculum->save();

            $curriculum->update(['status' => 'a']);

            return response()->json(['message' => 'success']);
        }
        return response()->json(['message' => 'you are not authorized'], 403);
    }

    public function updateRevision(UpdateRevisionRequest $request)
    {
        $curriculum = CurriculumRevision::find($request->id);
        // $curriculum->update($request->all());
        $curriculum->update([
            'version' => $request->version,
            'metadata' => $request->metadata,
        ]);
        return response()->json($curriculum);
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
    public function show($id)
    {
        // return $curriculum;
        $curriculum = Curriculum::with('user.profile', 'department')->find($id);

        if (!$curriculum) {
            return response()->json(['message' => 'cannot find curriculum'], 404);
        }

        return $curriculum;
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
        $curriculum->update($request->all());
        return response()->json($curriculum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        //
    }
}
