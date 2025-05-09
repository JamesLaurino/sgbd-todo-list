<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $tasks = Task::all();
        $tasksUser = $tasks
            ->where("user_id", "=", $userId);

        return view("tasks.tasks", ["tasks" => $tasksUser]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255'
        ]);

        Task::create([
            'completed' => 0,
            'title' => $validatedData['title'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('task.index')->with('success', 'Task crée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index')
            ->with('success', 'task supprimée avec succés.');
    }
}
