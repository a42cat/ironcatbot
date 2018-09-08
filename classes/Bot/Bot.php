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
            Log::WriteErrorLog($_GET, 'GET');
        }
    
        if (!empty($_POST)) {
            Log::WriteErrorLog($_POST, 'POST');
        }
        
    
    }
    
}