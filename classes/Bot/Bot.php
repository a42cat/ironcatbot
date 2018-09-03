<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 13:42
 */

namespace IronCatBot\Classes\Bot;
use IronCatBot\Classes\Config\ConfigOther as CFG;

class Bot
{
    
    public static function Init()
    {
        $bot = new \TelegramBot\Api\Client(CFG::GetToken());
        
        $bot->command('start', function ($message) use ($bot) {
            $answer = 'Добро пожаловать!';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });

        // команда для помощи
        $bot->command('help', function ($message) use ($bot) {
            $answer = 'Команды:
            /help - вывод справки';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });
    
        $bot->run();
        
    }
    
}