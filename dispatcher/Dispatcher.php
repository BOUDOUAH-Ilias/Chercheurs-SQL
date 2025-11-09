<?php 

namespace rps\dispatcher;
use chercheurs\action\DefaultAction;


class Dispatcher {

    private string $action;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? 'default';
    }

    public function run(): void 
    {
        $html = '';

        switch ($this->action) {
            case 'default':
                $actionInstance = new DefaultAction();
                $html = $actionInstance->execute();
                break;
        }
        
        echo $html;

    }
}