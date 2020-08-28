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

    public function questions()
    {
        $questions = Question::all();

        return view("back.survey", ['questions'=> $questions]);
    }

    public function answers()
    {
       return view('back.answers');
    }

    public function charts(){
        $headset = array('Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR');
        $data  = array(15, 10, 3, 43);
        return view('back.index',['Headset' => $headset, 'Data' => $data]);
    }
      
}
