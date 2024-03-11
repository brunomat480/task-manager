<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  public function create()
  {
    return view('auth.sign-up');
  }

  public function auth(Request $request)
  {
    $userCredentials = $request->validate(
      [
        'email' => ['required', 'email'],
        'password' => ['required'],
      ],
      [
        'email.required' => 'Informe o e-mail e a senha',
        'email.email' => 'O email não é válido',
        'password.required' => 'Informe o e-mail e a senha',
      ]
    );

    if (Auth::attempt($userCredentials, $request->remember)) {

      $request->session()->regenerate();

      return redirect()->intended(route('app.home'));
    } else {
      return redirect()->back()->with('erro', 'Usuário ou senha inválido');
    }
  }

  public function logOut(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect(route('auth.signin'));
  }
}
