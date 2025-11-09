<?php 

namespace chercheurs\action;

use chercheurs\action\Action;

class Q2action extends Action{

    public function execute() : string{
        $html = '';
        $html = <<<HTML
        <h1> Affichage de la liste des co-auteurs ayant travaillé avec un chercheur donné. </h1> 
        <form action="?action=displayQ2action" method="POST">
            <label for="nom">Nom :</label>
            <input name="nom" id="nom" type="text">

            <label for="prenom">Prenom :</label>
            <input name="prenom" id="prenom" type="text">

            <button type="submit">Rechercher</button>
        </form>
        HTML;
        return $html;
    }  

}