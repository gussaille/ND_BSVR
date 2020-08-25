<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $questions = [
            [
                'statement' => 'Votre adresse mail ?', 
                'type' => 'text',
                'options'=> null
            ],

            [
                'statement' => 'Votre âge ?',
                'type' => 'text',
                'options'=> null
            ],

            [
                'statement' => 'Votre sexe ?', 
                'type' => 'select', 
                'options' => json_encode(['Homme', 'Femme', 'Préfère ne pas répondre'])
            ],

            [
                'statement' => 'Nombre de personne dans votre foyer (adultes et enfants) ?', 
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Votre profession ?', 
                'type' => 'text',
                'options'=> null
            ],

            [
                'statement' => 'Quelle marque de casque VR utilisez-vous ?', 
                'type' => 'select', 
                'options' => json_encode(['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'])
            ],

            [
                'statement' => "Sur quel magasin d'application achetez-vous des contenus VR ?", 
                'type' => 'select', 
                'options' => json_encode(['SteamVR', 'Occulus store', 'Viveport', 'Playstation VR', 'GooglePlay', 'Windows store'])
            ],

            [
                'statement' => "Quel casque envisagez-vous d'acheter  dans un futur proche ?", 
                'type' => 'select', 
                'options'=> json_encode(['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'])
            ],

            [
                'statement' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder BigScreen ?', 
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Vous utilisez principalement Bigscreen pour ?', 
                'type' => 'select', 
                'options' => json_encode(['regarder des émissions TV en direct', 'regarder des films','jouer en solo', 'jouer en team'])
            ],

            [
                'statement' => "Combien donnez-vous de points pour la qualité de l'image sur BigScreen ?", 
                'type' => 'text',
                'options'=> null
            ],

            [
                'statement' => 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Combien donnez vous de point pour la connection réseau de Bigscreen ?', 
                'type' => 'choice',
                'options' => null
            ],

            [
                'statement' => 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?', 
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 
                'type' => 'select', 
                'options'=> json_encode(['oui', 'non'])
            ],

            [
                'statement' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 
                'type' => 'select', 
                'options'=> json_encode(['oui', 'non'])
            ],

            [
                'statement' => 'Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?', 
                'type' => 'choice',
                'options'=> null
            ],

            [
                'statement' => 'Quelle nouvelle fonctionnalité de vos rêves devrait exister sur Bigscreen ?', 
                'type' => 'text',
                'options'=> null
            ],
        ];

        Question::insert($questions);
    }
}
