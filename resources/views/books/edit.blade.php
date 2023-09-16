@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Book</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>

        <div class="form-group">
            <label for="published_year">Published Year</label>
            <input type="text" class="form-control" id="published_year" name="published_year" value="{{ $book->published_year }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="book_image">Book Image</label>
            <input type="file" class="form-control-file" id="book_image" name="book_image">
        </div>

        <div class="form-group">
            <label for="pdf">PDF</label>
            <input type="file" class="form-control-file" id="pdf" name="pdf">
        </div>
        <div class="form-group">
            <label for="booktype">Book Type</label>
            <input type="text" class="form-control" id="title" name="booktype" value="{{ $book->booktype }}">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
