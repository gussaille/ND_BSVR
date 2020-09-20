<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use Illuminate\Http\Request;
use App\SurveyUser;
use App\Answer;
use Str;
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
        $surveyUserId = Crypt::decrypt($surveyUserCrypted); // decrypt the encrypted id generated in createSurveyUser command
        $surveyUser = SurveyUser::findOrFail($surveyUserId); // if the id decrypted match with the id in DB -> render the survey 

        //If User has already submitted his survey, the form is not already available
        $user = User::all();
        $userRegistered = $user->where('id', '=', $surveyUser->user_id);

        //if User refresh on the confirmation after submitted his survey, he will be redirect to his summary answers
        if($userRegistered && $surveyUser->url !== null){
            return redirect('recapitulatif/'.$surveyUser->url);
        }

        session()->put('surveyUser', $surveyUser);

        return view('front.home');
    }

    public function getQuestions()
    {
        return $this->getSurveyUser()->survey->questions;
    }

    public function checkEmail(Request $request)
    {   
        // return an array with the response of the matching, if user email match with the retrieved email => true, else => false
        return ['check' => $this->getSurveyUser()->user->email === $request->email];
    }

    public function storeAnswers(QuestionStoreRequest $request) 
    {
        $this->getSurveyUser()->answers()->createMany($request->answers);
    }

    public function getSurveyUserUrl()
    {
        $surveyUsers = SurveyUser::all();
        $randomString = Str::random(20);

        foreach($surveyUsers as $surveyUser){
            $surveyUserUrl = $surveyUser->url = $randomString;
        }

        $surveyUser->save();

        return $surveyUserUrl;
    }
}
