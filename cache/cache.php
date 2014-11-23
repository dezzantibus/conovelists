<?php

abstract class cache
{

    static private $available;

    static private $memcache;

    const HOST = '127.0.0.1';

    const PORT = 11211;

//    const COMPRESS = MEMCACHE_COMPRESSED;

    static private function stampIndex( $index )
    {
        return static::$path . $index;
    }

    static public function activate()
    {

		/** @TODO remove this once memcache is up and running */
		self::$available = false;

        if( empty( self::$available ) && self::$available !== false )
        {

            self::$memcache = new Memcache();

            self::$memcache->connect( self::HOST, self::PORT );

            self::$memcache->getExtendedStats();

            self::$available = false;

            foreach( $stats as $server )
            {
                if( $server )
                {
                    self::$available = true;
                }
            }

        }

    }

    static public function save( $index, $data, $duration=600 )
    {

        if( ! self::$available )
        {
            return false;
        }

        $index = self::stampIndex( $index );

        return self::$memcache->set( $index, $data, self::COMPRESS, $duration);

    }

    static public function retrieve( $index )
    {

        if( ! self::$available )
        {
            return false;
        }

        $index = self::stampIndex( $index );

        return self::$memcache->get( $index, self::COMPRESS );

    }

    static public function clear( $index )
    {

        if( ! self::$available )
        {
            return false;
        }

        $index = self::stampIndex( $index );

        return self::$memcache->delete( $index );

    }

    static public function flush()
    {
        self::$memcache->flush();
    }

}