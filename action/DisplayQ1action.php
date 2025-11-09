<?php 

namespace chercheurs\action;

use chercheurs\action\Action;
use chercheurs\repository\ChercheursRepository;

class DisplayQ1action extends Action{

    public function execute() : string{

        if (!isset($_POST['nom'], $_POST['prenom'])) {
            return "<p> Aucun nom et/ou prénom saisi </p>";
        }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        
        $repo = ChercheursRepository::getInstance();
        $res = $repo->getArticle($nom, $prenom);

        $html = "<h1> Détermination de la liste des articles écrits par un auteur donné </h1>";
        foreach($res as $article){
            $html .= "- " . $article['TITRE'] . "<br>";
        }

        return $html;
        
        }
    }  

