<?php 

namespace chercheurs\dispatcher;
use chercheurs\action\DefaultAction;

use chercheurs\action\Q1action;
use chercheurs\action\DisplayQ1action;

use chercheurs\action\Q2action;
use chercheurs\action\DisplayQ2action;

use chercheurs\action\Q3action;

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
            case 'Q1action':
                $actionInstance = new Q1action();
                $html = $actionInstance->execute();
                break;
            case 'displayQ1action':
                $actionInstance = new DisplayQ1action();
                $html = $actionInstance->execute();
                break;
            case 'Q2action':
                $actionInstance = new Q2action();
                $html = $actionInstance->execute();
                break;
            case 'displayQ2action':
                $actionInstance = new DisplayQ2action();
                $html = $actionInstance->execute();
                break;
            case 'Q3action':
                $actionInstance = new Q3action();
                $html = $actionInstance->execute();
                break;
        }
        
        echo $html;

    }
}