<?php

require('../vendor/autoload.php');

//use IronCatBot\Classes\Bot\Bot;
use IronCatBot\Classes\Config\ConfigOther as CFG;

$bot = new \TelegramBot\Api\Client(CFG::GetToken());
var_dump($bot);

//Bot::Init();