<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($id) {
        $product = Product::find($id);



        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);

        $relatedProducts = Product::orderBy('created_at','desc')
        ->where('id', '<>', $id)
        ->take(4)
        ->get();

        $carts = [];
        $totalPrice = 0;
        
        if (Auth::check()) {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->get();
            $wishlists = Wishlist::where('user_id', $user->id)->get();
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->prix * $cart->quantity;
            });
        }
        $gallery = explode(',',$product->gallery);
        return view('pages.product',[
            'cities'            =>  $cities,
            'product'           =>  $product,
            'relatedProducts'   =>  $relatedProducts,
            'carts'             =>  $carts,
            'wishlists'         =>  $wishlists,
            'totalPrice'        =>  $totalPrice
        ]);
    }
    public function store($id, Request $request)
    {
        $formType = $request->input('form_type');
        if ($formType === 'form1') {
// Get the authenticated user
$user = Auth::user();

// Check if the product is already in the cart for the same user
$existingCartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $id)
                        ->first();

if ($existingCartItem) {
    // Product is already in the cart
    // Log a message to the console
    \Log::info('Product is already in the cart.');

    // You can also return a response indicating the product is already in the cart
    return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
}

// Product is not in the cart, proceed with adding it
$cartItem = Cart::create([
    'user_id' => $user->id,
    'product_id' => $id,
    'quantity' => $request->input('quantity')
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
        elseif ($formType === 'form2') {
            $user = Auth::user();
            $existingWishlistItem = Wishlist::where('user_id', $user->id)
                ->where('product_id', $id)
                ->first();
                if ($existingWishlistItem) {
                    // Product is already in the cart
                    // Log a message to the console
                    \Log::info('Product is already in the cart.');
            
                    // You can also return a response indicating the product is already in the cart
                    return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
                }
            $wishlistItem = Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $id,
            ]);
            if ($wishlistItem) {    
                $wishlist = Wishlist::where('user_id', $user->id)->get();    
                return response()->json(['success' => true, 'wishlist' => $wishlist]);
            } else {
                return response()->json(['success' => false]);
            }
        }

    }


    public function wishlist_store($id, Request $request) {
        $user = Auth::user();

        // Check if the product is already in the cart for the same user
        $existingCartItem = Cart::where('user_id', $user->id)
                                ->where('product_id', $id)
                                ->first();

        if ($existingCartItem) {
            // Product is already in the cart
            // Log a message to the console
            \Log::info('Product is already in the cart.');

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
    
}

