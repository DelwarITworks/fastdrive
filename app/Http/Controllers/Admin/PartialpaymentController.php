<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Payment;
use App\Models\Admin\Partialpayment;
use Mail;

class PartialpaymentController extends Controller
{

    public function paymentRefund(Payment $payment,Request $request)
    { 

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $refunded = $stripe->refunds->create([
            'charge' => $payment->charge_id,
            'amount' => $request->amount * 100,
        ]);
        $partial = Partialpayment::create([
            'payment_id' => $payment->id,
            'amount'=> $request->amount,
        ]);
        if($refunded){

            if($partial){
                $data = ['name'=>$payment->practical->name,'amount'=>$request->amount];
                $user['to'] = $payment->practical->email;

                Mail::send('email.partialmail', $data, function($message) use ($user) {
                    $message->to($user['to'] );
                    $message->subject('FDT Partial Payment');
                });
                return redirect()->back()->with('success','Refund full complete is successfull');
            }else{
                return redirect()->back()->with('wrong','Something went wrong.');
            }
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    public function theorypaymentRefund(Payment $payment,Request $request)
    { 

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $refunded = $stripe->refunds->create([
            'charge' => $payment->charge_id,
            'amount' => $request->amount * 100,
        ]);
        $partial = Partialpayment::create([
            'payment_id' => $payment->id,
            'amount'=> $request->amount,
        ]);
        if($refunded){

            if($partial){
                $data = ['name'=>$payment->theory->name,'amount'=>$request->amount];
                $user['to'] = $payment->theory->email;

                Mail::send('email.partialmail', $data, function($message) use ($user) {
                    $message->to($user['to'] );
                    $message->subject('FDT Partial Payment');
                });
                return redirect()->back()->with('success','Refund full complete is successfull');
            }else{
                return redirect()->back()->with('wrong','Something went wrong.');
            }
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }


    public function paymentPartial(Payment $payment,Request $request)
    {
        $lastpayment = $payment->amount - $payment->partialpayment->sum('amount');
        if($lastpayment >= $request->amount){

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $refunded = $stripe->refunds->create([
                'charge' => $payment->charge_id,
                'amount' => $request->amount * 100,
            ]);

            $partial = Partialpayment::create([
                'payment_id' => $payment->id,
                'amount'=> $request->amount,
            ]);
         

            if($refunded){

                if($partial){

                    $data = ['name'=>$payment->practical->name,'amount'=>$request->amount];
                    $user['to'] = $payment->practical->email;

                    Mail::send('email.partialmail', $data, function($message) use ($user) {
                        $message->to($user['to'] );
                        $message->subject('FDT Partial Payment');
                    });
                    return redirect()->back()->with('success','Partial Refund '.$request->amount.' is successfull');

                }else{
                    return redirect()->back()->with('wrong','Something went wrong.');
                }
            }else{
                return redirect()->back()->with('wrong','Something went wrong.');
            }
        }else{

            return redirect()->back()->with('wrong','Amount too much');
        }
    }

    public function theorypaymentPartial(Payment $payment,Request $request)
    {
        $lastpayment = $payment->amount - $payment->partialpayment->sum('amount');
        if($lastpayment >= $request->amount){

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $refunded = $stripe->refunds->create([
                'charge' => $payment->charge_id,
                'amount' => $request->amount * 100,
            ]);

            $partial = Partialpayment::create([
                'payment_id' => $payment->id,
                'amount'=> $request->amount,
            ]);
         

            if($refunded){

                if($partial){

                    $data = ['name'=>$payment->theory->name,'amount'=>$request->amount];
                    $user['to'] = $payment->theory->email;

                    Mail::send('email.partialmail', $data, function($message) use ($user) {
                        $message->to($user['to'] );
                        $message->subject('FDT Partial Payment');
                    });
                    return redirect()->back()->with('success','Partial Refund '.$request->amount.' is successfull');

                }else{
                    return redirect()->back()->with('wrong','Something went wrong.');
                }
            }else{
                return redirect()->back()->with('wrong','Something went wrong.');
            }
        }else{

            return redirect()->back()->with('wrong','Amount too much');
        }
    }

    public function partialList(Payment $payment)
    {
        $count = 1;
        return view('admin.payments.person.partial_list',compact('payment','count'));
    }
}
