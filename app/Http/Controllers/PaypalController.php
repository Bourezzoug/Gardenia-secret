<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function total_price() {
        $carts = [];
        $boxCarts = [];
        $wishlists = [];
        $totalPrice = 0;
        
        if (Auth::check()) {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)
                ->where('product_id', '<>', 'id')
                ->get();
            $boxCarts = Cart::where('user_id', $user->id)
                ->where('box_id', '<>', 'id')
                ->get();
            // $wishlists = Wishlist::where('user_id', $user->id)->get();
        
            // Calculate the total price for both $carts and $boxCarts
            $cartsTotalPrice = $carts->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });
        
            $boxCartsTotalPrice = $boxCarts->sum(function ($boxCart) {
                if($boxCart->box_option == 'mid') {
                    return $boxCart->box->med_price;
                }
                elseif($boxCart->box_option == 'cheap') {
                    return $boxCart->box->cheap_price;
                }
                elseif($boxCart->box_option == 'expensive') {
                    return $boxCart->box->exp_price;
                }
            });
        
            // Calculate the combined total price
            $totalPrice = $cartsTotalPrice + $boxCartsTotalPrice;
        }
        return $totalPrice;
    }
    public function payment(Request $request) {



        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context"   =>  [
                "return_url"    =>  route('paypal_success'),
                "cancel_url"    =>  route('paypal_cancel')
            ],
            "purchase_units"   =>  [
                [
                    "amount"    =>  [
                        "currency_code" =>  "USD",
                        "value" =>  $this->total_price()
                    ]
                ]
            ]
        ]);
        if(isset($response['id']) && $response['id'] != null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
        else{
            return redirect()->route('paypal_cancel');
        }
    }
    public function success(Request $request) {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
    
        if(isset($response['status']) && $response['status'] === 'COMPLETED') {
            $order = Order::where('user_id', Auth::user()->id)->latest('created_at')->first();
    
            if ($order) {
                $order->session_id = $response['id']; // Note the change here
                $order->status = 'paid';
                $order->save();
            }
            Cart::where('user_id', Auth::user()->id)->delete();
            return redirect('client/orders')->with('success','The payment has been successful');
        } else {
            $order = Order::where('user_id', Auth::user()->id)->latest('created_at')->first();

            if ($order) {
                $order->delete();
            }
            return redirect()->route('paypal_cancel');
        }
    }
    
    public function cancel() {
        return back()->with('cancel','The payment has been canceled');
    }
}
