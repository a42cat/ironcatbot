<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;
use IronCatBot\Router\Router;

try {
    $bot = new ICBot();
    $json = $bot->getJson();
    $type = $bot->getTypes();
    $author = $bot->getAuthor();

    if ($author == 'a42cat') {
        $router = new Router();
        $router->ExecEvents();
    }

    Debug::SendLog(json_encode($json), $type);

} catch (Exception $e) {
    echo 'Выброшено исключение: ', $e->getMessage(), "\n";
}

