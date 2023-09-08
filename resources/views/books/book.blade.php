@extends('layouts.app')
@section('content')

<div class="container">
    <ul class="list-group">
        @foreach($books as $book)
            <li class="list-group-item book-item">
                <div class="row" style="background-color:beige;">
                    <div class="col-md-3">
 
<img src="{{asset('storage/'.$book->book_image)}}" alt="" class="img-thumbnail" >

                    </div>
                    <div class="col-md-9">
                        <h4 style="color: #3498db;">{{ $book->title }}</h4>
                        <p><strong style="color: #e74c3c;">Author:</strong> {{ $book->author }}</p>
                        <p><strong style="color: #27ae60;">Published Year:</strong> {{ $book->published_year }}</p>
                        @if ($book->pdf)
                            <a href="{{ $book->pdf }}" class="btn btn-primary" target="_blank" style="background-color: #e67e22;">Read PDF</a>
                        @else
                            <span class="text-muted" style="color: #95a5a6;">PDF not available</span><br>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBookModal">
        Add Book
    </button>
</div>


<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
 
              <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>

                    <div class="form-group">
                        <label for="published_year">Published Year</label>
                        <input type="text" class="form-control" id="published_year" name="published_year">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category ID</label>
                        <input type="text" class="form-control" id="category_id" name="category_id">
                    </div>

                    <div class="form-group">
                        <label for="book_image">Book Image</label>
                        <input type="file" class="form-control-file" id="book_image" name="book_image">
                    </div>

                    <div class="form-group">
                        <label for="pdf">PDF (optional)</label>
                        <input type="file" class="form-control-file" id="pdf" name="pdf">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Book</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             
            </div>
        </div>
    </div>
</div>

<style>
    .book-item {
        margin-bottom: 20px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="modal"]').modal();
    });
</script>

@endsection




