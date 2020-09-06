<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\UsersAnswer;

class AdminController extends Controller
{
    public function index()
    {
        $headset = array('Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR');
        $data  = array(15, 10, 3, 43);
        
        return view('back.charts',['Headset' => $headset, 'Data' => $data]);
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
