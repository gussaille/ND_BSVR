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
        $answers = Answer::all();

        if(count($answers) !== 0){

            $question6 = Question::all()->where('id', 6);
            $question7 = Question::all()->where('id', 7);
            $question10 = Question::all()->where('id', 10);

            foreach($question6 as $choice){
                $choice6 = $choice->options;
            }

            foreach($question7 as $choice){
                $choice7 = $choice->options;
            }

            foreach($question10 as $choice){
                $choice10 = $choice->options;
            }

            $answers6 = $answers->where('question_id', 6);

            foreach($answers6 as $answer6){
                $psvr = count($answers6->where('response', '=', 'PSVR'));
                $mix = count($answers6->where('response', '=', 'Windows Mixed Reality'));
                $vive = count($answers6->where('response', '=', 'HTC Vive'));
                $rift = count($answers6->where('response', '=', 'Occulus Rift/s'));
            }

            $answers7 = $answers->where('question_id', 7);

            foreach($answers7 as $answer7){
                $steam = count($answers7->where('response', '=', 'SteamVR'));
                $occulus = count($answers7->where('response', '=', 'Occulus store'));
                $viveport = count($answers7->where('response', '=', 'Viveport'));
                $play = count($answers7->where('response', '=', 'Playstation VR'));
                $google = count($answers7->where('response', '=', 'GooglePlay'));
                $windows = count($answers7->where('response', '=', 'Windows store'));
            }

            $answers10 = $answers->where('question_id', 10);

            foreach($answers10 as $answer10){
                $direct = count($answers10->where('response', '=', 'regarder des émissions TV en direct'));
                $film = count($answers10->where('response', '=', 'regarder des films'));
                $solo = count($answers10->where('response', '=', 'jouer en solo'));
                $team = count($answers10->where('response', '=', 'jouer en team'));
            }

            $ratingAnswers = $answers->whereBetween('question_id', [11, 15]);

            foreach($ratingAnswers as $ratingAnswer){
                $images = $ratingAnswers->where('question_id', '=', 11);
                $confort = $ratingAnswers->where('question_id', '=', 12);
                $network = $ratingAnswers->where('question_id', '=', 13);
                $graphisme = $ratingAnswers->where('question_id', '=', 14);
                $audio = $ratingAnswers->where('question_id', '=', 15);
            } 

            $ratingImage = $images->sum('response') / $images->count();
            $ratingConfort = $confort->sum('response') / $confort->count();
            $ratingNetwork = $network->sum('response') / $network->count();
            $ratingGraphisme = $graphisme->sum('response') / $graphisme->count();
            $ratingAudio = $audio->sum('response') / $audio->count();
        
            return view('back.charts', compact(
                'choice6', 'choice7', 'choice10', 
                'rift', 'mix', 'vive', 'psvr', 
                'steam', 'occulus', 'viveport', 'play', 'google', 'windows',
                'direct', 'film', 'solo', 'team',
                'ratingImage', 'ratingConfort', 'ratingNetwork', 'ratingGraphisme', 'ratingAudio'
            ));
        }
        return view('back.charts');
    }

    public function showQuestions()
    {
        $questions = Question::all();

        return view("back.survey", ['questions'=> $questions]); // return all the questions of the survey in the view back.survey
    }

    public function showAnswers()
    {
        $surveyUsers = SurveyUser::where('id', '!=', 0)->orderBy('updated_at', 'desc')->paginate(2);
        $questions = Question::all();

        return view('back.answers', ['surveyUsers' => $surveyUsers, 'questions' => $questions]); // return all the questions and surveyUsers in the view back.answers
    }
}
