<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 15:05
 */

namespace IronCatBot\Debug;
use IronCatBot\IronCatBot\ICBot;
use IronCatBot\IronCatBot\Types\Message;

class Debug extends ICBot

{
    static $message = '';

    public static function pr($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    public static function SendLog($message, $type) {
        return Message::sendMessage($type.PHP_EOL.$message, -1001454081281, 0, true);
    }
}