<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AppController extends Controller
{
  public function index()
  {

    $tasks = Task::where('id_user', auth()->user()->id)->get();

    // Gate::authrize('list-tasks', $tasks);

    return view('app.home', compact('tasks'));
    // return redirect()->route('app.home')->with(compact('tasks'));

    // return view('app.home');
  }
}
