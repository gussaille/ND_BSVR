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
                'label' => 'Votre adresse mail ?', 
                'type' => 'B',
                'options'=> null
            ],

            [
                'label' => 'Votre âge ?',
                'type' => 'B',
                'options'=> null
            ],

            [
                'label' => 'Votre sexe ?', 
                'type' => 'A', 
                'options' => json_encode(['Homme', 'Femme', 'Préfère ne pas répondre'])
            ],

            [
                'label' => 'Nombre de personne dans votre foyer (adultes et enfants) ?', 
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Votre profession ?', 
                'type' => 'B',
                'options'=> null
            ],

            [
                'label' => 'Quelle marque de casque VR utilisez-vous ?', 
                'type' => 'A', 
                'options' => json_encode(['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'])
            ],

            [
                'label' => "Sur quel magasin d'application achetez-vous des contenus VR ?", 
                'type' => 'A', 
                'options' => json_encode(['SteamVR', 'Occulus store', 'Viveport', 'Playstation VR', 'GooglePlay', 'Windows store'])
            ],

            [
                'label' => "Quel casque envisagez-vous d'acheter  dans un futur proche ?", 
                'type' => 'A', 
                'options'=> json_encode(['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'])
            ],

            [
                'label' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder BigScreen ?', 
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Vous utilisez principalement Bigscreen pour ?', 
                'type' => 'A', 
                'options' => json_encode(['regarder des émissions TV en direct', 'regarder des films','jouer en solo', 'jouer en team'])
            ],

            [
                'label' => "Combien donnez-vous de points pour la qualité de l'image sur BigScreen ?", 
                'type' => 'B',
                'options'=> null
            ],

            [
                'label' => 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Combien donnez vous de point pour la connection réseau de Bigscreen ?', 
                'type' => 'C',
                'options' => null
            ],

            [
                'label' => 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?', 
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 
                'type' => 'A', 
                'options'=> json_encode(['oui', 'non'])
            ],

            [
                'label' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 
                'type' => 'A', 
                'options'=> json_encode(['oui', 'non'])
            ],

            [
                'label' => 'Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?', 
                'type' => 'C',
                'options'=> null
            ],

            [
                'label' => 'Quelle nouvelle fonctionnalité de vos rêves devrait exister sur Bigscreen ?', 
                'type' => 'B',
                'options'=> null
            ],
        ];

        Question::insert($questions);
    }
}
