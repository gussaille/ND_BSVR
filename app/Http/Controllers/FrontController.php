<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\UsersAnswer;

class FrontController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view("front.home", ['questions'=> $questions]);
    }

    public function store(Request $request) 
    {
        
        $request->validate([
            'response' => 'string',
        ]);

        $answers = UsersAnswer::create($request->all());

        // return response()->json(null, 200);
    }
}
