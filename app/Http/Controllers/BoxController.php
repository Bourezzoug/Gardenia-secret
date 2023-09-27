<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function index(Request $request) {
        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }

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
                return $boxCart->box->price ; // Assuming you have a 'price' property in the 'box' model
            });
        
            // Calculate the combined total price
            $totalPrice = $cartsTotalPrice + $boxCartsTotalPrice;
        }
        

        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);
        // $cheapestBox = Box::orderBy('price')->first(); // Retrieve the cheapest box
        // $expensiveBox = Box::orderByDesc('price')->first(); // Retrieve the most expensive box
        
        $boxMonth = Box::latest()->first();
        return view('pages.BoxMois', [
            'boxMonth'      =>  $boxMonth,
            'cities'        =>  $cities,
            'showPopup'     =>  $showPopup,
            'carts'         =>  $carts,
            'boxCarts'      =>  $boxCarts,
            'wishlists'     =>  $wishlists,
            'totalPrice'    =>  $totalPrice,
        ]);
    }
    public function store_box_to_cart($id,Request $request) {
        $user_id = Auth::user()->id;

        $existingCartItem = Cart::where('user_id', $user_id)
        ->where('box_id', $id)
        ->first();

        if ($existingCartItem) {
            // Product is already in the cart
            // Log a message to the console

            // You can also return a response indicating the product is already in the cart
            return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
        }

        $cartBox = Cart::create([
            'user_id'   =>  $user_id,
            'quantity'  =>  1,
            'box_id'    =>  $id
        ]);

        if ($cartBox) {
            $cartsBox = Cart::where('user_id', $user_id)
                        ->where('box_id','<>',null)
                        ->get();


            return response()->json(['success' => true, 'cartBox' => $cartBox]);
        } else {
            return response()->json(['success' => false]);
        }

    }
}
