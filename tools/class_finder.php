<?php

class class_finder
{

    public static function getClassFile( $name )
    {

		$frags = explode( '_', $name );

        switch( $frags[0] )
        {
            case 'message':  require_once __DIR__ . '/message.php';  break;
            case 'router':   require_once __DIR__ . '/router.php';   break;
            case 'security': require_once __DIR__ . '/security.php'; break;
            case 'layout':   self::getLayoutClass( $name, $frags );  break;			
            case 'handler':  self::getHandlerClass( $name, $frags ); break;			
            default: require_once __DIR__ . '/../' . $frags[0] . '/' . $name . '.php';
        }

    }
	
	private static function getLayoutClass( $name, $frags )
	{
	
		if( isset( $frags[1] ) )
		{ 
			switch( $frags[1] )
			{
				case 'homepage': require_once __DIR__ . '/../layout/homepage/' . $name . '.php'; break;
				case 'base':     require_once __DIR__ . '/../layout/base/' . $name . '.php';     break;
				case 'form':     require_once __DIR__ . '/../layout/form/' . $name . '.php';     break;
				case 'about':    require_once __DIR__ . '/../layout/about/' . $name . '.php';    break;
				default:         require_once __DIR__ . '/../layout/' . $name . '.php';
			}
		}
		else
		{
			require_once __DIR__ . '/../layout/layout.php';
		}
	
	}
	
	private static function getHandlerClass( $name, $frags )
	{
	
		if( isset( $frags[1] ) )
		{ 
			switch( $frags[1] )
			{
				case 'action': require_once __DIR__ . '/../handler/action/' . $name . '.php'; break;
				default:       require_once __DIR__ . '/../handler/' . $name . '.php';
			}
		}
		else
		{
			require_once __DIR__ . '/../handler/handler.php';
		}
	
	}

}