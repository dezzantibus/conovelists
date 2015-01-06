<?php

class data_contact extends data
{

    public $name;

    public $email;

    public $message;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['name'] ) )    $this->name     = $data['name'];
            if( isset( $data['email'] ) )   $this->email    = $data['email'];
            if( isset( $data['message'] ) ) $this->message  = $data['message'];
        }

    }

}
