<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    
    public function index()
    {
        $todolist = todolist::all();
        return view('dashboard', compact('todolist'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
        'content' => 'required'
        ]);

        todolist::create($data);
        return back();
    }

    public function destroy(todolist $todolist)
    {
        $todolist ->delete();
        return back();
    }
}
