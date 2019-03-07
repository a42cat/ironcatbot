<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 13:42
 */

namespace IronCatBot\Classes\Bot;
/*use IronCatBot\Classes\Bot\Config\Config;
use IronCatBot\Classes\Log\Log;*/

class Bot
{

    public static function Init()
    {
        
        Router::ExecEvents();
    
    }
    
}