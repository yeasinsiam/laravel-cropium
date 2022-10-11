<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserPostRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginPageController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginUserPostRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->route('user.login')->withErrors(['Invalid Password']);
    }




    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        // $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('home.index');
    }
}