@extends('app.home')

@section('categorie-tasks')

@foreach ($tasks as $task)
    <div class="w-[700px] flex items-center gap-10 p-3 bg-slate-800 mt-8 rounded-md">
      <div class="flex gap-4">
        <input type="checkbox" value="{{$task->completed}}" name="completed" id="">
        <p class="w-full text-sm text-white">{{$task->description}}</p>
      </div>

      <div class="flex items-center gap-3">
        <button><i class="ph ph-pencil-line text-gray-400 hover:text-white"></i></button>
        <button><i class="ph ph-trash w-6 h-6 text-gray-400 hover:text-red-500"></i></button>
      </div>
    </div>
@endforeach

@endsection


