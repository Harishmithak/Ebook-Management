<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;

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


}
