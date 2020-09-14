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
        $headset = array('Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR');
        $data  = array(15, 10, 3, 43);
        
        return view('back.charts',['Headset' => $headset, 'Data' => $data]);
    }

    public function showQuestions()
    {
        $questions = Question::all();
        return view("back.survey", ['questions'=> $questions]);
    }

    public function showAnswers()
    {
        $surveyUsers = SurveyUser::all();

        foreach($surveyUsers as $surveyUser){
            foreach($surveyUser->answers as $answer){
                $userAnswer = $answer->response;
            };
        }

        $questions = Question::all();

        return view('back.answers', ['surveyUsers' => $surveyUsers, 'questions'=> $questions]);
    }
}
