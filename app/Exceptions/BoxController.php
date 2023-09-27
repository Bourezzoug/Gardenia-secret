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
        $wishlists = [];
        $totalPrice = 0;
        
        if (Auth::check()) {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)
                    ->where('product_id','<>','id')
                    ->get();
            $wishlists = Wishlist::where('user_id', $user->id)->get();
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });
        }

        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);
        $cheapestBox = Box::orderBy('price')->first(); // Retrieve the cheapest box
        $expensiveBox = Box::orderByDesc('price')->first(); // Retrieve the most expensive box
        $midPricedBox = Box::whereBetween('price', [$cheapestBox->price, $expensiveBox->price])
                            ->where('id', '!=', $cheapestBox->id)
                            ->where('id', '!=', $expensiveBox->id)
                            ->first(); // Retrieve a box with a price between the cheapest and most expensive
    
        return view('pages.BoxMois', [
            'cheapestBox'   => $cheapestBox,
            'expensiveBox'  => $expensiveBox,
            'midPricedBox'  => $midPricedBox,
            'cities'        => $cities,
            'showPopup'     => $showPopup,
            'carts'         => $carts,
            'wishlists'     => $wishlists,
            'totalPrice'    => $totalPrice,
        ]);
    }
    public function store_box_to_cart(Request $request) {
        $user_id = Auth::user()->id;
        $cartBox = Cart::create([
            'user_id'   =>  $user_id,
            'quantity'  =>  1,
            'box_id'    =>  $request->box_id
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
