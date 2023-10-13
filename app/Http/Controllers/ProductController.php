<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request,$categorie,$slug,$id) {
        $product = Product::find($id);

        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }

        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);

        $relatedProducts = Product::orderBy('created_at','desc')
        ->where('id', '<>', $id)
        ->take(4)
        ->get();

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
        $gallery = explode(',',$product->gallery);
        return view('pages.product',[
            'cities'            =>  $cities,
            'product'           =>  $product,
            'relatedProducts'   =>  $relatedProducts,
            'carts'             =>  $carts,
            'boxCarts'          =>  $boxCarts,
            'wishlists'         =>  $wishlists,
            'totalPrice'        =>  $totalPrice,
            'showPopup'         =>  $showPopup,
            'gallery'           =>  $gallery,
        ]);
    }
    public function cart_store($id, Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
        $product = Product::where('id', $id)->first();
    
        // Check if the 'quantity' is within the valid range
        $quantity = $request->quantity;
        if ($quantity < 1 || $quantity > $product->quantite) {
            return response()->json(['success' => false, 'message' => 'We don\'t have this quantity in our store']);
        }
    
        // Check if the product is already in the cart for the same user
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $id)
            ->first();
    
        if ($existingCartItem) {
            // Product is already in the cart
            // Log a message to the console

            // You can also return a response indicating the product is already in the cart
            return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
        }
    
        // Product is not in the cart, proceed with adding it
        $cartItem = Cart::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'quantity' => $quantity, // Use the validated quantity
        ]);
    
        if ($cartItem) {
            $carts = Cart::where('user_id', $user->id)->get();
    
            // Calculate the total price based on product prices and quantities
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });
    
            return response()->json(['success' => true, 'carts' => $carts, 'totalPrice' => $totalPrice]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    

    public function wishlist_store($id, Request $request) {
        $user = Auth::user();
        $existingWishlistItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $id)
            ->first();
            if ($existingWishlistItem) {
                // Product is already in the cart
                // Log a message to the console
                Log::info('Product is already in the cart.');
        
                // You can also return a response indicating the product is already in the cart
                return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
            }
        $wishlistItem = Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $id,
        ]);
        if ($wishlistItem) {    
            $wishlist = Wishlist::with('product')
            ->where('user_id', $user->id)
            ->get(); 
            return response()->json(['success' => true, 'wishlists' => $wishlist]);
        } else {
            return response()->json(['success' => false]);
        }
    }


    public function wishlist_store_to_cart($id, Request $request) {
        $user = Auth::user();

        // Check if the product is already in the cart for the same user
        $existingCartItem = Cart::where('user_id', $user->id)
                                ->where('product_id', $id)
                                ->first();

        if ($existingCartItem) {
            // Product is already in the cart
            // Log a message to the console
            Log::info('Product is already in the cart.');

            // You can also return a response indicating the product is already in the cart
            return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
        }

        // Product is not in the cart, proceed with adding it
        $cartItem = Cart::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'quantity' => $request->input('quantity')
        ]);
        $wishlist_id = $request->input('wishlist_id');
        $wishlist = Wishlist::findOrFail($wishlist_id);
        $wishlist->delete();

        if ($cartItem) {
            $carts = Cart::where('user_id', $user->id)->get();

            // Calculate the total price based on product prices and quantities
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });

            return response()->json(['success' => true, 'carts' => $carts, 'totalPrice' => $totalPrice]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function delete_wishlist($id) {
        $wishlistItem = Wishlist::find($id);
    
        if ($wishlistItem) {
            $wishlistItem->delete();
    
            // Return the updated cart data
            $user = Auth::user();
            $wishlists = Wishlist::where('user_id', $user->id)->get();
            // Calculate the total price based on product prices and quantities
            $totalPrice = $wishlists->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });
    
            return response()->json([
                'success'     => true,
                'wishlists'       => $wishlists,
                'totalPrice'  => $totalPrice
            ]);
        }
    
        return response()->json(['success' => false]);
    }
    
}

