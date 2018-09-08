<?php

require('../vendor/autoload.php');

use IronCatBot\Classes\Bot\Bot;
use IronCatBot\Classes\Config\Config as CFG;

echo CFG::getDocRoot();

Bot::Init();

