<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 15:05
 */

namespace IronCatBot\Log;
use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;

class Log extends ICBot

{
    static $message = '';
    
    public static function SendLog($message, $type) {
        return Message::sendMessage($type.PHP_EOL.$message, -1001454081281, 0, true);
    }
}