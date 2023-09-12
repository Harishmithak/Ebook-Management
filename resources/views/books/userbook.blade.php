@extends('layouts.app')
@section('content')
<body>
<div class="container">
    <h1>
         
    </h1>
    <ul class="list-group">
       
            <li class="list-group-item book-item">
                <div class="row align-items-center">
                    @foreach($books as $book)
                    <div class="col-md-3">
                    <img src="{{asset('storage/'.$book->book_image)}}" alt="" class="img-thumbnail" >
                    </div>
                    <div class="col-md-3">
                        <h4>{{ $book->title }}</h4>
                        <p><strong >Author:</strong> {{ $book->author }}</p>
                        <p><strong >Published Year:</strong> {{ $book->published_year }}</p>
                        @if ($book->pdf)
                        <button class="custom-btn btn-7 shadow-none" ><span> <a id="view-btn" href="{{asset('storage/'.$book->pdf)}}" >Read Book</a></span></button>  
                        @else
                            <span class="text-muted" style="color: #95a5a6;">PDF not available</span><br>
                        @endif
                    </div> @endforeach
                </div>
            </li>
       
    </ul>
</div>
</body>
{{-- <body>
<div class="container">
    <h1>
         
    </h1>
    <div class="row">
        @foreach($books as $book)
     <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{asset('storage/'.$book->book_image)}}" class="card-img" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5> 
                        <h5 class="card-title">{{ $book->author }}</h5> 
                        <h5 class="card-title">{{ $book->published_year }}</h5> 
                        @if ($book->pdf)
                        <button class="custom-btn btn-7"><span> <a href="{{asset('storage/'.$book->pdf)}}" class="btn" >Read Book</a></span></button>  
                        @else
                        <span class="text-muted" style="color: #95a5a6;">PDF not available</span><br>
                    @endif         
                         </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body> --}}
<style>
    body{
    background-color: #0D1F2D;
    font-family: 'Kanit', sans-serif;
}
.card-body{
        background-color: #e0e0e0;
    }
    .card-img {
    width: 100%;
    height: 25vw;
    object-fit: cover;
}
#view-btn{
    text-decoration: none;
    color:white;
    font-weight: 600;
}
.custom-btn:hover #view-btn{
    color: #0D6E6E!important;
}
.custom-btn {
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

   /* 7 */
.btn-7 {
background: linear-gradient(0deg, #4a9d9c 0%, #0D6E6E 100%);
  line-height: 42px;
  padding: 0;
  border: none;
}
.btn-7 span {
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
}
.btn-7:before,
.btn-7:after {
  position: absolute;
  content: "";
  right: 0;
  bottom: 0;
  background: #0D6E6E;
  box-shadow:
   -7px -7px 20px 0px rgba(255,255,255,.9),
   -4px -4px 5px 0px rgba(255,255,255,.9),
   7px 7px 20px 0px rgba(0,0,0,.2),
   4px 4px 5px 0px rgba(0,0,0,.3);
  transition: all 0.3s ease;
}
.btn-7:before{
   height: 0%;
   width: 2px;
}
.btn-7:after {
  width: 0%;
  height: 2px;
}
.btn-7:hover{
  color: #0D6E6E;
  background: transparent;
}
.btn-7:hover:before {
  height: 100%;
}
.btn-7:hover:after {
  width: 100%;
}
.btn-7 span:before,
.btn-7 span:after {
  position: absolute;
  content: "";
  left: 0;
  top: 0;
  background: #0D6E6E;
  box-shadow:
   -7px -7px 20px 0px rgba(255,255,255,.9),
   -4px -4px 5px 0px rgba(255,255,255,.9),
   7px 7px 20px 0px rgba(0,0,0,.2),
   4px 4px 5px 0px rgba(0,0,0,.3);
  transition: all 0.3s ease;
}
.btn-7 span:before {
  width: 2px;
  height: 0%;
}
.btn-7 span:after {
  height: 2px;
  width: 0%;
}
.btn-7 span:hover:before {
  height: 100%;
}
.btn-7 span:hover:after {
  width: 100%;
}

</style>
@endsection;

