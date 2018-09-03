<?php
/**
 * Created by PhpStorm.
 * User: pHantom
 * Date: 03.09.2018
 * Time: 7:45
 */

namespace IronCatBot\Classes\Config;

class ConfigOther extends ConfigMain
{
    
    const URL_API = 'https://api.telegram.org/bot';
    
    const DOMAIN_BOT = 'https://ironcatbot.herokuapp.com';
    
    // https: //api.telegram.org/bot~token~/setWebhook?url=https: //example.ru/path
    
    public static function getDocRoot() {
        return $_SERVER['DOCUMENT_ROOT'];
    }
    
    public static function getUrlApi() {
        
        $result = self::URL_API . self::TOKEN . '/setWebhook?url=' . self::DOMAIN_BOT;
        
        return $result;
        
    }
}