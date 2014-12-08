<?php
session_start();

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

model_user::initialise();

if( isset( $_GET['handler'] ) )
{
	$handler = $_GET['handler'];
}
else
{
	$handler = 'handler_homepage';
}
$page = new $handler;

$page->run();
