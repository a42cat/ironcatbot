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
        if ($json['message']) {
            if ($json['message']['entities']) {
                $type = $json['message']['entities']['type'];
            } else {
                $type = $json['message']['chat']['type'];
            }
        } elseif ($json['channel_post']) {
            $type = $json['channel_post']['chat']['type'];
        } else {
            $type = 'unknown';
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
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message']['message_id'], true);
                break;
            case 'mention':
                $textmessage = 'Ответ на сообщение с указанием ';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message']['message_id'], true);
                break;
            case 'channel':
                //Продумать логику
                break;
            case 'private':
                $textmessage = 'Ответ на сообщение в личке';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message']['message_id'], true);
                break;
            case 'group':
            case 'supergroup':
                if ($json['message']['from']['username'] != 'a42cat') break;
                $textmessage = 'Ответ на сообщение в группе';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message']['message_id'], true);
                break;
        }
    }
    
}