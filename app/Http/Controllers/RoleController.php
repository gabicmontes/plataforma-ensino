<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
   public function index()
   {
       return response()->json(RoleResource::collection(Role::all()));
   }

    public function show(Role $role)
    {
         return response()->json(new RoleResource($role));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = Role::create($request->all());
            DB::commit();
            return response()->json(new RoleResource($role), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Role $role)
    {
        try {
            DB::beginTransaction();
            $role->update($request->all());
            DB::commit();
            return response()->json(new RoleResource($role), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Role $role)
    {
        try {
            DB::beginTransaction();
            $role->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
