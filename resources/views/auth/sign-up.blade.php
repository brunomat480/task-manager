@extends('layout')

@section('title', 'Sign Up')

@section('content')

<div class="h-screen flex flex-col justify-center items-center">
  <h1 class="text-gray-400 text-4xl mb-4">Cadastro</h1>

  <form class="w-80" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">

    <div class="flex flex-col gap-4 text-sm">
      @csrf
      <input class="p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" type="text" name="username" placeholder="Nome de usuário">

      <input class="p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" type="email" name="email" placeholder="E-mail">

      <input class="p-2 outline-none rounded-sm border-2 focus:border-blue-600" type="password" name="password" placeholder="Senha">
    </div>

    <button class="bg-transparent border-2 border-blue-600 text-blue-600 py-2 rounded-sm w-full mt-10 hover:bg-blue-600 hover:text-white transition-all" type="submit">Cadastrar</button>

    <p class="text-white mt-5 text-center">Já possui uma conta? <a class="underline text-blue-600 font-semibold" href="{{route('auth.signin')}}">Entrar</a></p>
  </form>
</div>

@endsection
