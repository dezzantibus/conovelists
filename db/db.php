<?php

class db
{

    /** @var $connection PDO  */
    static protected $connection = null;

    const HOST = '127.0.0.1';

    const SCHEMA = 'conovelists';

    const USER = 'root';

    const PASS = 'antani75';

    public static function connect()
    {
        if( is_null( self::$connection ) )
        {
            static::$connection = new PDO( 'mysql:host=' . self::HOST . ';dbname=' . self::SCHEMA, self::USER, self::PASS );
        }
    }

    public static function beginTransaction()
    {
        static::connect();
        static::$connection->beginTransaction();
    }

    public static function commit()
    {
        static::connect();
        if( ! static::$connection->commit() )
        {
            static::$connection->rollBack();
            message::addError(
                'Database error, please contact support',
                'Roll back - ' . var_export( static::$connection, 1 )
            );
        }
    }

    public static function prepare( $sql )
    {
        static::connect();
        $result = static::$connection->prepare( $sql );
        return new db_statement( $result );
    }

    public static function lastInsertId()
    {
        static::connect();
        return static::$connection->lastInsertId();
    }

}