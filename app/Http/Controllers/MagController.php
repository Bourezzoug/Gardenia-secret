<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\UniqueView;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagController extends Controller
{
    public function index(Request $request) {
        setlocale(LC_TIME, 'fr_FR');
        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);
    
        $query = Blog::orderBy('created_at', 'desc');

        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }
        
        // Check if a category filter is applied
        if ($request->has('categorie')) {
            $category = $request->input('categorie');
            $query->where('categorie', $category);
        }
    
        $posts = $query->take(4)->paginate(8);
    
        $mostViewdArticle = Blog::orderBy('total_viewers_count','desc')
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
    
        return view('pages.mag',[
            'cities'            =>  $cities,
            'posts'             =>  $posts,
            'mostViewdArticle'  =>  $mostViewdArticle,
            'showPopup'         =>  $showPopup,
            'carts'             =>  $carts,
            'boxCarts'          =>  $boxCarts,
            'wishlists'         =>  $wishlists,
            'totalPrice'        =>  $totalPrice,
        ]);
    }
    
    public function show(Request $request) {
        setlocale(LC_TIME, 'fr_FR');
        $post = Blog::where('slug', $request->slug)
        ->where('status','publié')
        ->firstOrFail();

        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }

        // Get the current user's IP address
        $ipAddress = request()->ip();

        // Check if a unique view exists for this blog post and IP address
        $uniqueView = UniqueView::where('blog_id', $post->id)->where('ip_address', $ipAddress)->first();

        if (!$uniqueView) {
            // If a unique view doesn't exist, create a new one
            $uniqueView = new UniqueView();
            $uniqueView->blog_id = $post->id;
            $uniqueView->ip_address = $ipAddress;
            $uniqueView->save();

            // Increment the unique viewers count in the blogs table
            $post->unique_viewers_count++;
        }
        $post->total_viewers_count++;
        $post->save();

        $recentArticle = Blog::where('status','publié')
            ->where('id', '<>', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();



        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);
        return view('pages.post',[
            'post'          =>  $post,
            'cities'        =>  $cities,
            'recentArticle' =>  $recentArticle,
            'showPopup'     =>  $showPopup,
        ]);
    }
    public function categorie(Request $request, $category)
    {
        setlocale(LC_TIME, 'fr_FR');
        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);

        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }
        
        $query = Blog::orderBy('created_at', 'desc')
            ->where('categorie', $category); // Filter by the selected category
        
        $posts = $query->take(4)->paginate(8);
        
        $mostViewedArticle = Blog::orderBy('total_viewers_count', 'desc')
            ->take(4)
            ->get();
        
        return view('pages.mag', [
            'cities' => $cities,
            'posts' => $posts,
            'mostViewedArticle' => $mostViewedArticle,
            'showPopup'     =>  $showPopup,
        ]);
    }
}
