<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function index()
    {
        return response()->json(CourseResource::collection(Course::all()));
    }

    public function store(StoreCourseRequest $request)
    {
        try {
            DB::beginTransaction();
            $course = Course::create($request->all());
            DB::commit();
            return response()->json(new CourseResource($course), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show(Course $course)
    {
        return response()->json(new CourseResource($course));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        try {
            DB::beginTransaction();
            $course->update($request->all());
            DB::commit();
            return response()->json(new CourseResource($course), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Course $course)
    {
        try {
            DB::beginTransaction();
            $course->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
