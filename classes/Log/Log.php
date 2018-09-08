<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 15:05
 */

namespace IronCatBot\Classes\Log;
use IronCatBot\Classes\Config\Config as CFG;

class Log

{
    static $message = '';
    
    public static function WriteErrorLog($message, $type) {
        $file = fopen(CFG::getDocRoot() . "/logs/error.log", "a+");
        $output = date('d\/m\/Y\/h:i:s') . " " . $type . " " . $message;
        fwrite($file, $output . PHP_EOL);
        fclose($file);
    }
}