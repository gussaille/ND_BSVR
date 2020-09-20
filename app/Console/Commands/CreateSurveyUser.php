<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

use Crypt;
use App\User;
use App\SurveyUser;
use App\Survey;

class CreateSurveyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'survey-user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a survey user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Creating an header array with two labels
        $headers = ['Id', 'Email'];
        // Creating an array with all users in DB according to their id and email
        $users = User::all(['id', 'email'])->toArray();
        //add to table
        $this->table($headers, $users);
        //Generate a question to ask which user id you want to choose
        $userId = $this->ask('Quel id utilisateur ?');

        // Creating an header array with two labels
        $headers = ['Id', 'Name'];
        // Creating an array with all survey (there is only one survey here) in DB according to their id and name
        $surveys = Survey::all(['id', 'name'])->toArray();
        //add to table
        $this->table($headers, $surveys);
        //Generate a question to ask which survey you want to choose
        $surveyId = $this->ask('Quel questionnaire ?');

        // Confirmation message to ask if we want to link the user with the survey in the surveyUser table
        if($this->confirm("Voulez-vous attacher l'utilisateur numero " . $userId . " au questionnaire numero " . $surveyId . "?")){
            // Generate a new row of surveyUser in table
            $surveyUser = SurveyUser::create([
                "user_id" => $userId,
                "survey_id" => $surveyId
            ]);
            //Generate a link with en encrypted id which will be decrypted into the SurveyController
            $this->info('URL: '.route('surveys.index',['id'=> Crypt::encrypt($surveyUser->id)]));
        }
    }
}
