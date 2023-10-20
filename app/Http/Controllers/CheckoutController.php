<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index() {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();



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
            $wishlists = Wishlist::where('user_id', $user->id)->get();
        
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
        return view('pages.checkout',[
            'user'              =>  $user,
            'carts'             =>  $carts,
            'boxCarts'          =>  $boxCarts,
            'wishlists'         =>  $wishlists,
            'totalPrice'        =>  $totalPrice,
            'isEmptyCart'       =>  $carts->isEmpty(), // Add this line
            'isEmptyCartBox'    =>  $boxCarts->isEmpty(), // Add this line
        ]);
    }
}
