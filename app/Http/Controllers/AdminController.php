<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\SurveyUser;
use App\Answer;

class AdminController extends Controller
{
    public function index()
    {
        $question6 = Question::all()->where('id', 6);
        $question7 = Question::all()->where('id', 7);
        $question10 = Question::all()->where('id', 10);

        foreach($question6 as $choice){
            $choice6 = $choice->options;
        }

        foreach($question7 as $choice){
            $choice7 = $choice->options;
        }

        foreach($question10 as $choice){
            $choice10 = $choice->options;
        }

        $answers = Answer::all();
        $answers6 = $answers->where('question_id', 6);
        foreach($answers6 as $answer6){
            // dump($answer6);
        }
        
        return view('back.charts', [
            'choice6' => $choice6, 
            'choice7' => $choice7, 
            'choice10' => $choice10 
        ]);
    }

    public function showQuestions()
    {
        $questions = Question::all();
        return view("back.survey", ['questions'=> $questions]);
    }

    public function showAnswers()
    {
        $surveyUsers = SurveyUser::all();
        $questions = Question::all();

        return view('back.answers', ['surveyUsers' => $surveyUsers, 'questions'=> $questions]);
    }
}
