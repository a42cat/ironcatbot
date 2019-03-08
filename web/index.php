<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;

try {
    $bot = new ICBot();
    Debug::SendLog($bot->getJson());
    Debug::SendLog($bot->getTypes());

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

