<?php


require_once 'vendor/autoload.php';
require_once 'dispatcher/Dispatcher.php';
echo "test";

$dispatcher = new \chercheurs\dispatcher\Dispatcher();
echo $dispatcher->run();