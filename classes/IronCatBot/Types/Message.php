<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.09.2018
 * Time: 17:40
 */

namespace IronCatBot\IronCatBot\Types;

use IronCatBot\IronCatBot\ICBot;

class Message extends ICBot
{
    public static function sendMessage($text, $chatid, $messageid , $preview) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Message::getUrlApi() . '/sendMessage?chat_id=' . $chatid . '&reply_to_message_id='. $messageid .'&parse_mode=HTML&text=' . urlencode($text)."&disable_web_page_preview=".$preview);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
        $result = curl_exec($ch);
        return $result;
    }
}