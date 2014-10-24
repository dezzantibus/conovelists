<?php

class model_apib_routing extends model
{

    /**
     * @param $path
     * @param $parent_id
     * @return api object
     *
     * Searches the router table for the path and parent_id provided
     * and returns the data object.
     */
    static function fetchForRouting( $path, $parent_id )
    {

        $sql = '
            SELECT *
            FROM routing
            WHERE path = :path
                AND parent_id = :parent_id
        ';

        $query = db_apib::prepare( $sql );
        $query->bindString( ':path',      $path )
              ->bindInt   ( ':parent_id', $parent_id)
              ->execute();

        $data = $query->fetch();

        return new data_apib_routing( $data );

    }

}