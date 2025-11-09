<?php 

namespace chercheurs\action;

use chercheurs\action\Action;

class Q1Action extends Action{

    public function execute() : string{
        $html = '';
        $html = <<<HTML
        <h1> Détermination de la liste des articles écrits par un auteur donné </h1> 
        
        HTML;
        return $html;
    }  

}