<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(StudentResource::collection(Student::all()));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            DB::beginTransaction();
            $student = Student::create($request->all());
            $student->user()->create($request->all());
            DB::commit();
            return response()->json(new StudentResource($student), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show(Student $student)
    {
        return response()->json(new StudentResource($student));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            DB::beginTransaction();
            $student->update($request->all());
            $student->user()->update($request->all());
            DB::commit();
            return response()->json(new StudentResource($student), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Student $student)
    {
        try {
            DB::beginTransaction();
            $student->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
