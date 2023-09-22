<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/128/11515/11515485.png">
    <title>{{ $text }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    {{-- Home page banner font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/91232b44e6.js" crossorigin="anonymous" defer></script>

    {{-- sweealert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        {{-- navbar-light bg-white --}}
        <nav class="navbar navbar-expand-md  shadow-sm">
            <div class="container">

                <img class="navbar-brand" src="https://cdn-icons-png.flaticon.com/128/11515/11515485.png"
                    width="5%">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="ms-3">
                            <a href="/" style='text-decoration:none;color:rgb(252, 249, 249)'
                                id='menu'>Home</a>
                        </li>
                       
                        <li class="ms-3">
                            <a href="/aboutus" style='text-decoration:none;color:rgb(252, 249, 249)'
                                id='menu'>About Us</a>
                        </li>
                        @can('create', App\Models\book::class)
                            <li class="ms-3">
                                <a href="books" style='text-decoration:none;color:rgb(19, 15, 15);' id='menu'>Book
                                    Details</a>
                            </li>
                        @endcan




                        <li class="ms-3">
                            <a href="/category" style='text-decoration:none;color:rgb(252, 249, 249)' id='menu'>
                                Categories</a>
                        </li>
                        <li class="ms-3">
                            <a href="/subscribeform" style='text-decoration:none;color:rgb(252, 249, 249)'
                                id='menu'>Subscription</a>
                        </li>
                        {{-- <li class="ms-3">
                        <a href="/premiumcategory" style='text-decoration:none;color:rgb(252, 249, 249)' id='menu'><img class='menu-image' src="{{ asset('images/premium.png') }}"alt="Image">Premium</a>
                       </li> --}}
                    </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" id='menu'>
                                    <a class="nav-link" href="{{ route('login') }}" id='menu'>{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"
                                        id='menu'>{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" id="logout-link"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"
                                        id='menu'>
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
        {{-- <main class="py-4"> --}}
        @yield('content')
        {{-- </main> --}}
    </div>
    <script>
        $(document).ready(function() {

            $('#logout-link').click(function(event) {
                event.preventDefault();
                Swal.fire({
                    text: 'Logout successfull!',
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                }).then((result) => {

                    form.submit();
                });
            });
        });
    </script>


</body>

</html>
<style>
    .navbar {
        /* background:  linear-gradient(to right, #093637, #44a08d); */
        background-color: #0D6E6E;
    }

    #menu {
        font-family: 'Lato', sans-serif;
        font-size: 19px;
        color: white;
    }

    #navbarDropdown {
        color: white;
        font-family: 'Lato', sans-serif;
        font-size: 19px;
    }

    .menu-image {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        vertical-align: middle;
    }
</style>
