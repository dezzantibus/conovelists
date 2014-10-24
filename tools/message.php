<?php

class message
{

    /**
     * list of messages generated during the processing of the api request
     */
    static private $list;

    /**
     * functional method for adding message. Internal use only
     */
    private static function addMessage( $type, $message )
    {
        if( ! is_array( self::$list ) )
        {
            self::$list = array();
        }

        $list[] = array(
            'type'      => $type,
            'message'   => $message,
            'timestamp' => time(),
        );
    }

    /**
     * @param $message
     * @param $log
     *
     * Public method for adding an error message
     * The $log parameter is added to the apache error log
     * for use in debugging
     */
    public static function addError( $message, $log )
    {
        self::addMessage( 'ERROR', $message );
        error_log( $log );
    }

    /**
     * @param $message
     *
     * Public method for adding a success message
     */
    public static function addSuccess( $message )
    {
        self::addMessage( 'SUCCESS', $message );
    }

    /**
     * @param $message
     *
     * Public method to add an informative message
     */
    public static function addInfo( $message )
    {
        self::addMessage( 'INFO', $message );
    }

    /**
     * @param $message
     *
     * Public method to add a warning message
     */
    public static function addWarning( $message )
    {
        self::addMessage( 'WARNING', $message );
    }

    /**
     * @return array
     *
     * Public method to retrieve the list of messages generated
     * If no message is generated it will return an empty array
     */
    public static function getMessages()
    {
        if( ! is_array( self::$list ) )
        {
            self::$list = array();
        }
        return self::$list;
    }

    /**
     * @return bool
     *
     * Public method to determine whether there are errors
     * in the list of messages
     */
    public static function containsErrors()
    {
        foreach( self::$list as $message )
        {
            if( $message['type'] == 'ERROR' )
            {
                return true;
            }
        }
        return false;
    }

}