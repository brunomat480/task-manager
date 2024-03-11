<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AppController extends Controller
{
  public function index()
  {

    return view('app.home');
  }
}
