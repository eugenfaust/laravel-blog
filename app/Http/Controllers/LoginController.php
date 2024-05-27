<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  /**
   * Handle an authentication attempt.
   */
  public function authenticate(Request $request): RedirectResponse
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended();
    }

    return redirect()->route('index')->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }

  public function register()
  {
    return view('auth/register');
  }

  public function store(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'email' => ['required', 'email'],
        'name' => ['required'],
        'password' => ['required', 'confirmed'],
      ]
    );
    if ($validator->fails()) {
      return redirect('register')
        ->withErrors($validator)
        ->withInput();
    }
    $validator->after(function ($validator) {
      $user = User::where('email', $validator->safe()->email)->first();
      if ($user) {
        $validator->errors()->add('email', 'User with email address already exists');
      }
    });
    if ($validator->fails()) {
      return redirect('register')->withErrors($validator)->withInput();
    }
    $data = $validator->validated();
    unset($data['password_confirmation']);
    $data['password'] = Hash::make($data['password']);
    $user = User::create($data);
    Auth::login($user);
    return redirect()->route('index');
  }
  public function logout(Request $request): RedirectResponse
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
  }
}
