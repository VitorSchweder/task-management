<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * @param TaskService $taskService
     */
    public function __construct(private TaskService $taskService) {}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($this->taskService->getAllWithFilters($request->all()));
    }

    /**
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function store(TaskRequest $request): JsonResponse
    {
        return response()->json($this->taskService->create($request->validated()), 201);
    }

    /**
     * @param int $taskId
     * @return JsonResponse
     */
    public function show(int $taskId): JsonResponse
    {
        return response()->json($this->taskService->getWithComments($taskId));
    }
}