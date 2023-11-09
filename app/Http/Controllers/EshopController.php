<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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

                $request->validate([
                    'categories'    => 'array', // Ensure 'categories' is an array
                    'categories.*'  => 'numeric|exists:categories,id', // Ensure each category id exists in the 'categories' table
                    'brands'        => 'array', // Ensure 'brands' is an array
                    'brands.*'      => 'numeric|exists:brands,id', // Ensure each brand id exists in the 'brands' table
                    'minPrice'      =>  'numeric',
                    'maxPrice'      =>  'numeric',
                    'search'        =>  'string',
                    'sort'          => 'string|in:popular,rating,newest,lowToHigh,highToLow',
                    'prices'        => 'numeric',
                ]);





            $url = 'https://raw.githubusercontent.com/linssen/country-flag-icons/master/countries.json';
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
            

            $selectedBrands = $request->input('brands', []);
            if (!empty($selectedBrands)) {
                $brands = explode(",", $selectedBrands);
            
                foreach ($brands as $brand) {
                    $query->orWhere('brand_id', $brand);
                }
            }
            


    
            // Get the paginated products
            $products = $query->paginate(9);

            // Iterate over the products and load brand information for each
            foreach ($products as $product) {
                $product->load('brand');
            }
            foreach ($products as $product) {
                $product->load('category');
            }

            if ($request->ajax()) {
                return response()->json(['products' => $products]);
            }


    
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
                'isInWishlist'  => $isInWishlist,
                'brands'        => Brand::all()
            ]);

        }
}


