<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction as TS;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
 
//     public function session(Request $request)
// {   
//     Validator::make($request->all(), [
//         'name' => 'required',
//         'email' => 'required',
//     ])->validate();

//     \Stripe\Stripe::setApiKey(config('stripe.sk'));

//     $name = $request->input('name');
//     $donorEmail = $request->input('email');
//     $refEmail = $request->input('refemail');
//     $user = User::where('email', $refEmail)->first();
//     $userId = $user->id;

//     // Retrieve or create the customer based on their email
//     try {
//         $customerList = \Stripe\Customer::all(['email' => $donorEmail]);
//         $customer = $customerList->data[0] ?? null; // Get the first customer (if any)
//     } catch (\Stripe\Exception\ApiErrorException $e) {
//         // Handle API error
//         return redirect()->back()->with('error', 'Failed to retrieve customer information.');
//     }

//     if (!$customer) {
//         // If the customer doesn't exist, create a new one
//         try {
//             $customer = \Stripe\Customer::create(['email' => $donorEmail]);
//         } catch (\Stripe\Exception\ApiErrorException $e) {
//             // Handle API error
//             return redirect()->back()->with('error', 'Failed to create new customer.');
//         }
//     }

//     $amount = $request->input('amount');
//     $total = $amount * 100; // Convert amount to cents

//     $session = \Stripe\Checkout\Session::create([
//         'customer' => $customer->id, 
//         'payment_method_types' => ['card'],
//         'line_items' => [[
//             'price_data' => [
//                 'currency' => 'USD',
//                 'product_data' => [
//                     'name' => $name,
//                 ],
//                 'unit_amount' => $total,
//             ],
//             'quantity' => 1,
//         ]],
//         'mode' => 'payment',
//         'success_url' => route('success', [], absolute:true)."?session_id={CHECKOUT_SESSION_ID}",
//         'cancel_url' => route('cancel', [], absolute:true),
//     ]);

//     $payment = TS::create([
//         'session_id' => $session->id,
//         'user_id' => $userId,
//         'coach_id' => $user->coach_id,
//         'name' => $name,
//         'email' => $donorEmail,
//         'amount' => $amount,
//     ]);

    

//     return redirect()->away($session->url);
// }

public function session(Request $request)
{   
    Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
    ])->validate();

    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $name = $request->input('name');
    $donorEmail = $request->input('email');
    $refEmail = $request->input('refemail');
    $user = User::where('email', $refEmail)->first();
    $userId = $user->id;

     

    // Retrieve or create the customer based on their email
    try {
        $customerList = \Stripe\Customer::all(['email' => $donorEmail]);
        $customer = $customerList->data[0] ?? null; // Get the first customer (if any)
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Handle API error
        return redirect()->back()->with('error', 'Failed to retrieve customer information.');
    }

    if (!$customer) {
        // If the customer doesn't exist, create a new one
        try {
            $customer = \Stripe\Customer::create(['email' => $donorEmail]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle API error
            return redirect()->back()->with('error', 'Failed to create new customer.');
        }
    }

    // Get the amount from the custom_amount input field
    $customAmount = $request->input('custom_amount');
    if (!empty($customAmount)) {
        $amount = $customAmount;
    } else {
        // If custom_amount is blank, get the amount from the selected radio button
        $amount = $request->input('amount');
    }

    $total = $amount * 100; // Convert amount to cents

    $successUrl = route('success', [
        'userId' => $userId,
    ], absolute:true);   

    $session = \Stripe\Checkout\Session::create([
        'customer' => $customer->id, 
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'USD',
                'product_data' => [
                    'name' => $name,
                ],
                'unit_amount' => $total,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $successUrl,
        'cancel_url' => route('cancel', [], absolute:true),
    ]);

    $payment = TS::create([
        'session_id' => $session->id,
        'user_id' => $userId,
        'coach_id' => $user->coach_id,
        'name' => $name,
        'email' => $donorEmail,
        'amount' => $amount,
    ]);

    return redirect()->away($session->url);
}

public function success(Request $request)
{
    $userId = $request->query('userId');
    $user = User::find($userId);
    $coach = User::find($user->coach_id);
    

    return view('success', ['user'=>$user, 'coach'=>$coach]);
}



    public function cancel(Request $request)
    {   
       return view('cancel');
    }
}
