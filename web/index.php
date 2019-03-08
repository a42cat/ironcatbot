<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;

try {
    $bot = new ICBot();
    $json = $bot->getJson();
    Debug::SendLog(json_encode($json),'json');
    Debug::SendLog(json_encode($json),'types');

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

