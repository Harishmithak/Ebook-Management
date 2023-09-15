
@extends('layouts.app')
@section('content')

 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBookModal" style='margin-left:1252px'>
        Add Book
    </button> 

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Category</th>
                <th>Book Image</th>
                <th>PDF</th>
                <th>Edit</th>              
                <th>Delete</th>
          
        
            </tr>
        </thead>
        <tbody>
            @foreach($premiumbooks as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->premiumcategory->category_name}}</td>
                    <td>
                        <img src="{{ asset('storage/'.$book->book_image) }}" alt="{{ $book->title }}" class="img-thumbnail" width="100">
                    </td>
                    <td>
                
                        @if ($book->pdf)
                               <a href="{{ asset('storage/'.$book->pdf) }}" target="_blank">View Book</a>
                        @else
                            N/A
                        @endif
                    </td>
         
                    <td>
                        <a href="{{ route('premiumbooks.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                    </td>
  
                    <td>
                        <form action="{{ route('premiumbooks.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
         
                </tr>
            @endforeach
        </tbody>
    </table>


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
 
              <form action="{{ route('premiumbooks.store') }}" method="POST" enctype="multipart/form-data">
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
      @foreach($premiumcategories as $category)
          <option value="{{$category->id}}"> {{$category->category_name}} </option>
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




