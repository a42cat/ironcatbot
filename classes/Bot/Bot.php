<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 13:42
 */

namespace IronCatBot\Classes\Bot;
use IronCatBot\Classes\Bot\Config\Config;
use IronCatBot\Classes\Log\Log;

class Bot
{

    public static function Init()
    {
        
        Router::switchEvents();
        
        $output = json_decode(file_get_contents('php://input'), TRUE);
        
        if (!empty($output)) {
            Log::WriteErrorLog(json_encode($output), 'REQUEST');
        }
    
    }
    
}