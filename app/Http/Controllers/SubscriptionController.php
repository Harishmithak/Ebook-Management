<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\book;
use App\Models\category;
use App\Models\User;
use App\Models\premiumbook;
use App\Models\premiumcategory;
use Illuminate\Support\Facades\Storage;

use App\Mail\SubscriptionConfirmation;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
       
        $user = auth()->user();
        if ($user->isSubscribed()) {
            return redirect()->back()->with('info', 'You are already subscribed.');
        }
    
       
        $expirationDate = now()->addDays(30);
    

        $subscription= Subscription::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'subscribe_status' => 1, 
            'subscribed_at' => now(), 
            'expires_at' => $expirationDate, 
        ]);
        $data = [
            'start_date' => $subscription->subscribed_at->format('Y-m-d'),
            'expires_at' => $subscription->expires_at->format('Y-m-d'),
        ];
        Mail::to($user->email)->send(new SubscriptionConfirmation($data));
        return redirect('category');
      
    }
  
}

