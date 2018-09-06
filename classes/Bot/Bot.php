<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 13:42
 */

namespace IronCatBot\Classes\Bot;
use IronCatBot\Classes\Config\ConfigOther as CFG;
use IronCatBot\Classes\Log\Log;
use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;

class Bot
{
    
    public static function Init()
    {

        /*$bot = new BotApi(CFG::GetToken());
        $client = new Client(CFG::GetToken());
        $client->command('start', function ($message) use ($bot) {
            $answer = 'Добро пожаловать!';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });

        // команда для помощи
        $client->command('help', function ($message) use ($bot) {
            $answer = 'Команды:
        /help - вывод справки';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });
    
        $client->run();*/
        
    }
    
}