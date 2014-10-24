<?php

class router
{

    /**
     * @param int $parent_id
     * @return api object
     *
     * Analyses the path of the call and searches in the router table
     * for the class to be used and returns the appropriate object to be run.
     */
    public static function run( $parent_id=0 )
    {

        $class = cache_apib_routing::retrieve_local( instance::$get['path'] );

        if( empty( $class ) )
        {

            $fragment = array_shift( instance::$path );

            /** @var $result data_apib_routing */
            $result = model_apib_routing::fetchForRouting( $fragment, $parent_id );

            if( $result->end_point )
            {
                cache_apib_routing::save_local( instance::$get['path'], $result->class, 0 );
                cache_apib_routing::save_local( instance::$get['path'] . '-path', instance::$path, 0 );
                return $result->class;
            }

            return self::run( $path, $cache_index, $result->id );

        }
        else
        {
            $cached_path = cache_apib_routing::retrieve_local( instance::$get['path'] . '-path' );
            if( empty( $cached_path ) )
            {
                cache_apib_routing::clear( $cache_index );
                return self::run();
            }
            instance::$path = $cached_path;
            return $class;
        }

    }

}


