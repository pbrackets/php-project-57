<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    public function index()
    {
        $taskStatuses = TaskStatus::paginate(15);

        return view('taskStatuses.index', compact('taskStatuses'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403);
        }
        return view('taskStatuses.create');
    }

    public function store(StoreTaskStatusRequest $request)
    {
        if (Auth::guest()) {
            return redirect()->route('task_statuses.index');
        }

        $validated = $request->validated();
        $taskStatus = new TaskStatus();

        $taskStatus->fill($validated);
        $taskStatus->save();
        $message = __('controllers.task_statuses_create');
        flash($message)->success();
        return redirect()->route('task_statuses.index');
    }

    public function edit(TaskStatus $taskStatus)
    {
        return view('taskStatuses.edit', compact('taskStatus'));
    }

    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        if (Auth::guest()) {
            return redirect()->route('task_statuses.index');
        }

        $validated = $request->validated();

        $taskStatus->fill($validated);
        $taskStatus->save();

        flash(__('controllers.task_statuses_update'))->success();
        return redirect()->route('task_statuses.index');
    }

    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('controllers.task_statuses_destroy_failed'))->error();
            return back();
        }
        $taskStatus->delete();

        flash(__('controllers.task_statuses_destroy'))->success();
        return redirect()->route('task_statuses.index');
    }
}
//
// namespace App\Http\Controllers;
//
// use App\Models\TaskStatus;
// use Illuminate\Http\Request;
//
// class TaskStatusController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }
//
//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }
//
//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }
//
//     /**
//      * Display the specified resource.
//      */
//     public function show(TaskStatus $taskStatus)
//     {
//         //
//     }
//
//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(TaskStatus $taskStatus)
//     {
//         //
//     }
//
//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, TaskStatus $taskStatus)
//     {
//         //
//     }
//
//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(TaskStatus $taskStatus)
//     {
//         //
//     }
// }
