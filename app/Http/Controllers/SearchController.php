<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        setlocale(LC_TIME, 'fr_FR');
        $url = 'https://raw.githubusercontent.com/linssen/country-flag-icons/master/countries.json';
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

        $query = $request->input('query');
        if ($query) {
            session(['search_query' => $query]); 
            $results = Blog::where('title', 'LIKE', "%$query%")->paginate(10);
        } else {
            $query = session('search_query');
            $results = Blog::where('title', 'LIKE', "%$query%")->paginate(10);
        }

        return view('pages.searchBlog',[
            'categories'        =>  Categorie::where('type','blog')->where('parent_id',null)->get(),
            'cities'            =>  $cities,
            'posts'             =>  $results,
            'mostViewedArticle' =>  $mostViewedArticle,
            'showPopup'         =>  $showPopup,
        ]);
    }
}
