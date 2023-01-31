<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller {

    public function index()
    {
        return response()->json(PermissionResource::collection(Permission::all()));
    }

    public function store(StorePermissionRequest $request)
    {
        try {
            DB::beginTransaction();
            $permission = Permission::create($request->all());
            DB::commit();
            return response()->json(new PermissionResource($permission), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show(Permission $permission)
    {
        return response()->json(new PermissionResource($permission));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        try {
            DB::beginTransaction();
            $permission->update($request->all());
            DB::commit();
            return response()->json(new PermissionResource($permission), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Permission $permission)
    {
        try {
            DB::beginTransaction();
            $permission->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
