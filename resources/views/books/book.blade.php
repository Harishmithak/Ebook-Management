@extends('layouts.app')
@section('content')

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBookModal" style='margin-left:1252px'>
        Add Book
    </button>


    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Category</th>
                    <th>PDF</th>
                    <th>Book Type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Force delete</th>
                
               
                </tr>
            </thead>
            <tbody>
                <a href="{{ route('books.restore') }}" class="btn btn-primary">Restore All</a>
                @foreach ($books as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->title }}"
                                class="img-thumbnail" width="100">
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>{{ $book->category->category_name }}</td>
                        <td>
                            @if ($book->pdf)
                                <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank">View Book</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $book->booktype }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('books.delete', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Force Delete</button>
                            </form>
                        </td>
                       
                    </tr>
                  
                @endforeach
            </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center pt-5">
            {{$books->links()}}
            </div>

    </div>

    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel"
        aria-hidden="true">
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
                        <div>
                            <label for="category_id" class="col-sm-2">Category </label>
                            <div class="col-sm-10">
                                <select name="category_id" id="book">
                                    <option value="category_id" disabled> Select category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="book_image">Book Image</label>
                                <input type="file" class="form-control-file" id="book_image" name="book_image">
                            </div>

                            <div class="form-group">
                                <label for="pdf">PDF </label>
                                <input type="file" class="form-control-file" id="pdf" name="pdf">
                            </div>
                            <div class="form-group">
                                <label for="booktype">Book Type</label>
                                <input type="text" class="form-control" id="title" name="booktype">
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
        $(document).ready(function() {
            $('[data-toggle="modal"]').modal();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').modal();
    
         
            $('form').submit(function(event) {
                event.preventDefault(); 
    
                const form = this; 
    
                Swal.fire({
                    title: 'Are you sure?',
                    // text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
