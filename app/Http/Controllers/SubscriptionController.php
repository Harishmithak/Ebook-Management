<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use App\Models\book;
use App\Models\category;

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
        $categories = Category::all();
        $books = Book::all();
    
        if (auth()->user()->isSubscribed()) {
            return view('books.category', compact('categories', 'books'));
        } else {
            return view('subscription.form');
        }
    }
    
}

