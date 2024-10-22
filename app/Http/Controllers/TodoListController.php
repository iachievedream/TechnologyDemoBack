<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index()
    {
        $todo = TodoList::all();
        return response()->json($todo, 200);
    }

    public function store(Request $request)
    {
        $todo = TodoList::create($request->all());
        return response()->json($todo, 200);
    }

    public function show(string $id)
    {
        $todo = TodoList::find($id);
        return response()->json($todo, 200);
    }

    public function update(Request $request, string $id)
    {
        $todo = TodoList::update($id, $request->all());
        return response()->json($todo, 200);
    }

    public function destroy(string $id)
    {
        $todo = TodoList::destroy($id);
        return response()->json($todo, 200);
    }
}
