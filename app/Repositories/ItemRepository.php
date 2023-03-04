<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ItemRepository
{
    public function index() {
        $items = Item::where('created_by', Auth::id())->get();
        return view('home', compact('items'));
    }

    public function store($request) {
        $id = $request->item_id;

        if($id) {
            $item = Item::find($id);
        } else {
            $item = new Item;
        }

        $item->item_name = $request->item_name;
        $item->status = $request->status;
        $item->created_by = Auth::id();
        $item->save();
        return redirect('home');
    }

    public function destroy($id) {
        // first delete all tasks with this item
        $tasks = Task::where('item_id', $id)->get();
        foreach($tasks as $task) {
            $task->delete();
        }
        $item = Item::find($id);
        $item->delete();
        return back();
    }
}