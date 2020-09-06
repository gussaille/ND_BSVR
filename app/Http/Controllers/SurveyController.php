<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyUser;
use App\Answer;
use App\Survey;

class SurveyController extends Controller
{
    public function getSurvey($id)
    {
        $survey = Survey::findOrFail($id);
    }
}
