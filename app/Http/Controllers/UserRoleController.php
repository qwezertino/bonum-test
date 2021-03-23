<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(UserRole::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $userRole = UserRole::create($request->all());

        return response()->json($userRole, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param UserRole $userRole
     * @return JsonResponse
     */
    public function show(UserRole $userRole): JsonResponse
    {
        return response()->json($userRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UserRole $userRole
     * @return JsonResponse
     */
    public function update(Request $request, UserRole $userRole): JsonResponse
    {
        $userRole->update($request->all());

        return response()->json($userRole);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserRole $userRole
     * @return JsonResponse
     */
    public function destroy(UserRole $userRole): JsonResponse
    {
        $userRole->delete();
        return response()->json(null, 204);
    }
}
