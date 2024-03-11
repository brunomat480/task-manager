@extends('layout')

@section('title', 'Tasks')

@section('content')

<div>
  <header>
    <div class="flex flex-col justify-center items-end mr-8 mt-2">
      <strong class="text-white">Olá, {{auth()->user()->username}}</strong>
      <a class="flex items-center gap-2 text-white hover:text-red-500 transition-colors select-none" href="{{route('auth.logout')}}">Sair <i class="ph ph-sign-out text-red-500"></i></a>
    </div>
    <h1 class="text-white bg-gray-950 font-bold text-6xl text-center py-12">TASKS</h1>
  </header>

  <div class="flex flex-col justify-center items-center">
    <form action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
      <div class="flex items-center gap-3 -mt-5">
        @csrf
        <input class="w-[400px] p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" name="description" type="text" placeholder="Adicione uma nova tarefa">

        <select class="outline-none p-4 text-xs bg-slate-800 rounded-lg text-white" name="categorie">
          <option selected disabled>Selecione uma categoria</option>
          @foreach ($categoriesTask as $categorie)
          <option class="capitalize" value="{{$categorie->id}}">{{$categorie->name}}</option>
          @endforeach
        </select>

        <button class="bg-blue-600 text-white flex items-center gap-2 py-3 px-3 ml-2 rounded-lg font-semibold" type="submit">Criar<i class="ph ph-plus-circle text-white"></i></button>
      </div>
    </form>

    <div class="w-[700px] mt-5 flex justify-start gap-3">
      <a class="text-white p-2 text-xs font-semibold bg-blue-600 bg-opacity-30 rounded-xl hover:bg-opacity-100 uppercase" href="{{route('app.home')}}" >Todos</a>

      @foreach ($categoriesTask as $categorie)
      <a class="text-white p-2 text-xs font-semibold bg-blue-600 bg-opacity-30 rounded-xl hover:bg-opacity-100 uppercase" href="{{route('app.categorie', $categorie->id)}}" >{{$categorie->name}}</a>
      @endforeach


    </div>

    <div class="flex items-center justify-between w-[700px] text-white mt-14 border-b-[1px] border-gray-700">
      <strong class="text-sm">Tarefas criadas: {{$tasks->count()}}</strong>
      <strong class="text-sm">Tarefas concluídas: <span>0</span></strong>
    </div>



    {{-- @yield('categorie-tasks') --}}

    @foreach ($tasks as $task)
    <div class="w-[700px] flex items-center gap-10 p-3 bg-slate-800 mt-8 rounded-md">
      <div class="flex gap-4">
        <input type="checkbox" value="{{$task->completed}}" name="" id="">
        <p class="w-full text-sm text-white">{{$task->description}}</p>
      </div>

      <div class="flex items-center gap-3">
        <button><i class="ph ph-pencil-line text-gray-400 hover:text-white"></i></button>
        <button><i class="ph ph-trash w-6 h-6 text-gray-400 hover:text-red-500"></i></button>
      </div>
    </div>
    @endforeach

  </div>

</div>

@endsection
