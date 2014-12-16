<?php

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

date_default_timezone_set( "Europe/London" );

session_start();

model_user::initialise();

if( isset( $_GET['handler'] ) )
{
	$handler = $_GET['handler'];
}
else
{
	$handler = 'handler_homepage';
}
/** @var handler $page */
$page = new $handler;

$page->run();
