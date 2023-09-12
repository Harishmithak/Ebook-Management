<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class BooksController extends Controller
{
    public function index()
    {
        $categories = category::all();
        $books = book::all();
        return view('books.category', compact('categories','books'));
    }
    public function index1()
    {
        $categories = category::all();
        $books = book::all();
        return view('books.book', compact('books','categories'));
    }
    public function show($category_id)
    {
        $category = category::find($category_id);
        $books = book::where('category_id', $category_id)->get();
        $categories = category::all(); 
        return view('books.userbook', compact('books', 'categories')); 
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
        
    if ($request->hasFile('pdf')) {
        $validatedData['pdf'] = $request->file('pdf')->store('pdfs', 'public'); 
    }
    
        $book= book::create($validatedData); 
    }


    public function edit($id)
    {
        $book = book::find($id);
        $categories = category::all(); 
    
        return view('books.edit', compact('book', 'categories'));
    }


    public function update(Request $request, $id)
{
    
    $book = Book::find($id);
 
    $validatedData = $this->validateRequest();

    if ($request->hasFile('book_image')) {
        
        Storage::delete('storage/' . $book->book_image);
        $validatedData['book_image'] = $request->file('book_image')->store('book_images', 'public');
    }
    if ($request->hasFile('pdf')) {
        Storage::delete('storage/' . $book->pdf); 
        $validatedData['pdf'] = $request->file('pdf')->store('pdfs', 'public'); 
    }
    $book->update($validatedData);

    return redirect('category');
}


    
    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'book_image' => 'sometimes|file|image|max:10000', 
            'pdf' => 'nullable|file|mimes:pdf|max:2048', 
        ]);
    }
    public function destroy($id){
       
        $book = Book::find($id);
        $book->delete();
        return redirect('category');
       }
    
}
