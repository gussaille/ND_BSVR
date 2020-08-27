<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\UsersAnswer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('login');

    }

    public function charts()
    {
        return view('back.index');
    }

    public function questions()
    {
        $questions = Question::all();

        return view("back.survey", ['questions'=> $questions]);
    }

    public function answers()
    {
       return view('back.answers');
    }
}
