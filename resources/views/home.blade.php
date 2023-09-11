@extends('layouts.app')

@section('content')
                <div class="sidebar vh-100 bg-light">
                    
                    <ul>
                        <li>
                            <a href="/category">categories</a>
                        </li>
                     
                    </ul>
                </div>
            </div>
@endsection
     <style>
        .navbar {
            background-color: burlywood;
        }

        /* Sidebar Styles */
        .sidebar {
            color: black;
            padding: 20px;
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
