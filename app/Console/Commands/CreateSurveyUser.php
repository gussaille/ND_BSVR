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

        $headers = ['Id', 'Email'];

        $users = User::all(['id', 'email'])->toArray();

        $this->table($headers, $users);

        $headers = ['Id', 'Name'];

        $userId = $this->ask('Quel utilisateur?');



        $surveys = Survey::all(['id', 'name'])->toArray();

        $this->table($headers, $surveys);

        $surveyId = $this->ask('Quel sondage ?');


        if($this->confirm("Êtes-vous sûr de vouloir attacher le user " . $userId . " au survey " .$surveyId . "?")){
            $surveyUser = SurveyUser::create([
                "access_key" => (string) Str::uuid(),
                "user_id" => $userId,
                "survey_id" => $surveyId
            ]);

            $this->info('URL: '.route('surveys.index',['id'=> Crypt::encrypt($surveyUser->id)]));
        }
    }
}
