<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::all();

        return response()->json([
            'message'   => 'Tasks retrieved successfully',
            'data'      => TaskResource::collection($tasks),
        ]);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create([
            'user_id'       => 1,
            'title'         => $request->title,
            'description'   => $request->description,
            'status'        => $request->status ?? 'pending',
            'due_date'      => $request->due_date,
        ]);

        return response()->json([
            'message' => 'Task created successfully',
            'data'   => new TaskResource($task),
        ], 201);
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'message' => 'Task retrieved successfully',
            'data'    => new TaskResource($task),
        ]);
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->only(['title', 'description', 'status', 'due_date']));

        return response()->json([
            'message' => 'Task updated successfully',
            'data'    => new TaskResource($task->fresh()),
        ]);
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully',
        ]);
    }
}
