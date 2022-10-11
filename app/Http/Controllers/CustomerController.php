<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginCustomerRequest;
use App\Models\Customer;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show register page
     *
     * @return \Illuminate\Http\Response
     */
    public function registerPage()
    {
        return view('pages.customer.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegisterCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterCustomerRequest $request)
    {
        // $request_photo_file = $request->file('photo');
        // $photo_name = $request_photo_file->hashName();
        // $request_photo_file->storeAs('/public/user-photos', $photo_name);



        Customer::create(array_merge($request->all(), [
            // 'photo' => $photo_name,
            'email_verified_at' => Carbon::now(),
        ]));


        if (Auth::guard('customer')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return redirect()->route('customer.index');
        }

        return back()->withErrors([
            'error-message' => 'Failed to create account',
        ]);
    }



    /**
     * Show login page
     *
     * @return \Illuminate\Http\Response
     */
    public function loginPage()
    {
        return view('pages.customer.login');
    }

    public function login(LoginCustomerRequest $request)
    {

        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('customer.index');
        }

        return redirect()->back()->withErrors(['Invalid Password']);
    }


    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        // $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('customer.login');
    }
}