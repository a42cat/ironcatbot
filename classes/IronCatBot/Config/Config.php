<?php
/**
 * Created by PhpStorm.
 * User: pHantom
 * Date: 03.09.2018
 * Time: 7:45
 */

namespace IronCatBot\Classes\Bot\Config;

class Config
{
    
    const URL_API = 'https://api.telegram.org/bot';
    
    const DOMAIN_BOT = 'https://ironcatbot.herokuapp.com';

    const DEBUG_CHANNEL_ID = -1001454081281;

    // https: //api.telegram.org/bot~token~/setWebhook?url=https: //example.ru/path
    
    public static function GetToken() {
        return getenv('TOKEN');
    }
    
    public static function getDocRoot() {
        return $_SERVER['DOCUMENT_ROOT'];
    }
    

}