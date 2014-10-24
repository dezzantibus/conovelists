<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 03/09/2014
 * Time: 11:15
 */


class class_finder
{

    /**
     * @param $name
     * @return string
     *
     * This method will make a first sorting of the class being requested
     * and delegate the generation of the path to one of the private methods
     * database and root classes' path is returned directly from here
     */
    public static function getClassFile( $name )
    {
        $frags = explode( '_', $name );

        switch( $frags[0] )
        {
            case 'cache':   return self::getCacheClassFile( $name, $frags );
            case 'data' :   return self::getDataClassFile( $name, $frags );
            case 'model':   return self::getModelClassFile( $name, $frags );
            case 'handler': return self::getHandlerClassFile( $name, $frags );
            case 'db':      return __DIR__ . '/database/' . $name . '.php';
            default:
                $path = __DIR__ . '/' . $name. '.php';
                if( file_exists( $path )  )
                {
                    return $path;
                }
                return null;
        }
    }

    /**
     * @param $name
     * @param $frags
     * @return string
     *
     * This method is invoked when the class being requested is a cache class
     */
    private static function getCacheClassFile( $name, $frags )
    {

        $base_path = __DIR__ . '/cache';

        if( file_exists( "$base_path/core/$name.php"  ) )
        {
            return "$base_path/core/$name.php";
        }

        if( file_exists( "$base_path/lib/{$frags[1]}/$name.php"  ) )
        {
            return "$base_path/lib/{$frags[1]}/$name.php";
        }

        return null;

    }

    /**
     * @param $name
     * @param $frags
     * @return string
     *
     * This method is invoked when the class being requested is a data class
     */
    private static function getDataClassFile( $name, $frags )
    {

        if( $name == 'data' )
        {
            return __DIR__ . '/data/data.php';
        }

        $path = __DIR__ . '/data/' . $frags[1] . '/' . $name . '.php';

        if( file_exists( $path ) )
        {
            return $path;
        }

        $path = __DIR__ . '/data/' . $frags[1] . '/' . $frags[2] . '/' . $name . '.php';
        if( file_exists( $path ) )
        {
            return $path;
        }

        return null;

    }

    /**
     * @param $name
     * @param $frags
     * @return string
     *
     * This method is invoked when the class being requested is a model class
     */
    private static function getModelClassFile( $name, $frags )
    {

        if( $name == 'model' )
        {
            return __DIR__ . '/model/model.php';
        }

        $path = __DIR__ . '/model/' . $frags[1] . '/' . $name . '.php';

        if( file_exists( $path ) )
        {
            return $path;
        }

        return null;

    }

    /**
     * @param $name
     * @param $frags
     * @return null|string
     *
     * This method is invoked when the class being requested is the API
     * being called or internally when a composite call is made
     */
    private static function getHandlerClassFile( $name, $frags )
    {

        switch( $frags[1] )
        {
            case 'xref':
                if( file_exists( __DIR__ . '/handler/xref/' . $name . '.php' ) )
                {
                    return __DIR__ . '/handler/xref/' . $name . '.php';
                }
                break;

            default :
                if( file_exists( __DIR__ . '/handler/' . $name . '.php' ) )
                {
                    return __DIR__ . '/handler/' . $name . '.php';
                }
        }

        return null;

    }

}