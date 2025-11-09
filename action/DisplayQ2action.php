<?php 


namespace chercheurs\action;

use chercheurs\action\Action;
use chercheurs\repository\ChercheursRepository;

class DisplayQ2action extends Action{

    public function execute() : string{

        if (!isset($_POST['nom'], $_POST['prenom'])) {
            return "<p> Aucun nom et/ou prénom saisi </p>";
        }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        
        $repo = ChercheursRepository::getInstance();
        $res = $repo->getCoAuteurs($nom, $prenom);

        $html = "<h1> Affichage de la liste des co-auteurs ayant travaillé avec un chercheur donné </h1>";
        foreach($res as $article){
            $html .= "- " . $article['NOMCHERCHEUR'] . " " . $article['PRENOMCHERCHEUR'] . "<br>";
        }

        return $html;
        
        }
    }  

