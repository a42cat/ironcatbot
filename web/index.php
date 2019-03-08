<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;
use IronCatBot\Log\Log;

try {
    $bot = new ICBot();
    var_dump(1);
    var_dump($bot::getJson());
    var_dump(2);
    Log::SendLog(json_encode($bot::getJson()), 'json');
    var_dump(3);
    Message::sendMessage('ответ',$bot::getJson()['message']['chat']['id'],null,true);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

