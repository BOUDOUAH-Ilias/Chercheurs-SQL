<?php 

namespace chercheurs\action;

use chercheurs\action\Action;

class DefaultAction extends Action{

    public function execute() : string{
        $html = '';
        $html = <<<HTML
        <h1> Onsie </h1> 
        <form action="?action=Q1action" method="post">
            <input type="submit" name="Q1" value="Détermination de la liste des articles écrits par un auteur donné"/>
        </form>

        <form action="?action=Q2action" method="post">
            <input type="submit" name="Q2" value="Affichage de la liste des co-auteurs ayant travaillé avec un chercheur donné"/>
        </form>

        <form action="?action=Q3action" method="post">
            <input type="submit" name="Q3" value="Affichage de la liste des laboratoires de chaque chercheur"/>
        </form>
        HTML;
        return $html;
    }  

}