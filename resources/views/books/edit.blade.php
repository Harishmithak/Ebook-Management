@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card py-4">
                        <h2 class="mx-auto">Edit Book</h2>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $book->title }}">
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ $book->author }}">
                        </div>

                        <div class="form-group">
                            <label for="published_year">Published Year</label>
                            <input type="text" class="form-control" id="published_year" name="published_year"
                                value="{{ $book->published_year }}">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $book->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-2 text-center">
                            <label class=" float-start" for="book_image">Book Image</label> <br>
                            <input type="file" class="form-control-file" id="book_image" name="book_image">
                        </div>

                        <div class="form-group mt-2 text-center">
                            <label class=" float-start" for="pdf">PDF</label> <br>
                            <input type="file" class="form-control-file" id="pdf" name="pdf">
                        </div>
                        <div class="form-group mt-2">
                            <label for="booktype">Book Type</label>
                            <input type="text" class="form-control" id="title" name="booktype"
                                value="{{ $book->booktype }}">
                        </div>
                        <button type="submit" class="btn btn-primary " id="savecg-btn">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <style>
        #savecg-btn {
            width: 25%;
            margin-left: 8em;
        }

        label {
            padding-left: 8em;
        }

        input,
        select {
            width: 60% !important;
            margin: 0 auto !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').modal();
            $('form').submit(function(event) {
                event.preventDefault();

                const form = this;

                Swal.fire({
                    title: 'Are you sure want to edit?',
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
