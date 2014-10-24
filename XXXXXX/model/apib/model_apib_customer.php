<?php

class model_apib_customer extends model
{

    static public function fetchById( $customer_id )
    {

        $data = cache_apib_customer::retrieve_apc( $customer_id );

        if( empty( $data ) )
        {

            $sql = 'SELECT * FROM `customers` WHERE ID = :customer_id';

            $query = db_apib::prepare( $sql );
            $query->bindString( ':customer_id', $customer_id )
                  ->execute();

            $data = $query->fetch();

            cache_apib_customer::save_apc( $customer_id, $data, 0 );

        }

        return new data_apib_session( $data );

    }

}