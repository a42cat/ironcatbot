<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 15:05
 */

namespace IronCatBot\Classes\Log;
use IronCatBot\Classes\Bot\Config\Config;
use IronCatBot\Classes\Bot\Types\Message;

class Log

{
    static $message = '';
    
    public static function SendLog($message, $type) {
        Message::sendMessage($message, -1001454081281, 0, true);
    }
}