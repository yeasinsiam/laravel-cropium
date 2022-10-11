@extends('layouts.app')

@section('title', 'Register Customer')

@section('content')

    <!-- Breadcrumb Area Starts -->
    @include('components.areas.breadcrumb', [
        'title' => 'Register Customer',
        'links' => [
            [
                'title' => 'register customer',
                'url' => null,
            ],
        ],
    ])



    <!-- Contact Area Starts -->
    <section class="contact-area padding-120">
        <div class="contact-shape-1"><img src="{{ asset('assets/images/award-shape.png') }}" alt="shape"></div>
        <div class="contact-shape-2"><img src="{{ asset('assets/images/award-shape.png') }}" alt="shape"></div>
        <div class="container">

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-left-content">
                        <span class="top-span">contact us</span>
                        <h2 class="title">don't hesitate to contact us if you need more help.</h2>
                        <div class="info-top">
                            <div class="info-envelope-icon">
                                <i class="fa fa-envelope-open"></i>
                            </div>
                            <div class="info-name">
                                <h4 class="title">contact us</h4>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <div class="info-content">
                                <span>Phone : 123-456789</span>
                                <span>Email : yourmail@gmail.com</span>
                            </div>
                        </div>
                        <div class="info-top">
                            <div class="info-address-icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <div class="info-name">
                                <h4 class="title">address</h4>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <div class="info-content">
                                <span>London : 47-463 Broadway, L 100013</span>
                                <span>Canada : 12-463 Mainroad, C 209016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <span class="top-span">Register Now</span>
                    <!-- Contact Form Starts -->
                    <div class="contact-form">
                        <form action="{{ route('customer.register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input value="{{ old('name') }}" type="text" placeholder="Name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <input value="{{ old('username') }}" type="text" placeholder="User Name" name="username"
                                value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <input value="{{ old('email') }}" type="email" placeholder="Email" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="file" name="photo">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Confirm Password" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="template-btn">Register</button>
                        </form>
                        <br />
                        <span>Already have an account? <a href="{{ route('customer.login-page') }}"
                                style="color:#e22b55;">Login</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Call To Action Area Starts -->
    @include('components.areas.call-to-action-area')



@endsection
