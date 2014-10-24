<?php

/**
 * Created by PhpStorm.
 * User: zante
 * Date: 03/09/2014
 * Time: 11:10
 */
defined('START_TIME') or define('START_TIME', microtime(true));
defined('START_MEM') or define('START_MEM', memory_get_usage());

require_once 'class_list.php';

/**
 * @param $class_name
 * autoload function to include classes that are being called
 * but have't been included yet
 */
function __autoload($class_name){
    /**
     * The class_list class contains the information on the location of all the classes in the system
     * given a class name it will return the full path to be included
     */
    $path = class_list::getClassFile($class_name);

    if( empty( $path ) )
    {
        message::addError(
            'Internal error. Please contact customer support',
            "File not found for class $class_name"
        );
    }
    else
    {
        include $path;
    }
}

//echo microtime(true) - START_TIME;
//echo ' | ';
//echo memory_get_peak_usage() - START_MEM;

instance::initialise( $_GET, $_POST );

// Path routing
$class = router::run();

/** @var  $object handler */
$object = new $class();

$object->run();


// Formatting data
echo formatter::run();

$benchmark = profiler::app_total();
