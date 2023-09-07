@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="list-group">
        @foreach($books as $book)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ $book->book_image }}" alt="{{ $book->title }}" style="max-height: 150px;">
                    </div>
                    <div class="col-md-9">
                        <h4>{{ $book->title }}</h4>
                        <p><strong>Author:</strong> {{ $book->author }}</p>
                        <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
                        @if ($book->pdf)
                            <a href="{{ $book->pdf }}" class="btn btn-primary" target="_blank">Read PDF</a>
                        @else
                            <span class="text-muted">PDF not available</span><br>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection

