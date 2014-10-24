<?php

class data_apib_routing extends data
{

    public $id;

    public $parent_id;

    public $path;

    public $end_point;

    public $class;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )        $this->id        = $data['id'];
            if( isset( $data['parent_id'] ) ) $this->parent_id = $data['parent_id'];
            if( isset( $data['path'] ) )      $this->path      = $data['path'];
            if( isset( $data['end_point'] ) ) $this->end_point = $data['end_point'];
            if( isset( $data['class'] ) )     $this->class     = $data['class'];
        }

    }

}