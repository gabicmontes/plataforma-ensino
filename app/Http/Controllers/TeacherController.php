<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller {

    public function index()
    {
        return response()->json(TeacherResource::collection(Teacher::all()));
    }

    public function store(StoreTeacherRequest $request)
    {
        try {
            DB::beginTransaction();
            $teacher = Teacher::create($request->all());
            $teacher->user()->create($request->all());
            DB::commit();
            return response()->json(new TeacherResource($teacher), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show(Teacher $teacher)
    {
        return response()->json(new TeacherResource($teacher));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        try {
            DB::beginTransaction();
            $teacher->update($request->all());
            $teacher->user()->update($request->all());
            DB::commit();
            return response()->json(new TeacherResource($teacher));
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            DB::beginTransaction();
            $teacher->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
