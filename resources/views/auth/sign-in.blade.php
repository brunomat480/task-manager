@extends('layout')

@section('title', 'Sign In')

@section('content')

@if($message = Session::get('erro'))
    {{$message}}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br />
    @endforeach
@endif

<div class="h-screen flex flex-col justify-center items-center">
  <h1 class="text-gray-400 text-4xl mb-4">Login</h1>

  <form class="w-80" action="{{route('auth.authenticate')}}" method="POST" enctype="multipart/form-data">
    <div class="flex flex-col gap-4 text-sm">
      @csrf
      <input class="p-2 outline-none rounded-sm border-2 focus:border-blue-600 transition-all" name="email" placeholder="E-mail">
      <input class="p-2 outline-none rounded-sm border-2 focus:border-blue-600" type="password" name="password" placeholder="Senha">
    </div>

    <button class="bg-transparent border-2 border-blue-600 text-blue-600 py-2 rounded-sm w-full mt-10 hover:bg-blue-600 hover:text-white transition-all" type="submit">Entrar</button>

    <p class="text-white mt-5 text-center">Ainda não possui conta? <a class="underline text-blue-600 font-semibold" href="{{route('auth.signup')}}">Cadastre-se</a></p>
  </form>
</div>

@endsection
