<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 13:42
 */

namespace IronCatBot\Classes\Bot;
use IronCatBot\Classes\Config\Config as CFG;
use IronCatBot\Classes\Log\Log;

class Bot
{
    
    public static function Init()
    {
        if (!empty($_GET)) {
            Log::WriteErrorLog(json_encode($_GET), 'GET');
        }
    
        if (!empty($_POST)) {
            Log::WriteErrorLog(json_encode($_POST), 'POST');
        }
    
        if (!empty($_REQUEST)) {
            Log::WriteErrorLog(json_encode($_REQUEST), 'REQUEST');
        }
        
    
    }
    
}