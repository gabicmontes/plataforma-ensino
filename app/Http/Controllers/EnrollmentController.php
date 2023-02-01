<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Http\Resources\EnrollmentResource;
use App\Models\Enrollment;
use Exception;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{

    public function index()
    {
        return response()->json(EnrollmentResource::collection(Enrollment::all()));
    }

    public function store(StoreEnrollmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $enrollment = Enrollment::create($request->all());
            DB::commit();
            return response()->json(new EnrollmentResource($enrollment), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show(Enrollment $enrollment)
    {
        return response()->json(new EnrollmentResource($enrollment));
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        try {
            DB::beginTransaction();
            $enrollment->update($request->all());
            DB::commit();
            return response()->json(new EnrollmentResource($enrollment), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Enrollment $enrollment)
    {
        try {
            DB::beginTransaction();
            $enrollment->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
