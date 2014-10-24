<?php

class model_xref_reference extends model
{

    static function create( $contact, $reference, $type_id, $customer_id, $start_date, $end_date, $comment, $operator )
    {

        cache_xref_reference::clear( $contact . '-' . $customer_id );
        cache_xref_reference::clear( $contact . '-' . $customer_id . 'LOGS' );

        $sql = '
            INSERT INTO reference
                (
                contact, reference, type_id, customer_id,
                start_date, end_date, comment, operator
                )
            VALUES
                (
                :contact, :reference, :type_id, :customer_id,
                :start_date, :end_date, :comment, :operator
                )
        ';

        $query = db_apib::prepare( $sql );
        $query->bindString( ':contact',     $contact )
            ->bindString( ':reference',   $reference )
            ->bindInt   ( ':type_id',     $type_id)
            ->bindInt   ( ':customer_id', $customer_id )
            ->bindDate  ( ':start_date',  $start_date)
            ->bindDate  ( ':end_date',    $end_date )
            ->bindString( ':comment',     $comment )
            ->bindInt   ( ':operator',    $operator );

        $success = $query->execute();

        if( $success )
        {
            $id = db_xref::lastInsertId();
            return self::getById( $id );
        }
        else
        {
            message::addError(
                'The cross reference was not saved. If the problem persists please contact support.',
                var_export( $query->getErrors(), 1 )
            );
            return null;
        }

    }

}