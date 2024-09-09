<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =    Task::all();
        
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        $request->validate(['title' => 'required|string|max:255']);
        Task::create(['title' => $request->title]);
        return redirect()->back()->with('success', 'Task add successfully!');
    }

    public function modify(Request $request,Task $task){
        
        $task->update(['completed' => $request->has('completed')]);
        
        return redirect()->route('tasks.index');
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect()->back()->with('success', 'Task removed successfully!');
    }

    
}
