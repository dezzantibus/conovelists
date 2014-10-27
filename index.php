<?php

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );