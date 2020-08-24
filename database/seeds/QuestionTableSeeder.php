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
            ['statement' => 'Votre adresse mail ?', 'type' => 'text'],
            ['statement' => 'Votre âge ?', 'type' => 'text'],
            ['statement' => 'Votre sexe ?', 'type' => 'select'],
            ['statement' => 'Nombre de personne dans votre foyer (adultes et enfants) ?', 'type' => 'choice'],
            ['statement' => 'Votre profession ?', 'type' => 'text'],
            ['statement' => 'Quelle marque de casque VR utilisez-vous ?', 'type' => 'select'],
            ['statement' => "Sur quel magasin d'application achetez-vous des contenus VR ?", 'type' => 'select'],
            ['statement' => "Quel casque envisagez-vous d'acheter  dans un futur proche ?", 'type' => 'select'],
            ['statement' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder BigScreen ?', 'type' => 'choice'],
            ['statement' => 'Vous utilisez principalement Bigscreen pour ?', 'type' => 'select'],
            ['statement' => "Combien donnez-vous de points pour la qualité de l'image sur BigScreen ?", 'type' => 'text'],
            ['statement' => 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?', 'type' => 'choice'],
            ['statement' => 'Combien donnez vous de point pour la connection réseau de Bigscreen ?', 'type' => 'choice'],
            ['statement' => 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?', 'type' => 'choice'],
            ['statement' => 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?', 'type' => 'choice'],
            ['statement' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 'type' => 'select'],
            ['statement' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 'type' => 'select'],
            ['statement' => 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?', 'type' => 'choice'],
            ['statement' => 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?', 'type' => 'choice'],
            ['statement' => 'Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Bigscreen ?', 'type' => 'text'],
        ];

        Question::insert($questions);
    }
}
