<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BuildingService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\BuildingRequest;

class BuildingController extends Controller
{
    /**
     * @param BuildingService $BuildingService
     */
    public function __construct(private BuildingService $buildingService) {}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listTasks(Request $request, int $id): JsonResponse
    {
        return response()->json($this->buildingService->getTasks($id));
    }

    public function store(BuildingRequest $request): JsonResponse
    {
        $comment = $this->buildingService->create($request->validated());
        return response()->json($comment, 201);
    }
}
