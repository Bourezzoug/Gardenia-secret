<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class EshopController extends Controller
{

        public function index(Request $request) {
            $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
            $cities = json_decode(file_get_contents($url), true);
            $isInWishlist = false;
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
                $productsModel = Product::all();
                foreach ($productsModel as $product) {

    // Check if the product is in the wishlist
    $productIdToCheck = $product->id;
    $isInWishlist[$productIdToCheck] = $wishlists->contains('product_id', $productIdToCheck);
                }
                
            }


            $sortName = $request->input('search');

            if($sortName) {
                $query->where('nom', 'like', '%' . $sortName . '%'); 
            }
            

            $sortType = $request->input('sort');

            switch ($sortType) {
                case 'popular':
                    $query->orderBy('popularity', 'desc');
                    break;
                case 'rating':
                    $query->orderBy('rating', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'lowToHigh':
                    $query->orderBy('prix', 'asc');
                    break;
                case 'highToLow':
                    $query->orderBy('prix', 'desc');
                    break;
            }

            // Check if prices were provided in the request
            if ($request->has('prices')) {
                $prices = explode(',', $request->get('prices'));

                // Filter products based on price range
                foreach ($prices as $priceRange) {
                    list($min, $max) = explode('-', $priceRange);
                    $query->orWhereBetween('prix', [$min, $max]);
                }
            }

            $selectedCategories = $request->input('categories', []);
            if($selectedCategories) {
                $cat = explode(",",$selectedCategories);
            }
            if (!empty($selectedCategories)) {
                foreach($cat as $cat) {
                    $query->orWhere('category_id', $cat);
                }
            }
            



    
            $products = $query->paginate(9);


            if ($request->ajax()) {
                return response()->json(['products' => $products]);
            }



            Log::info('Selected Categories:');
    
            return view('pages.testShop', [
                'products'      => $products,
                'cities'        => $cities,
                'minprice'      => $minPrice,
                'maxprice'      => $maxPrice,
                'showPopup'     => $showPopup,
                'carts'         => $carts,
                'boxCarts'      => $boxCarts,
                'wishlists'     => $wishlists,
                'totalPrice'    => $totalPrice,
                'categorie'     => Categorie::where('type','Products')->get(),
                'isInWishlist'  => $isInWishlist
            ]);
            // return view('pages.e-shop', [
            //     'products'      => $products,
            //     'cities'        => $cities,
            //     'minprice'      => $minPrice,
            //     'maxprice'      => $maxPrice,
            //     'showPopup'     => $showPopup,
            //     'carts'         => $carts,
            //     'boxCarts'      => $boxCarts,
            //     'wishlists'     => $wishlists,
            //     'totalPrice'    => $totalPrice,
            // ]);
        }
}
    
    
    

