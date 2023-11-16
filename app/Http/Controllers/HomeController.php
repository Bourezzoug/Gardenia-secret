<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Box;
use App\Models\Cart;
use App\Models\HomeSlider;
use App\Models\Inscrit;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request)
    {

        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $carts = Cart::where('user_id', $user->id)
        //             ->where('product_id','<>',null)
        //             ->get();
        //     $wishlists = Wishlist::where('user_id', $user->id)->get();
        //     $totalPrice = $carts->sum(function ($cart) {
        //         return $cart->product->prix * $cart->quantity;
        //     });
        // }

        $showPopup = true;
        
        // Check if the user's IP address has seen the popup before
        // $ipAddress = $request->ip();
        // if (!$request->session()->has("popup_$ipAddress")) {
        //     $showPopup = true;
        //     $request->session()->put("popup_$ipAddress", true);
        // }
        $url = 'https://raw.githubusercontent.com/linssen/country-flag-icons/master/countries.json';
        $countries = json_decode(file_get_contents($url), true);

        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);

        $posts = Blog::orderBy('created_at', 'desc')->where('status', 'publié')->take(4)->get();
        $carts = [];
        $wishlists = [];
        $totalPrice = 0;
    
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

        // $cheapestBox = Box::orderBy('price')->first(); // Retrieve the cheapest box
        // $expensiveBox = Box::orderByDesc('price')->first(); // Retrieve the most expensive box
        
        // if ($cheapestBox && $expensiveBox) {
        //     $midPricedBox = Box::whereBetween('price', [$cheapestBox->price, $expensiveBox->price])
        //                         ->where('id', '!=', $cheapestBox->id)
        //                         ->where('id', '!=', $expensiveBox->id)
        //                         ->first();
        // } else {
        //     $midPricedBox = null; // Set $midPricedBox to null if either $cheapestBox or $expensiveBox is null
        // }
        $boxMonth = Box::latest()->first();
        $boxMonths = Box::orderBy('created_at','DESC')->take(3)->get();
        
        // Bannieres

            $homeSlider = HomeSlider::orderBy('created_at','desc')->take(2)->get();
    
        return view('pages.homepage', [
            'posts'         =>  $posts,
            'cities'        =>  $cities,
            'countries'     =>  $countries,
            'products'      =>  Product::where('quantite','>',0)->paginate(5),
            'carts'         =>  $carts,
            'boxCarts'      =>  $boxCarts,
            'totalPrice'    =>  $totalPrice,
            'showPopup'     =>  $showPopup,
            'wishlists'     =>  $wishlists,
            'boxMonth'      =>  $boxMonth,
            'boxMonths'     =>  $boxMonths,
            'homeSlider'    =>  $homeSlider    
        ]);
        
    }
    
    
    public function store(Request $request) {
        try {
            $request->validate([
                'email'         => ['required', 'string', 'email', 'max:255', Rule::unique(Inscrit::class)],
                'nom_complet'   => ['nullable', 'string'],
                'ville'         => ['nullable', 'string'],
                'country'       => ['nullable', 'string'],
            ]);
    
            Inscrit::create([
                'nom_complet'   =>  $request->nom_complet,
                'email'         => strtolower($request->email),
                'ville'         =>  $request->ville,
                'country'       =>  $request->pays
            ]);
            return response()->json(['message' => 'Success!'], 200);
        
        } catch (\Exception $e) {
    
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
