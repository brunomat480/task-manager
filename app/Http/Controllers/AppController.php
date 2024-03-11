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

  public function categorie($id)
  {
    $tasks = Task::where('id_categorie', $id)->where('id_user', auth()->user()->id)->get();

    if ($tasks->count() === 0) {
      return redirect()->route('app.home')->with('warning', 'Você não possui tarefas com essa categoria');
    } else {
      return view('components.categories', compact('tasks'));
    }
  }
}
