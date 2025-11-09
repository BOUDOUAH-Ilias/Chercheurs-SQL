<?php 

namespace chercheurs\action;

use chercheurs\action\Action;

class DefaultAction extends Action{

    public function execute() : string{
        $html = '';
        $html = <<<HTML
        <h1> Onsie </h1> 
        <form action="Q1action">
        <input type="submit" name="Q1" value="Détermination de la liste des articles écrits par un auteur donné"/>
        HTML;
        return $html;
    }  

}