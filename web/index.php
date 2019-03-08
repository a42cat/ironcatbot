<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;

try {
    $bot = new ICBot();
    Debug::SendLog($bot->getJson(),'json');
    Debug::SendLog($bot->getTypes(),'types');

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

