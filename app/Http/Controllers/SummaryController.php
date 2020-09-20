<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyUser;
use App\Question;

class SummaryController extends Controller
{
    public function index($surveyUserUrl)
    {
        $surveyUsers = SurveyUser::all(); 
        foreach($surveyUsers as $surveyUser){
            $surveyUser->where('url', '=', $surveyUserUrl);
        }
        $questions = Question::all();
       
        return view('front.summary', ['surveyUser' => $surveyUser, 'questions' => $questions]);
    }
}
