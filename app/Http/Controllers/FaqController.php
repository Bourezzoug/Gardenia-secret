<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request) {
        $showPopup = false;
        
        // Check if the user's IP address has seen the popup before
        $ipAddress = $request->ip();
        if (!$request->session()->has("popup_$ipAddress")) {
            $showPopup = true;
            $request->session()->put("popup_$ipAddress", true);
        }



        $categories = Categorie::where('parent_id', null)
        ->where('type', 'Blog')
        ->get();
    
        $sous_categories = [];
        
        foreach ($categories as $category) {
            $categoryId = $category->id;
        
            $hasSubcategories = Categorie::where('parent_id', $categoryId)
                ->where('type', 'Blog')
                ->exists();
        
            if ($hasSubcategories) {
                $sous_categories[$categoryId] = Categorie::where('parent_id', $categoryId)
                    ->where('type', 'Blog')
                    ->get();
            }
        }

    
        return view('pages.faq',[
            'categories'        =>  $categories,
            'sous_categories'   =>  $sous_categories,
            'showPopup'         =>  $showPopup,
            'faq'               =>  Faq::all(),
        ]);
    }
}
