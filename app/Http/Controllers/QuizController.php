<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index() {
        $quizz = Quiz::where('user_id',Auth::user()->id)->first();
        return view('pages.ClientQuiz',[
            'quizz'  =>  $quizz
        ]);
    }
    public function store(Request $request) {
        Quiz::create([
            'user_id'           =>  Auth::user()->id,
            'teint_peau'        =>  $request->teint_peau,
            'eyes_color'        =>  $request->eyes_color,
            'hair_color'        =>  $request->hair_color,
            'type_peau'         =>  $request->type_peau,
            'style_maquillage'  =>  $request->style_maquillage,
        ]);
        return redirect()->to('/client/quiz');
    }
}
