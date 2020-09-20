Bigscreen est une entreprise qui développe une application VR permettant aux utilisateurs de regarder en VR des films, émissions TV et jeux vidéos sur un écran géant virtuel, seul ou à plusieurs.

BigScreen m'a demandé de réaliser un sondage leur permettant de récolter des informations de la part de leurs utilisateurs.


Informations : 

Dans le terminal : 

- Générer les seeds dans la BDD -> php artisan migrate:refresh --seed

Une fois les seeds générés en base, on peut créer et affecter un surveyUser unique pour un utilisateur avec la commande

-> php artisan survey-user:create 

- Question: Quel utilisateur ?
Choisir l'id d'un des utilisateurs et copier son adresse e-mail pour pouvoir l'utiliser dans le formulaire par la suite

- Question: Quel questionnaire ?
Choisir l'id du sondage -> 1 (le seul disponible actuellement)

- Question: Voulez-vous attacher l'utilisateur numero # au questionnaire numero #? (yes/no)
Saisir yes

Une url unique est générée avec un id crypté, seul l'adresse email de l'utilisateur choisi précédemment est acceptée. 
On peut ainsi accéder au questionnaire.
