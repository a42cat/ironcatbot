<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Log\Log;

try {
    $bot = new ICBot();
    var_dump($bot::getJson());
    Log::SendLog(json_encode($bot::getJson()), 'json');

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

