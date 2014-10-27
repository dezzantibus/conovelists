<?php

class class_finder
{

    public static function getClassFile( $name )
    {

        switch( $name )
        {
            case 'message': require_once __DIR__ . '/message.php'; break;
            case 'router':  require_once __DIR__ . '/router.php';  break;
            default:
                $frags = explode( '_', $name );
                require_once __DIR__ . "/../{$frags[0]}/$name.php";
        }

    }

}