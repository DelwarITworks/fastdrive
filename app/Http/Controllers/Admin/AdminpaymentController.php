<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Payment;
use Stripe; 

class AdminpaymentController extends Controller
{
    public function index()
    {
        // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // $refunded = $stripe->refunds->create([
        //     'charge' => 'ch_3L2w7xCUBpZGnkVc171tkRZO',
        //     'amount' => 1,
        // ]);
        // dd($refunded);


        $payments = Payment::latest()->get();
        $count =1;
        return view('admin.payments.payment_list',compact('payments','count'));
    }    
    public function theoryPayments()
    {
        // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // $refunded = $stripe->refunds->create([
        //     'charge' => 'ch_3L2w7xCUBpZGnkVc171tkRZO',
        //     'amount' => 1,
        // ]);
        // dd($refunded);


        $payments = Payment::latest()->get();
        $count =1;
        return view('admin.payments.theory_payments',compact('payments','count'));
    }
}
