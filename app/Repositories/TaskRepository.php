<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Task;

class TaskRepository
{
    public function index($item_id) {
        $item = Item::find($item_id);
        return view('tasks', compact('item'));
    }

    public function store($request) {
        $id = $request->task_id;

        if($id) {
            $task = Task::find($id);
        } else {
            $task = new Task();
        }
        $task->item_id = $request->item_id;
        $task->task_name = $request->task_name;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('item.tasks.index', $request->item_id);
    }

    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        return back();
    }
}