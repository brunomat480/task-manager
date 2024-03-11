@extends('layout')

@section('title', 'Tasks')

@section('content')

<div>
  <header>
    <h1 class="text-white bg-gray-950 font-bold text-6xl text-center py-12">TASKS</h1>
  </header>

  <div class="flex flex-col justify-center items-center">
    <form action="">
      <div class="flex items-center -mt-5">
        <input class="w-[400px] p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" type="text" placeholder="Adicione uma nova tarefa">
        <button class="bg-blue-600 text-white flex items-center gap-2 py-2 px-3 ml-2 rounded-sm font-semibold" type="submit">Criar<i class="ph ph-plus-circle text-white"></i></button>
      </div>
    </form>

    <div class="flex items-center gap-60 text-white mt-14 border-b-[1px] border-gray-700">
      <strong class="text-sm">Tarefas criadas: <span>0</span></strong>
      <strong class="text-sm">Tarefas concluídas: <span>0</span></strong>
    </div>

    <div class="w-[480px] flex items-center gap-10 p-3 bg-slate-800 mt-8 rounded-md">
      <div class="flex gap-4">
        <input type="checkbox" name="" id="">
        <p class="w-full text-sm text-white">Integer urna interdum massa libero auctor neque turpis turpis semper. Duis vel sed fames integer.</p>
      </div>

      <div class="flex items-center gap-3">
        <button><i class="ph ph-pencil-line text-gray-400 hover:text-white"></i></button>
        <button><i class="ph ph-trash w-6 h-6 text-gray-400 hover:text-red-500"></i></button>
      </div>
    </div>
  </div>

</div>

@endsection
