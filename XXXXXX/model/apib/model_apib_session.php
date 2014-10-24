<?php

class model_apib_session extends model
{

    static public function fetchById( $session_id )
    {

        $sql = 'SELECT * FROM `sessions` WHERE Session_ID = :session_id';

        $query = db_apib::prepare( $sql );
        $query->bindString( ':session_id', $session_id )
              ->execute();

        $data = $query->fetch();

        if( $data === false )
        {
            error_log( "Session $session_id not found in the database" );
            die();
        }

        return new data_apib_session( $data );

    }

}