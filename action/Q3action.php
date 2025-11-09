<?php 


namespace chercheurs\action;

use chercheurs\action\Action;
use chercheurs\repository\ChercheursRepository;

class Q3action extends Action{

    public function execute() : string{


        $repo = ChercheursRepository::getInstance();
        $res = $repo->getChercheursLabos();

        // Je n'ai pas réussi à trouver la bonne requête SQL donnant les bons résultats.
        $html = "<h1> Affichage de la liste des laboratoires de chaque chercheur </h1>";
        $html .= "<br><p> Nom || Prenom || Nom Labo </p>";
        foreach($res as $article){
            $html .= "- " . $article['NOMCHERCHEUR'] . " || " . $article['PRENOMCHERCHEUR'] . " || " .$article['NOMLABO'] . "<br>";
        }

        return $html;
        
        }
    }  

