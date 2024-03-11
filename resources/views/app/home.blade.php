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
        <input class="w-[400px] p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" name="description" type="text" placeholder="Adicione uma nova tarefa" required>

        <select class="outline-none p-3 text-xs bg-slate-800 rounded-lg text-white" name="categorie" required>
          <option selected disabled value="">Selecione uma categoria</option>
          @foreach ($categoriesTask as $categorie)
          <option class="capitalize" value="{{$categorie->id}}">{{$categorie->name}}</option>
          @endforeach
        </select>

        <button class="bg-blue-600 text-white flex items-center gap-2 py-3 px-3 ml-2 rounded-lg font-semibold hover:bg-blue-800 transition-all" type="submit">Criar<i class="ph ph-plus-circle text-white"></i></button>
      </div>
    </form>

    <div class="w-[700px] mt-5 flex justify-start gap-3">
      <a class="text-white p-2 text-xs font-semibold bg-blue-600 bg-opacity-30 rounded-xl hover:bg-opacity-100 uppercase select-none" href="{{route('app.home')}}" >Todos</a>

      @foreach ($categoriesTask as $categorie)
      <a class="text-white p-2 text-xs font-semibold bg-blue-600 bg-opacity-30 rounded-xl hover:bg-opacity-100 uppercase select-none" href="{{route('app.categorie', $categorie->id)}}" >{{$categorie->name}}</a>
      @endforeach
    </div>

    <div class="flex items-center justify-between w-[700px] text-white mt-14 border-b-[1px] border-gray-700">
      <strong class="text-sm">Tarefas criadas: {{$tasks->count()}}</strong>
    </div>


    @if ($message = Session::get('warning'))
      <div class="bg-red-400 text-center py-5 w-[700px] mt-4 mb-6 rounded-md">
        <h1 class="text-white font-semibold">
          Você não possui tarefas nessa categoria
        </h1>
      </div>
    @endif

    @if ($tasks->count() === 0)

    <h1 class="text-gray-400 font-bold text-3xl mt-8">Você não possui tarefas</h1>

    @else

    @foreach ($tasks as $task)
    <div class="w-[700px] h-20 flex items-center justify-between gap-10 p-3 bg-slate-800 my-2 rounded-md">
      <div class="flex gap-4">
        <p class="text-sm text-white">{{$task->description}}</p>
      </div>

      <div class="flex items-center gap-3">
        <button type="button" class="px-1" data-toggle="modal" data-target="#meuModal{{$task->id}}"><i class="ph ph-pencil-line text-gray-400 hover:text-white"></i></button>
        <a href="{{route('task.delete', $task->id)}}"><i class="ph ph-trash w-6 h-6 text-gray-400 hover:text-red-500"></i></a>
      </div>
    </div>

    <div class="modal fade" id="meuModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel{{$task->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content bg-slate-700">
              <div class="modal-header text-white border-none">
                  <h1 class="modal-title text-2xl font-semibold" id="meuModalLabel{{$task->id}}">Editar tarefa</h1>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                      <span class="text-white" aria-hidden="true">X</span>
                  </button>
              </div>
              <form action="{{route('task.edit', $task->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  @csrf
                  <input type="hidden" name="id" value="{{ $task->id }}">
                  <input class="w-[400px] p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" name="description" type="text" placeholder="Adicione uma nova tarefa" value="{{$task->description}}" required>

                  <select class="outline-none p-3 text-xs bg-slate-800 rounded-lg text-white mt-2" name="categorie" required>
                    <option selected disabled value="">Selecione uma categoria</option>
                    @foreach ($categoriesTask as $categorie)
                    <option class="capitalize" value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="modal-footer">
                    <button class="bg-blue-600 text-white flex items-center gap-2 py-3 px-3 ml-2 rounded-lg font-semibold hover:bg-blue-800 transition-all" type="submit">Editar</button>
                </div>
            </form>
          </div>
      </div>
    </div>
@endforeach

    @endif

    {{-- @yield('categorie-tasks') --}}
  </div>
</div>

@endsection
