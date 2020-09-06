<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionStoreRequest;
use App\Question;
use App\Answer;
use App\Survey;
use App\User;

class FrontController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view("front.home", ['questions'=> $questions]);

    }

    public function store(QuestionStoreRequest $request) 
    {
        foreach($request->answers as $answer){
            Answer::create([
                'response' => $answer['response'],
                'question_id' => $answer['question_id'],
            ]);
        }
    }
}
