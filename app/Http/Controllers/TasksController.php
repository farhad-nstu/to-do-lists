<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Repositories\TaskRepository;
use App\Services\Validator;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private $tasks;

    public function __construct(TaskRepository $tasks) {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index($item_id) {
        return $this->tasks->index($item_id);
    }

    public function store(Request $request) {
        $validator = new Validator;
        $rules = [
            'name' => 'required|min:3|max:60',
            'email' => ['required', 'email']
        ];
        $validator->rules($rules);
        return $this->tasks->store($request);
    }

    public function destroy($id) {
        return $this->tasks->destroy($id);
    }
}
