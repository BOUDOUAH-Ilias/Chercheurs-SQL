<?php 

namespace chercheurs\action;

use chercheurs\action\Action;

class Q1Action extends Action{

    public function execute() : string{
        $html = '';
        $html = <<<HTML
        <h1> Détermination de la liste des articles écrits par un auteur donné </h1> 
        <form action="action.php" method="get">
            <label for="name">Nom :</label>
            <input name="name" id="name" type="text">

            <label for="prenom">Prenom :</label>
            <input name="prenom" id="prenom" type="text">

            <button type="submit">Rechercher</button>
        </form>
        HTML;
        return $html;
    }  

}