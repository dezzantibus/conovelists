<?php

die('PUPPA');

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

$handler = $_GET['handler'];

$page = new $handler;

$page->run();