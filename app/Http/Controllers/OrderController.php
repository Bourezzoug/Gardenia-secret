<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function confirm_order(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'             => 'required|email|max:255',
            'first_name'        => 'required|min:3|string',
            'family_name'       => 'required|min:3|string',
            'address'           => 'required|min:10|string',
            'phone_number'      => 'required|min:3',
            'city'              => 'required|min:3|string',
            'country'           => 'required|min:3|string',
            'state_province'    => 'required|min:3|string',
            'postal_code'       => 'required|min:3',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        $order = Order::create([
            'email' =>  $request->email,
            'user_id' =>  Auth::user()->id,
            'first_name' =>  $request->first_name,
            'family_name' =>  $request->family_name,
            'address' =>  $request->address,
            'phone_number' =>  $request->phone_number,
            'city' =>  $request->city,
            'country' =>  $request->country,
            'state_province' =>  $request->state_province,
            'postal_code' =>  $request->postal_code,
            'status' =>  'unpaid',
        ]);

        $totalPrice = 0;
        
        // if (Auth::check()) {
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
        // }

// Fetch user's cart items
$cartItems = Cart::where('user_id', Auth::user()->id)->get();

// Prepare an array to store in the 'cart' column
$cartData = [];
foreach ($cartItems as $cartItem) {
    $box_id = $cartItem->box_id;  // Get the box_id value
    $product_id = $cartItem->product_id;  // Get the product_id value
    if($product_id !== null) {
        $cartData[] = [
            'product_id'    => $cartItem->product_id,
            'box_id'        => null,
            'box_option'    => null,
            'quantity'      => $cartItem->quantity,
        ];
    }
    elseif($box_id !== null) {
        $cartData[] = [
            'box_id'        => $cartItem->box_id,
            'product_id'    => null,
            'box_option'    => $cartItem->box_option,
            'quantity'      => $cartItem->quantity,
        ];
    }


}


        // Update the order with the cart data
        $order->cartInfo = $cartData;
        $order->total_price = $totalPrice;
        $order->save();

    
        return response()->json(['success' => true]);
    }
    
}
