<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;
use IronCatBot\Router\Router;

try {
    $bot = new ICBot();

    $db = parse_url(getenv("DATABASE_URL"));

    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

    Debug::pr($pdo);

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

