<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;
use Intervention\Image\Facades\Image;

class BooksController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('books.category', compact('categories'));
    }
    public function show($category_id)
    {
        $category = category::find($category_id);
        $books = book::where('category_id', $category_id)->get();
        return view('books.book',  compact('books'));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'category_id' => 'required|integer',
            'book_image' =>'sometimes|file|image|max:10000', 
            'pdf' => 'nullable|file|mimes:pdf|max:2048', 
        ]);
        if ($request->hasFile('book_image')) {
            $validatedData['book_image'] = $request->file('book_image')->store('book_images', 'public');
        }
        $book= book::create($validatedData); 
    }

  
}
