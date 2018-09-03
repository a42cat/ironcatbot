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
        $bot = new \TelegramBot\Api\BotApi(CFG::GetToken());
        
        $bot->getUpdates();
    
        $bot->run();
        
    }
    
}