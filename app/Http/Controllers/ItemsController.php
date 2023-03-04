<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Repositories\ItemRepository;

class ItemsController extends Controller
{
    private $items;

    public function __construct(ItemRepository $items) {
        $this->middleware('auth');
        $this->items = $items;
    }

    public function index() {
        return $this->items->index();
    }

    public function store(ItemRequest $request) {
        return $this->items->store($request);
    }

    public function destroy($id) {
        return $this->items->destroy($id);
    }
}
