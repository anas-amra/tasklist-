<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        // $tasks= DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }
    public function create()
    {
        $task_name = $_POST['name'];
        // DB::table('tasks')->insert(['name' => $task_name]);
        $task = new Task();
        $task->name = $task_name;
        $task->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete(); 
        }

        return redirect()->back();
    }
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }
    public function update()
    {
        $id = $_POST['id'];
        $task = Task::find($id);

        if ($task) {
            $task->name = $_POST['name'];;
            $task->save();
        }

        return redirect('tasks');
    }
}
