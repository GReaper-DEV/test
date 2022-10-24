<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        return view('welcome', [
            'tasks' => Task::latest()->get(),
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'description' => 'required|min:3|max:255',
        ]);

        if ($attributes) {
            Task::create($attributes);
        }

        return redirect('/');

    }

    public function complete($id)
    {

        $task = Task::find($id);
        $task->is_complete = 1;
        $task->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->destroy($id);
        $task->save();

        return redirect('/');
    }
}
