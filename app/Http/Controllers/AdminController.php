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
            $psvr = count($answers6->where('response', '=', 'PSVR'));
            $mix = count($answers6->where('response', '=', 'Windows Mixed Reality'));
            $vive = count($answers6->where('response', '=', 'HTC Vive'));
            $rift = count($answers6->where('response', '=', 'Occulus Rift/s'));
        }
     
        return view('back.charts', compact(
            'choice6', 'choice7', 'choice10', 'rift', 'mix', 'vive', 'psvr' 
        ));
    }

    public function showQuestions()
    {
        $questions = Question::all();
        return view("back.survey", ['questions'=> $questions]); // return all the questions of the survey in the view back.survey
    }

    public function showAnswers()
    {
        $surveyUsers = SurveyUser::where('id', '!=', 0)->paginate(2);
        $questions = Question::all();

        return view('back.answers', ['surveyUsers' => $surveyUsers, 'questions' => $questions]); // return all the questions and surveyUsers in the view back.answers
    }
}
