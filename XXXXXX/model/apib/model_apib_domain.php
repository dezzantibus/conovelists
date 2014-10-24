<?php

class model_apib_domain extends model
{

    static public function fetchCiviDomainByCustomerId( $customer_id )
    {

        $data = cache_apib_domain::retrieve_apc( $customer_id . 'civi' );

        if( empty( $data ) )
        {

            $sql = '
                SELECT *
                FROM `domains`
                WHERE Customer_ID = :customer_id
                    AND product = "fs-civi"
            ';

            $query = db_apib::prepare( $sql );
            $query->bindString( ':customer_id', $customer_id )
                ->execute();

            $data = $query->fetch();

            cache_apib_domain::save_apc( $customer_id . 'civi', $data, 0 );

        }

        return new data_apib_domain( $data );

    }

}