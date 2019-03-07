<?php

require('../vendor/autoload.php');

/*use IronCatBot\Classes\Bot\Bot;*/
use IronCatBot\Classes\Bot\Config\Config;

//Bot::Init();

try {
    $bot = new \TelegramBot\Api\Client(Config::GetToken());

    $bot->command('start', function ($message) use ($bot) {
        $test = 'test';
        $bot->sendMessage($message->getChat()->getId(), $test);
    });

    $bot->run();

} catch(\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}

