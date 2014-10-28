<?php

class class_finder
{

    public static function getClassFile( $name )
    {

		$frags = explode( '_', $name );

        switch( $frags[0] )
        {
            case 'message': require_once __DIR__ . '/message.php'; break;
            case 'router':  require_once __DIR__ . '/router.php';  break;
            case 'layout':
				switch( $frags[1] )
				{
					case 'homepage':
						require_once __DIR__ . "/../{$frags[0]}/{$frags[1]}/$name.php"; break;
					default:
						require_once __DIR__ . "/../{$frags[0]}/$name.php";
				}
				break;
			
            default:
                require_once __DIR__ . "/../{$frags[0]}/$name.php";
        }

    }

}