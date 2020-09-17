<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyUser;
use App\Question;

class SummaryController extends Controller
{
    public function index()
    {
       $surveyUser = SurveyUser::all()->first(); 
       $questions = Question::all();
       
       return view('front.summary', ['surveyUser' => $surveyUser, 'questions'=> $questions]);
    }
}
