<?php

/**
 * Class data
 *
 * The data classes are dynamic and contain the data of one row of the database
 * Any method in these classes will be STRICTLY for the immediate manipulation of
 * the data. For example displaying the date in a particular format or rounding
 * decimal numbers.
 */
abstract class data
{

    protected function encode_id( $id )
    {
        return base_convert( $id, 10, 36 );
    }

    protected function decode_id( $id )
    {
        return base_convert( $id, 36, 10 );
    }

    protected function clean_for_url( $string )
    {

        $search  = array( ' ', '&', '%', '?', '$', '+' );
        $replace = array( '-', '',  '',  '',  '',  '' );

        return str_replace( $search, $replace, $string );

    }

}