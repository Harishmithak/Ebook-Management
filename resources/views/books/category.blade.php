@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Categories</h1>
    <div class="row">
        @foreach($categories as $category)
     <div class="col-md-4 mb-4">
                <div class="card" style="background-color:beige;">
                    <img src="{{ $category->category_image}}" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->category_name }}</h5> 
                        <a href="{{ route('books.show', ['category_id' => $category->id]) }}" class="btn btn "style="background-color:burlywood;">View Books</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
