<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
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

        return view('pages.contact',[
            'categories'        =>  $categories,
            'sous_categories'   =>  $sous_categories
        ]);
    }
    public function contact(Request $request) {
        Mail::to('lamyae@wib.co')->send(new ContactMail($request->email,$request->firstName,$request->lastName,$request->options,$request->emailMessage,$request->city,$request->country));
        return response()->json(['message' => 'Email sent successfully'], 200);
    }
}
