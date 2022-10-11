<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->

    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- CSS StyleSheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <!-- Header Area Starts -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Navbar Starts -->
                    <nav class="navbar navbar-area navbar-expand-lg nav-style-02 nav-absolute">
                        <div class="container nav-container">
                            <div class="responsive-mobile-menu">
                                <div class="logo-wrapper">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                                    </a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#cropium-main-menu" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="toggle-icon"></span>
                                    <span class="toggle-icon"></span>
                                    <span class="toggle-icon"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="cropium-main-menu">
                                <ul class="navbar-nav">
                                    <li class="no-children">
                                        <a href="{{ route('home.index') }}">home</a>
                                    </li>
                                    <li class="no-children">
                                        <a href="{{ route('blog.index') }}">Blog</a>
                                    </li>
                                    @auth
                                        <li class="no-children">
                                            <a href="{{ route('admin.dashboard.index') }}">Dashbord</a>
                                        </li>
                                    @endauth

                                    {{-- <li class="no-children">
                                        <a href="/about">about</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="/blog">blog</a></li>
                                            <li><a href="/blog-details">blog details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="/service">service</a></li>
                                            <li><a href="/service-details">service details</a></li>
                                            <li><a href="/portfolio">portfolio</a></li>
                                            <li><a href="/portfolio-details">portfolio details</a></li>
                                            <li><a href="/404">404</a></li>
                                        </ul>
                                    </li>
                                    <li class="no-children">
                                        <a href="/contact">contact</a>
                                    </li> --}}
                                </ul>
                            </div>

                            <!-- Nav Right Content Starts -->
                            <div class="nav-right-content">
                                <a href="#" class="header-language active">en</a>
                                <a href="#" class="header-language">bn</a>
                                {{-- <a href="#" class="template-btn header-btn">hire me</a> --}}
                                @guest
                                    <a href="{{ route('user.register') }}" class="template-btn header-btn">Join Now</a>
                                @endguest

                                @auth
                                    <form action="{{ route('user.logout') }}" class="d-inline" method="POST">
                                        @csrf
                                        <button type="submit" class="template-btn header-btn">Log Out</button>
                                    </form>
                                @endauth
                            </div>
                            <!-- Nav Right Content End -->
                        </div>
                    </nav>
                    <!-- Navbar End -->
                </div>
            </div>
        </div>
    </header>

    {{-- Main Content  --}}
    @yield('content')


    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo">
                            <a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="/">home</a></li>
                                <li><a href="/about">about</a></li>
                                <li><a href="/contact">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <span>&copy; 2020, Cropium. All Rights Reserved.</span>
            </div>
        </div>
    </footer>


    <!-- Javascript -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotop.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
