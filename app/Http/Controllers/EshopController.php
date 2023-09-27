<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EshopController extends Controller
{

        public function index(Request $request) {
            $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
            $cities = json_decode(file_get_contents($url), true);

            $showPopup = false;
        
            // Check if the user's IP address has seen the popup before
            $ipAddress = $request->ip();
            if (!$request->session()->has("popup_$ipAddress")) {
                $showPopup = true;
                $request->session()->put("popup_$ipAddress", true);
            }
    
            $query = Product::query();
    
            $minPrice = $request->input('minPrice');
            $maxPrice = $request->input('maxPrice');
    
            if ($minPrice !== null) {
                $query->where('prix', '>=', $minPrice);
            }
    
            if ($maxPrice !== null) {
                $query->where('prix', '<=', $maxPrice);
            }
    
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('nom', 'like', '%' . $search . '%');
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
    
            $products = $query->paginate(9);
    
            return view('pages.e-shop', [
                'products'      => $products,
                'cities'        => $cities,
                'minprice'      => $minPrice,
                'maxprice'      => $maxPrice,
                'showPopup'     => $showPopup,
                'carts'         => $carts,
                'boxCarts'      => $boxCarts,
                'wishlists'     => $wishlists,
                'totalPrice'    => $totalPrice,
            ]);
        }
}
    
    
    

