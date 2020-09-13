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

        $emailChecked = User::select('email')->where('email', $request->email)->exists();
        if ($emailChecked === true) {
           return [true, "L'email est valide"];
        } else {
            return [false, "L'email n'est pas valide"];
        }
    }
}
