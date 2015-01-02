<?php

class data_array extends data
{

    private $array;

    function __construct( $data=null )
    {

        $this->clear();

        if( is_array( $data ) )
        {
            $this->array = $data;
        }

    }

    public function count()
    {
        return count( $this->array );
    }

    public function clear()
    {
        $this->array = array();
    }

    public function add( $data )
    {
        $this->array[] = $data;
		return $this;
    }

    public function getData()
    {
        return $this->array;
    }

    public function last()
    {
        if( $this->isEmpty() )
        {
            return null;
        }
        return array_pop( $this->array );
    }

    public function first()
    {
        if( $this->isEmpty() )
        {
            return null;
        }
        return array_shift( $this->array );
    }

    public function isEmpty()
    {
        return empty( $this->array );
    }

}