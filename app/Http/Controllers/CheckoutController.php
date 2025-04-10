<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $dataValidator = $request->validate(
            [
                'name' => 'required|max:255',
                'phone' => 'required|max:12',
                'email' => 'required|email',
                'address' => 'required|max:255',
                "note" => 'max:255|nullable',
                // "payment_method" => 'required|in:cod,vnpay,paypal',
                // "shipping_method" => 'required|in:standard,express',
            ]
        );
        // case user da dang nhap 
        // user chua dang nhap
        if (Auth::check()) {
            $user = Auth::user();
            $dataValidator['user_id'] = $user->id;
            dd($user->id);
        } else {
            $user = null;
            dd('user null');
        }
        // if ($user) {
        //     $dataValidator['user_id'] = $user->id;

        // $dataValidator['cart'] = serialize(\Cart::content());
        // $dataValidator['total'] = \Cart::total();
        // $dataValidator['status'] = 'pending';
        // $dataValidator['shipping_status'] = 'pending';
        // $dataValidator['payment_status'] = 'pending';
        // $dataValidator['shipping_method'] = $request->shipping_method;
        // $dataValidator['payment_method'] = $request->payment_method;
        // }else {
        //     $dataValidator['cart'] = serialize(\Cart::content());
        //     $dataValidator['total'] = \Cart::total();
        //     $dataValidator['status'] = 'pending';
        //     $dataValidator['shipping_status'] = 'pending';
        //     $dataValidator['payment_status'] = 'pending';
        //     $dataValidator['shipping_method'] = $request->shipping_method;
        //     $dataValidator['payment_method'] = $request->payment_method;
        // }

    }
}