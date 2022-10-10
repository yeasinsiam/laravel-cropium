<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserPostRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Str;

class RegisterPageController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }


    public function register(RegisterUserPostRequest $request)
    {


        $request_photo_file = $request->file('photo');
        $photo_name = $request_photo_file->hashName();
        $request_photo_file->storeAs('/public/user-photos', $photo_name);



        $user = User::create(array_merge($request->all(), [
            'photo' => $photo_name,
            'email_verified_at' => Carbon::now(),
            'role'              => 'subscriber'
        ]));




        if (Auth::login($user)) {
            $request->session()->regenerate();

            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'error-message' => 'Failed to create  account',
        ]);
    }
}