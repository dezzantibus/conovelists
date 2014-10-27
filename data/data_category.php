<?php

class data_category extends data
{

    public $id;

    public $name;

    public $description;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )          $this->id          = $data['id'];
            if( isset( $data['name'] ) )        $this->name        = $data['name'];
            if( isset( $data['description'] ) ) $this->description = $data['description'];
        }

    }

}
