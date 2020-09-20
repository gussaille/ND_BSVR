<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyUser;
use App\Question;

class SummaryController extends Controller
{
    public function index($surveyUserUrl)
    {
        $surveyUsers = SurveyUser::all()->where('url', '=', $surveyUserUrl); 

        foreach($surveyUsers as $surveyUser){
            $surveyUser->where('user_id', '=', $surveyUser->user->id);
        }
        
        $questions = Question::all();

        return view('front.summary', ['surveyUser' => $surveyUser, 'questions' => $questions]);
    }
}
