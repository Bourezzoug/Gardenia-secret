<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
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
                return $boxCart->box->price ; // Assuming you have a 'price' property in the 'box' model
            });
        
            // Calculate the combined total price
            $totalPrice = $cartsTotalPrice + $boxCartsTotalPrice;
        }
        return $totalPrice;
    }

    public function payment(Request $request) {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $totalPrice = 0;
        if (Auth::check()) {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)
                ->where('product_id', '<>', 'id')
                ->get();
            $boxCarts = Cart::where('user_id', $user->id)
                ->where('box_id', '<>', 'id')
                ->get();
    
            $line_items = [];
    
            // Add products to line items
            foreach ($carts as $cart) {
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $cart->product->nom, // Use the actual product name
                        ],
                        'unit_amount' => $cart->product->prix * 100, // Use the product price
                    ],
                    'quantity' => $cart->quantity, // Use the product quantity
                ];
                $totalPrice += $cart->product->prix * 100;
            }
    
            // Add boxes to line items
            foreach ($boxCarts as $boxCart) {
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $boxCart->box->libelle, // Use a generic name for the box
                        ],
                        'unit_amount' => $boxCart->box->price * 100, // Use the box price
                    ],
                    'quantity' => 1, // You mentioned each user has one box
                ];
                $totalPrice += $boxCart->box->price * 100;
            }
    
            // Create the Stripe Checkout session with all line items
            $response = \Stripe\Checkout\Session::create([
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('stripe_success') . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('stripe_cancel'),
            ]);

            $order = Order::where('user_id',Auth::user()->id)->first();
            if ($order) {
            
                $order->session_id = $response->id;
                $order->total_price = $totalPrice / 100;
                $order->save();
            }
    
            return redirect()->away($response->url);
        }
    }
    // // ...
    // public function handleWebhook(Request $request)
    // {
    //     \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

    //     $payload = $request->getContent();
    //     $sigHeader = $request->header('Stripe-Signature');
    //     $event = null;

    //     try {
    //         $event = \Stripe\Webhook::constructEvent(
    //             $payload, $sigHeader, config('stripe.webhook_secret')
    //         );
    //     } catch (\UnexpectedValueException $e) {
    //         return response()->json(['error' => 'Invalid payload'], 400);
    //     } catch (\Stripe\Exception\SignatureVerificationException $e) {
    //         return response()->json(['error' => 'Invalid signature'], 400);
    //     }

    //     \Log::info('Webhook received: ' . $event->type); // Log the event type

    //     switch ($event->type) {
    //         case 'checkout.session.completed':
    //             $session = $event->data->object; // contains a StripeSession
    //             $this->handleCheckoutSessionCompleted($session);
    //             break;
    //         // Add more event types as needed
    //         default:
    //             return response()->json(['error' => 'Unexpected event type'], 400);
    //     }

    //     return response()->json(['message' => 'success']);
    // }
    // // ...


    // // Add this method to handle successful checkout sessions
    // private function handleCheckoutSessionCompleted($session)
    // {
    //     // Retrieve order information from session and update order status if needed
    //     // For example:
    //     // $order = Order::where('session_id', $session->id)->first();
    //     // if ($order) {
    //     //     $order->status = 'paid';
    //     //     $order->save();
    //     // }
    // }

    public function success(Request $request) {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        // $sessionId = $request->get('session_id');
        // $session = \Stripe\Checkout\Session::retrieve($sessionId);

        // if(!$session) {
        //     throw new  NotFoundHttpException;
        // }
        // $customer = \Stripe\Customer::retrieve($session->customer);
        // return back()->with(['success' => 'The payment has been successful', 'customer' => $customer]);
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }
            // $customer = \Stripe\Customer::retrieve($session->customer);

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }
            return back()->with(['success' => 'The payment has been successful']);

        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }
    

    public function cancel() {
        return back()->with('cancel','The payment has been canceled');
    }
}
