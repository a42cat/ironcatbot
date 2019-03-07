<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.09.2018
 * Time: 17:10
 */

namespace IronCatBot\Classes\Bot;

use IronCatBot\Classes\Log\Log;
use IronCatBot\Classes\Bot\Types\Message;

class Router
{
   
    public static function getJson() {
        return json_decode(file_get_contents('php://input'), TRUE);
    }
    
    public static function getTypes() {

        $json = self::getJson();
        
        if ($json['message']['entities']) {
            $type = $json['message']['entities']['type'];
        } else {
            $type = $json['message']['chat']['type'];
        }
        
        return $type;

    }
    
    public static function ExecEvents() {

        session_start();
        
        $json = self::getJson();
        $type = self::getTypes();

        $jsonmessage = json_encode($json);
        Log::SendLog($jsonmessage, $type);

        switch ($type) {
            case 'bot_command':
                $textmessage = 'Ответ на системную команду';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message_id'], true);
                break;
            case 'private':
                $textmessage = 'Ответ на сообщение в личке';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message_id'], true);
                break;
            case 'group':
                $textmessage = 'Ответ на сообщение в группе';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message_id'], true);
                break;
        }
    }
    
}