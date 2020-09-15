<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyUser;

class SummaryController extends Controller
{
    public function index()
    {
       $surveyUser = SurveyUser::all()->first(); 
       
       return view('front.summary', ['surveyUser' => $surveyUser]);
    }
}
