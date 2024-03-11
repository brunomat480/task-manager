<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


use App\Models\Task;

class TaskController extends Controller
{
  public function store(Request $request)
  {

    Task::create([
      'description' => $request->description,
      'id_user' => auth()->user()->id,
      'id_categorie' => $request->categorie,
    ]);

    return redirect()->route('app.home');
  }

  public function edit(int $id, Request $request)
  {
    Task::where('id', $id)->update([
      'description' => $request->description,
      'id_categorie' => $request->categorie
    ]);

    return redirect()->route('app.home');
  }

  public function destroy(string $id)
  {
    Task::find($id)->delete();


    return redirect()->route('app.home');
  }
}
