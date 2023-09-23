<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\premiumcategory;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        // $categories = DB::select('CALL GetAllCategories()');
        $categories = category::all();
        $books = book::all();
        if (!empty($categories)) {
            return view('books.category', compact('categories', 'books'));
        } else {
            return view('errors.no_records');
        }
    }

    public function index1()
    {

        $categories = DB::select('CALL GetAllCategories()');
        // $books = book::all();
        $books = book::paginate(2);
        return view('books.book', compact('books', 'categories'));
    }


    public function show($category_id)
    {
        $category = category::find($category_id);
        $categories = DB::select('CALL GetAllCategories()');
        $books = Book::where('category_id', $category_id)
            ->get();
            if ($books->count() === 0) {       
                return view('errors.no_records');
            }
       return view('books.userbook', compact('books', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'category_id' => 'required|integer',
            'book_image' => 'sometimes|file|image|max:10000',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'booktype' => 'required|string|max:255',
        ]);
        if ($request->hasFile('book_image')) {
            $validatedData['book_image'] = $request->file('book_image')->store('book_images', 'public');
        }

        if ($request->hasFile('pdf')) {
            $validatedData['pdf'] = $request->file('pdf')->store('pdfs', 'public');
        }
        $book = book::create($validatedData);
    }

    // public function edit($id)
    // {
    //     $book = book::find($id);
    //     $categories = DB::select('CALL GetAllCategories()');
    //     return view('books.edit', compact('book', 'categories'));
    // }
    public function edit($id)
    {
        $book = book::find($id);
        if (!$book) {
            return view('errors.no_records');
        }
        $categories = DB::select('CALL GetAllCategories()');
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
            'booktype' => 'required|string|max:255',
        ]);
    }

    public function softDelete($id)
    {
        $book = book::find($id);
        $book->delete();
        return redirect()->back();
    }

    public function restore()
    {
        $book = Book::onlyTrashed()->restore();
        return redirect()->back();
    }
    public function forceDelete($id)
    {
        $book = book::find($id);
        $book->forceDelete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('category_name', 'like', '%' . $query . '%')->get();
        return view('books.category', ['categories' => $categories, 'query' => $query]);
    }

}