@extends('layouts.app')

@section('content')

{{-- bg-video --}}
{{-- <section class="bg-img">
             <div class="sidebar vh-100 bg-light">
                    
                    <ul class="p-1">
                        <li>
                            <a href="/category">categories</a>
                        </li>
                     
                    </ul>
                        <ul class="p-1">
                        <li>
                            <a href="{{ route('books.userbook') }}">Books</a>
                        </li>
                     
                    </ul>
           </div>
           
        </section> --}}
@endsection

     <style>
/* .bg-img{
    background-image: url("https://images.unsplash.com/photo-1688516353461-540cd4b178fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDk5fENEd3V3WEpBYkV3fHxlbnwwfHx8fHw%3D&auto=format&fit=crop&w=500&q=60");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100vw;
    padding: 620px 0 220px;
    z-index: 0;
} */

        

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
