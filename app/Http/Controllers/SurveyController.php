<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use Illuminate\Http\Request;
use App\SurveyUser;
use App\Answer;
use Crypt;
use App\Survey;
use App\User;


class SurveyController extends Controller
{
    protected function getSurveyUser(): SurveyUser
    {
        $surveyUser = session()->get('surveyUser');
        if(!$surveyUser || !($surveyUser instanceof SurveyUser)){
            abort(404);
        }
        return $surveyUser;
    }

    public function index($surveyUserCrypted)
    {
        $surveyUserId = Crypt::decrypt($surveyUserCrypted);
        $surveyUser = SurveyUser::findOrFail($surveyUserId);
        session()->put('surveyUser', $surveyUser);

        return view('front.home');
    }

    public function getQuestions()
    {
        return $this->getSurveyUser()->survey->questions;
    }

    public function checkEmail(Request $request)
    {   
        return ['check' => $this->getSurveyUser()->user->email === $request->email];
    }

    public function storeAnswers(QuestionStoreRequest $request) 
    {
        $this->getSurveyUser()->answers()->createMany($request->answers);
    }
}
