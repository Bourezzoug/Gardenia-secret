<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function delete($id)
    {
        
        $cartItem = Cart::find($id);
    
        if ($cartItem) {
            $cartItem->delete();
    
            // Return the updated cart data
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->get();
            // Calculate the total price based on product prices and quantities
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });
    
            return response()->json([
                'success'     => true,
                'carts'       => $carts,
                'totalPrice'  => $totalPrice
            ]);
        }
    
        return response()->json(['success' => false]);
    }
    
    
    
}