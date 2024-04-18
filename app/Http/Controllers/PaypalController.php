<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use Carbon\Carbon;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId('AY1C9t--zys6ljNWvXTRHudFBfKNmYPItwN15z6oOqAywAKSrEmM4qLhF-Bm-r07JYEElD6-Erz7c9ve');
        $this->gateway->setSecret('EFsIHA7LVzAk4U6BIdymIRo4sl5_ZxPyMLOEH_cogWpPK80wgD7IhJEM5S8XY8MMulZfmbj2vQboRcbG');
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request) {
        try {
            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => 'USD',
                'returnUrl' => route('payment-success'),
                'cancelUrl' => route('payment-cancel'),
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request) {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ])->send();

            if ($transaction->isSuccessful()) {
                $arr = $transaction->getData();
                Payment::insert([
                    'payment_id' => $arr['id'],
                    'payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => 'USD',
                    'payment_status' => $arr['state'],
                    'created_at' => now(),
                ]);
                \DB::table('enquiries')->where('id', session()->get('enquiry_id'))->update([
                    'status' => 'checkout_approved', 
                ]);
                session()->forget('enquiry_id');

                session()->flash('success', 'Payment is Successfull. Your Transaction ID is ' . $arr['id'].' Please STORE this ID in a Safe Place');
                return redirect()->route('user-dashboard');
            } else {
                session()->flash('error', $transaction->getMessage());
                return redirect()->route('user-dashboard');
            }
        } else {
            session()->flash('error', 'Payment Declined');
            return redirect()->route('user-dashboard');
        }
    }

    public function error() {
        session()->flash('error', 'User Declined the Payment');
        return redirect()->route('user-dashboard');
    }
}
