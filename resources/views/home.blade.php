@extends('layouts.app')

@section('content')
{{-- @auth
@if (!auth()) --}}
    <body class="main-home">
        <div class="container">
            <div class="row" id="main-row">
                <div class="col-6">
                    {{-- <img id="main-img" src="{{ asset('images/book-img-1.png') }}"alt="Image"> --}}
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/ebook-1.avif') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/ebook-2.avif') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/ebook-3.avif') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button> --}}
                    </div>
                </div>
                <div class="col-6" id="main-sec-col">
          <p>"Ebooks:Where words  come to
                    life anywhere."</p>
                </div>
            </div>






            
        </div>
        
    
    </body>
    {{-- @endif
@endauth --}}
@endsection

<style>
  @import url('https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@1,700&display=swap');

    body {
        overflow-x: hidden;
    }

    .main-home {
        background-color: #95d1c2 !important;

    }

    #main-sec-col {
        font-family: 'Space Mono', monospace;
        font-size: 40px;
        color: rgb(15, 15, 15);
        text-align: center;
    }

    #main-row {
        margin-top: 5em;
        position: absolute;
        z-index: 1;
        align-items: center;
    }

    #main-img {

        width: 100%;
        height: 85%;
    }


    .navbar {
        background-color: burlywood;
    }

    .sidebar {
        color: black;
        height: 100%;
        overflow-y: auto;
        overflow-x: hidden;

    }

    .sidebar h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin-bottom: 10px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: black;
        font-size: 16px;
        display: block;
        transition: color 0.3s ease;


    }

    .sidebar ul li a:hover {
        color: #ffcc00;
    }
</style>
