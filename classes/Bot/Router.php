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
                $type = $json['message']['entities'][0]['type'];
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

    public static function ExecCmd($json) {
        $cmd = explode(' ', $json['message']['text']);
        $cmd[0] = strtolower($cmd[0]);
        $cmd[0] = str_replace('@ironcatbot', '', $cmd[0]);

        $textmessage = '';

        switch($cmd[0]) {
            case '/start':
                $textmessage = 'Бот активирован';
                $_SESSION['STATUS'] = true;
                break;
            case '/stop':
                $_SESSION['STATUS'] = false;
                $textmessage = 'Бот деактивирован';
                break;
            case '/auth':
                if ($cmd[1] == '' || $cmd[2] == '') {
                    $textmessage = 'Введите логин и пароль в формате:'.PHP_EOL;
                    $textmessage .= '/auth login password'.PHP_EOL;
                } else {
                    $textmessage = 'Проверка авторизации'.PHP_EOL;
                    $textmessage .= 'Выполняю операций с движком...'.PHP_EOL;
                    $textmessage .= 'Авторизация успешна (нет)'.PHP_EOL;
                }

                break;
            case '/help':
                $textmessage = 'Список команд бота'.PHP_EOL;
                $textmessage .= '/start : Запускает работу бота'.PHP_EOL;
                $textmessage .= '/stop : Останавливает работу бота'.PHP_EOL;
                $textmessage .= '/auth : Авторизаций бота в движке'.PHP_EOL;
                break;
            default:
                $textmessage = 'Команда не найдена';
                break;
        }
        Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message']['message_id'], true);
    }

    public static function ExecEvents() {

        if (isset($_GET['STATUS'])) {
            $_SESSION['TEST_STATUS'] = $_GET['STATUS'];
        }

        if (isset($_GET['GET_STATUS'])) {
            var_dump($_SESSION['TEST_STATUS']);
        }

        $json = self::getJson();
        $type = self::getTypes();

        $jsonmessage = json_encode($json);
        Log::SendLog($jsonmessage, $type);
        Log::SendLog('status: '.$_SESSION['STATUS'], 'check session');

        switch ($type) {
            case 'bot_command':
                self::ExecCmd($json);
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
                //if (!$_SESSION['STATUS']) break;
                if ($json['message']['from']['username'] != 'a42cat') break;
                $textmessage = 'Ответ на сообщение в группе';
                Message::sendMessage($textmessage, $json['message']['chat']['id'], $json['message']['message_id'], true);
                break;
        }
    }
    
}