<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;
use IronCatBot\Router\Router;

try {
    $bot = new ICBot();

    $router = new Router();
    $router->ExecEvents();

    //Debug::SendLog(json_encode($json),$bot->getTypes());

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

