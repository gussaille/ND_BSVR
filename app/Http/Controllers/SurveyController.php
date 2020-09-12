<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyUser;
use App\Answer;
use App\Survey;
use App\User;

class SurveyController extends Controller
{
    public function getSurvey($id)
    {
        $survey = Survey::findOrFail($id);
    }

    public function checkEmail(Request $request){

        $user = User::all()->where('email', "=", $request->all())->first();

        dd($user);
        if ($user) {
           dd('is already existing');
        } else {
            dd('not existing');
        }
    }
}
