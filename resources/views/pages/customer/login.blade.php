@extends('layouts.app')

@section('title', 'Login Customer')

@section('content')

    <!-- Breadcrumb Area Starts -->
    @include('components.areas.breadcrumb', [
        'title' => 'Login Customer',
        'links' => [
            [
                'title' => 'login customer',
                'url' => null,
            ],
        ],
    ])

    <!-- Contact Area Starts -->
    <section class="contact-area padding-120">
        <div class="contact-shape-1"><img src="{{ asset('assets/images/award-shape.png') }}" alt="shape"></div>
        <div class="contact-shape-2"><img src="{{ asset('assets/images/award-shape.png') }}" alt="shape"></div>
        <div class="container">

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
                    <span class="top-span">Login Now</span>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <!-- Contact Form Starts -->
                    <div class="contact-form">
                        <form action="{{ route('customer.login') }}" method="POST">
                            @csrf
                            <input value="{{ old('email') }}" type="email" placeholder="Email" name="email">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" class="template-btn">Login</button>
                        </form>
                        <br />
                        <span>Don't have an account? <a href="{{ route('customer.register-page') }}"
                                style="color:#e22b55;">Register</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- Call To Action Area Starts -->
    @include('components.areas.call-to-action-area')



@endsection
