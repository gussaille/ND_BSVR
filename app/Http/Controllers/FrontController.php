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

        // var_dump($request->all());
        // $answers = $request->all();
        
        // $answers = Answer::create($request->all());

        // foreach($answers as $userAnswer){
        //     $answer = Answer::create([
        //         'response' => $answers['response'],
        //         'question_id' => $answers['question_id']
        //     ]);
        //     // dd($answer);
        // }

        dd($request->all());
        $answers = Answer::create($request->all());

        // return response()->json(null, 200);
    }
}
