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
        //return json_decode('{"update_id":734781866,"message":{"message_id":69,"from":{"id":201090619,"is_bot":false,"first_name":"\u041a\u043e\u0442\u044d","username":"a42phantom","language_code":"ru"},"chat":{"id":201090619,"first_name":"\u041a\u043e\u0442\u044d","username":"a42phantom","type":"private"},"date":1536413805,"text":"test"}}', TRUE);
    }
    
    public static function getTypes() {
        $json = self::getJson();
        return $json['message']['chat']['type'];
    }
    
    public static function switchEvents() {
        
        $json = self::getJson();
        $type = self::getTypes();
        
        if ($json) {
            Log::WriteErrorLog(json_encode($json), $type);
        }
        
        switch (self::getTypes()) {
            case 'bot_command':
                $textmessage = 'Ответ на системную комманду';
                Message::sendMessage($textmessage, $json['chat']['id'], $json['message_id'], true);
                break;
            case 'private':
                $textmessage = 'Ответ на сообщение в личке';
                Message::sendMessage($textmessage, $json['chat']['id'], $json['message_id'], true);
                break;
            case 'group':
                $textmessage = 'Ответ на сообщение в группе';
                Message::sendMessage($textmessage, $json['chat']['id'], $json['message_id'], true);
                break;
        }
    }
    
}