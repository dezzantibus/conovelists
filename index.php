<?php

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

if( isset( $_GET['handler'] ) )
{
	$handler = 'handler_' . $_GET['handler'];
}
else
{
	$handler = 'handler_homepage';
}
$page = new $handler;

$page->run();