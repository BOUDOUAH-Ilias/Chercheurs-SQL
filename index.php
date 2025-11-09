<?php


require_once 'vendor/autoload.php';
require_once 'dispatcher/Dispatcher.php';

use \chercheurs\repository\ChercheursRepository;


ChercheursRepository::setConfig(__DIR__ . '/Config.db.ini');
$repo = ChercheursRepository::getInstance();
$pdo = $repo->getPDO();

$dispatcher = new \chercheurs\dispatcher\Dispatcher();
echo $dispatcher->run();