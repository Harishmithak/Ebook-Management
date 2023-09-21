<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\book;
use App\Models\category;
use App\Models\User;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use App\Events\SubscriptionConfirmed;

use Illuminate\Support\Facades\Storage;

use App\Mail\SubscriptionConfirmation;

use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{




    private $razorpayId = "rzp_test_viqDHFaE1Sl6eq";
    private $razorpayKey = "OJmdfEGQFyIUHwUgBaNbW0iN";
    public function Initiate(Request $request)
    {
        $user = auth()->user();
        $receiptId = Str::random(20);
        $api = new Api($this->razorpayId, $this->razorpayKey);
        $order = $api->order->create(
            array(
                'receipt' => $receiptId,
                'amount' => $request->all()['amount'] * 100,
                'currency' => 'INR'
            )
        );
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->all()['amount'] * 100,


            'name' => $user->name,
            'currency' => 'INR',

            'email' => $user->email,


            'description' => 'testing description',
        ];
        return view('subscription.payment_page', compact('response'));
    }
    public function complete(Request $request)
    {

        $user = auth()->user();

        if ($user->isSubscribed()) {
            return redirect()->back()->with('info', 'You are already subscribed.');
        }
        //$expirationDate = now();

         $expirationDate = now()->addDays(30);

        $subscription = Subscription::create([
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
            'email' => $user->email,
        ];


        if ($subscription->expires_at <= now()) {
      
               
                
        
            Mail::to($user->email)->send(new Notification());
        }

        // Mail::to($user->email)->send(new SubscriptionConfirmation($data));
        event(new SubscriptionConfirmed($data));
         return redirect('category');  
    }
}
// public function subscribe(Request $request)
// {

//     $user = auth()->user();

//     if ($user->isSubscribed()) {
//         return redirect()->back()->with('info', 'You are already subscribed.');
//     }
//     // $expirationDate = now();

//     $expirationDate = now()->addDays(1);

//     $subscription= Subscription::create([
//         'user_id' => $user->id,
//         'name' => $user->name,
//         'email' => $user->email,
//         'subscribe_status' => 1, 
//         'subscribed_at' => now(), 
//         'expires_at' => $expirationDate, 
//     ]);
//     $data = [
//         'start_date' => $subscription->subscribed_at->format('Y-m-d'),
//         'expires_at' => $subscription->expires_at->format('Y-m-d'),
//     ];
//     if ($subscription->expires_at <= now()) {
//         Mail::to($user->email)->send(new Notification());
//     }
//     Mail::to($user->email)->send(new SubscriptionConfirmation($data));
//     return redirect('category');
// }
