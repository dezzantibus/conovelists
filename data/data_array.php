<?php

class data_array
{

    private $array;

    function __construct()
    {
        $this->clear();
    }

    public function clear()
    {
        $this->array = array();
    }

    public function add( data $data )
    {
        $this->array[] = $data;
    }

    public function getData()
    {
        return $this->array;
    }

    public function last()
    {
        if( empty( $this->array ) )
        {
            return null;
        }
        return array_pop( $this->array );
    }

    public function first()
    {
        if( empty( $this->array ) )
        {
            return null;
        }
        return array_shift( $this->array );
    }

}