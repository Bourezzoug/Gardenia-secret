<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\UniqueView;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MagController extends Controller
{
    public function index(Request $request) {
        setlocale(LC_TIME, 'fr_FR');
        $url = 'https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json';
        $cities = json_decode(file_get_contents($url), true);
    
        // $query = Blog::orderBy('created_at', 'desc');

        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }
        
        // Check if a category filter is applied
        // if ($request->has('categorie')) {
        //     $category = $request->input('categorie');
        //     $query->where('categorie', $category);
        // }
    

    
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
            $categories = Categorie::where('type','Blog')->get();
            $first_article = Blog::latest()->first();
            $articles = Blog::where('id', '!=', $first_article->id)->take(3)->get();
            $posts = Blog::with('categorie')
            ->orderBy('created_at', 'desc')
            ->where('id', '<>', $first_article->id)
            ->where(function($query) use ($articles) {
                foreach ($articles as $article) {
                    $query->where('id', '<>', $article->id);
                }
            })
            ->paginate(8);
        
            $bannerTop = DB::table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('bannieres.position', 'zone-1')
            ->where('bannieres.plannification', 'LIKE', '%' . date('Y-m-d') . '%')
            ->where('campagnes.status', '1')
            ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
            ->first();


            $bannerSmallRight = DB::table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('bannieres.position', 'zone-3')
            ->where('bannieres.plannification', 'LIKE', '%' . date('Y-m-d') . '%')
            ->where('campagnes.status', '1')
            ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
            ->first();

            $bannerBigRight = DB::table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('bannieres.position', 'zone-4')
            ->where('bannieres.plannification', 'LIKE', '%' . date('Y-m-d') . '%')
            ->where('campagnes.status', '1')
            ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
            ->first();

        return view('pages.mag',[
            'cities'            =>  $cities,
            'posts'             =>  $posts,
            'mostViewdArticle'  =>  $mostViewdArticle,
            'showPopup'         =>  $showPopup,
            'carts'             =>  $carts,
            'boxCarts'          =>  $boxCarts,
            'wishlists'         =>  $wishlists,
            'totalPrice'        =>  $totalPrice,
            'categories'        =>  $categories,
            'first_article'     =>  $first_article,
            'articles'          =>  $articles,
            'bannerTop'         =>  $bannerTop,
            'bannerSmallRight'  =>  $bannerSmallRight,
            'bannerBigRight'    =>  $bannerBigRight,
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

        $categories = Categorie::where('type','blog')->get();

        // Find the next post
        $nextPost = Blog::where('status', 'publié')
            ->where('created_at', '>', $post->created_at)
            ->orderBy('created_at', 'asc')
            ->first();

        // Find the previous post
        $previousPost = Blog::where('status', 'publié')
            ->where('created_at', '<', $post->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
        $relatedArticles = Blog::where('id', '<>',$post->id)
                            ->orderBy('created_at','DESC')
                            ->take(4)
                            ->get();
        
                            $famousArticle = Blog::where('status', 'publié')
                            ->where('id','<>',$post->id)
                            ->orderBy('total_viewers_count', 'desc')
                            ->first();
                        


        return view('pages.post',[
            'post'              =>  $post,
            'cities'            =>  $cities,
            'recentArticle'     =>  $recentArticle,
            'showPopup'         =>  $showPopup,
            'categories'        =>  $categories,
            'prevPost'          =>  $previousPost,
            'nextPost'          =>  $nextPost,
            'relatedArticles'   =>  $relatedArticles,
            'famousArticle'     =>  $famousArticle,
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
        
        
        $mostViewedArticle = Blog::orderBy('total_viewers_count', 'desc')
            ->take(4)
            ->get();

        $category = Categorie::where('name', $category)->firstOrFail();
        
        $posts = $category->post()->where('status', 'publié')->paginate(8);

        
        
        return view('pages.BlogCategorie', [
            'cities'            =>  $cities,
            'posts'             =>  $posts,
            'mostViewedArticle' =>  $mostViewedArticle,
            'showPopup'         =>  $showPopup,
            'category'          =>  $category,
            'categories'        =>  Categorie::where('type','blog')->get()
        ]);
    }
}
