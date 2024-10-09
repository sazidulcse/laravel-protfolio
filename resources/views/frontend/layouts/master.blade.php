<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Protfolio') }}</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="crossorigin" />
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" media="print"
        onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" />
    </noscript>
    <link href="{{ asset('assets/css/font-awesome/css/all.min7359.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-icons/bootstrap-icons7359.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min7359.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/aos7359.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main7359.css?ver=1.2.0') }}" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
    @stack('custom_css')
</head>

<body id="top">
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-nav" role="navigation">
            <div class="container"><a class="link-dark navbar-brand site-title mb-0" href="#">SAZID PROTFOLIO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-2">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content">
        <div id="content">
            @yield('content')
            <footer class="pt-4 pb-4 text-center bg-light">
                <div class="container">
                    <div class="my-3">
                        <div class="h4">{{Auth()->user()->name??''}}</div>
                        <p>{{$profile->profession??''}}</p>
                        <div class="social-nav">
                            <nav role="navigation">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item"><a class="nav-link" href="https://twitter.com/templateflip"
                                            title="Twitter"><i class="fab fa-twitter"></i><span
                                                class="menu-title sr-only">Twitter</span></a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="https://www.facebook.com/templateflip" title="Facebook"><i
                                                class="fab fa-facebook"></i><span
                                                class="menu-title sr-only">Facebook</span></a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="https://www.instagram.com/templateflip" title="Instagram"><i
                                                class="fab fa-instagram"></i><span
                                                class="menu-title sr-only">Instagram</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://www.linkedin.com/"
                                            title="LinkedIn"><i class="fab fa-linkedin"></i><span
                                                class="menu-title sr-only">LinkedIn</span></a></li>
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="text-center mb-0 mt-4">Copyright &copy;2024. All right reserved | This Web Site developer <span
                            class="ti-heart fg-theme-red"></span> by <a href="https://github.com/sazidulcse/">{{Auth()->user()->name??''}}</a></p>
                      </div>
                </div>
            </footer>
        </div>
    </div>
    <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i
                    class="fas fa-angle-up fa-x"></i></span></a></div>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/scripts/imagesloaded.pkgd.min7359.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('assets/scripts/masonry.pkgd.min7359.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('assets/scripts/BigPicture.min7359.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('assets/scripts/purecounter.min7359.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('assets/scripts/bootstrap.bundle.min7359.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('assets/scripts/aos.min7359.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('assets/scripts/main7359.js?ver=1.2.0') }}"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8c17900878705f84","version":"2024.8.0","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"token":"9b7e49e3e22049349b96a4d30f3c83ad","b":1}'
        crossorigin="anonymous"></script>
    @stack('custom_js')
</body>

</html>
