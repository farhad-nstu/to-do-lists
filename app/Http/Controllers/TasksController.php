<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
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
        return $this->tasks->store($request);
    }

    public function destroy($id) {
        return $this->tasks->destroy($id);
    }
}
