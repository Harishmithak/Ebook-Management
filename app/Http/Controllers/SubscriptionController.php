<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\book;
use App\Models\category;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

use App\Mail\SubscriptionConfirmation;

use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{

    public function subscribe(Request $request)
    {
       
        $user = auth()->user();
        Subscription::where('user_id', $user->id)
        ->whereDate('expires_at', '=', now()->toDateString())
        ->delete();
        redirect()->back();
        if ($user->isSubscribed()) {
            return redirect()->back()->with('info', 'You are already subscribed.');
        }
        // $expirationDate = now();
  
        $expirationDate = now()->addDays(1);
      
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


        if ($subscription->expires_at <= now()) {
            Mail::to($user->email)->send(new Notification());
        }

        Mail::to($user->email)->send(new SubscriptionConfirmation($data));
        return redirect('category');
    }
  
}

