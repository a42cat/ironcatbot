<?php

require('../vendor/autoload.php');

use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;

try {
    $bot = new ICBot();
    var_dump($bot);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

