<?php

require('../vendor/autoload.php');

use IronCatBot\Classes\Bot\Bot;
use IronCatBot\Classes\Config\ConfigOther as CFG;
use IronCatBot\Classes\Log\Log;

$config_var = getenv('TEST');

var_dump($config_var);

Bot::Init();
