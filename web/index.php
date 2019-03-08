<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Debug\Debug;

try {
    $bot = new ICBot();
    $json = $bot->getJson();
    Debug::pr(1);
    Debug::pr($json);
    Debug::pr($bot::getUrlApi());
    Debug::pr(2);
    Debug::SendLog(json_encode($bot->getJson()), 'json');
    Debug::pr(3);
    Message::sendMessage('ответ', $bot->getJson()['message']['chat']['id'],null,true);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

