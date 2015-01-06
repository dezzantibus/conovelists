<?php

class model_contact extends model
{

    public static function create( data_contact $contact )
    {

        $sql = '
            INSERT INTO `contact`
                ( `name`, email, message )
            VALUES
                ( :name, :email, :message )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':name',    $contact->name )
            ->bindString( ':email',   $contact->email )
            ->bindString( ':message', $contact->message )
            ->execute();

    }

}















