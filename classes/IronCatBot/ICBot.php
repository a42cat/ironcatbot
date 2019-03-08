<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 13:42
 */

namespace IronCatBot\IronCatBot;

/*use IronCatBot\Classes\Bot\Config\Config;
use IronCatBot\Classes\Log\Log;*/

class ICBot
{

    const URL_API = 'https://api.telegram.org/bot';

    const DOMAIN_BOT = 'https://ironcatbot.herokuapp.com';

    public $DOCROOT = '';

    public function __construct()
    {
        $this->DOCROOT = $_SERVER['DOCUMENT_ROOT'];
    }

    public static function GetToken()
    {
        return getenv('TOKEN');
    }

    public static function getUrlApi()
    {

        return self::URL_API . self::GetToken();
    }

    public function getJson()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

}