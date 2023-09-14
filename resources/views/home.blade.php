@extends('layouts.app')

@section('content')
<body>
<div class="container">
    <div class="row" id="main-row">
        <div class="col-6">
            {{-- <img id="main-img" src="{{ asset('images/book-img-1.png') }}"alt="Image"> --}}
<video playsinline autoplay muted loop poster="" id="main-img">
        <source src="{{ asset('videos/book.mp4') }}" type="video/mp4">
    </video> 
        </div>
        <div class="col-6" id="main-sec-col">
<p>"The beauty of ebooks is that they can be your constant companions, ready to dive into whenever you are"</p>
        </div>
    </div>
</div>






<div class="section-2">
    <div id="home-bg-video">

    </div>
    {{-- <video playsinline autoplay muted loop poster="" id="home-bg-video">
        <source src="{{ asset('videos/bg-new.mp4') }}" type="video/mp4">
    </video> --}}
</div>
</body>
@endsection

     <style>
        body{
            overflow-x: hidden;
        }
        #main-sec-col{
            font-family: 'Concert One', cursive;
            font-size: 40px;
            color:rgb(15, 15, 15);
            text-align: center;
        }
        #main-row{
            margin-top: 5em;
            position: absolute;
            z-index: 1;
            align-items: center;
        }
        #main-img{
   
        width: 100%;
        height: 85%;
        }
        #home-bg-video {
background-color: white;
        top: 0;
        width: 99.9vw;
        height: 568px !important;
        object-fit: cover;
        position: relative;
        z-index: 0;
       
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
