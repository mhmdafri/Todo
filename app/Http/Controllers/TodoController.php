<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this -> task = new Todo();
    }

    public function index()
    {
        $response ['tasks'] = $this->task->all();
        return view('pages.Todo.index')->with($response);
    }

    public function store(Request $request)
    {
        $this->task->create($request->all());

        // return redirect()->back();

        return redirect()->route('home');
    }

    public function delete ($task_id)
    {
        $task = $this -> task -> find($task_id);
        $task -> delete();
        return redirect()->route('home');
    }

    public function done ($task_id)
    {
        $task = $this -> task -> find ($task_id);
        $task -> done = 1;
        $task -> update();

        return redirect() -> back();
    }

}
