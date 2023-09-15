<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use App\Models\premiumbook;
use App\Models\premiumcategory;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
       
        $user = auth()->user();
        if ($user->isSubscribed()) {
            return redirect()->back()->with('info', 'You are already subscribed.');
        }
    
       
        $expirationDate = now()->addDays(30);
    

        Subscription::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'subscribe_status' => 1, 
            'subscribed_at' => now(), 
            'expires_at' => $expirationDate, 
        ]);
    
        return redirect()->back()->with('success', 'You have successfully subscribed!');
    }
    public function index()
    {
        $user = auth()->user();

        if (!$user || !$user->isSubscribed()) {
            return redirect('subscribeform')->with('error', 'You need to subscribe to access premium content.');
        }
        $premiumcategories = premiumcategory::all();
      
     
            return view('premium.premiumcategory', compact('premiumcategories'));

    }
    public function index1()
    {
        $premiumcategories = premiumcategory::all();
        $premiumbooks = premiumbook::all();
        return view('premium.premiumbook', compact('premiumbooks','premiumcategories'));
    }
    public function show($category_id)
    {
        $premiumcategories = premiumcategory::find($category_id);
        $premiumbooks = premiumbook::where('category_id', $category_id)->get();
        $premiumcategories = premiumcategory::all(); 
        return view('premium.premiumuserbook', compact('premiumbooks', 'premiumcategories')); 
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
    
        $book= premiumbook::create($validatedData); 
    }
    public function destroy($id){
       
        $book = premiumbook::find($id);
        $book->delete();
        return redirect('premiumcategory');
       }

       public function edit($id)
       {
           $book = premiumbook::find($id);
           $categories = premiumcategory::all(); 
       
           return view('premium.premiumedit', compact('book', 'categories'));
       }
       protected function validateRequest()
       {
           return request()->validate([
               'title' => 'required|string|max:255',
               'author' => 'required|string|max:255',
               'published_year' => 'required|integer',
               'category_id' => 'required|integer',
               'book_image' => 'sometimes|file|image|max:10000',
               'pdf' => 'nullable|file|mimes:pdf|max:2048',
           ]);
       }
   
       public function update(Request $request, $id)
   {
       
       $book = premiumbook::find($id);
    
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
   
       return redirect('premiumcategory');
   }
   
}

