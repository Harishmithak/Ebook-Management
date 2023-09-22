@extends('layouts.app')

@section('content')
<head>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite(['resources/css/app.css'])

</head>


    <body class="main-home">
        <div class="container">
            <div class="row gy-4" id="main-row">
                <div class="col-md-6">
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
                <div class="col-md-6" id="main-sec-col">
                    <p>"Ebooks:Where words come to
                        life anywhere."</p>
                </div>
            </div>







        </div>


    </body>

@endsection


