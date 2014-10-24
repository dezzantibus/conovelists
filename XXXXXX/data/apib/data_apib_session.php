<?php

class data_apib_session extends data
{

    public $session_id;

    public $customer_id;

    public $user_id;

    public $auth_type;

    public $auth_name;

    public $updated_at;

    public $display_name;

    public $email_address;

    public $attributes;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['Session_ID'] ) )    $this->session_id    = $data['Session_ID'];
            if( isset( $data['Customer_ID'] ) )   $this->customer_id   = $data['Customer_ID'];
            if( isset( $data['User_ID'] ) )       $this->user_id       = $data['User_ID'];
            if( isset( $data['Auth_Type'] ) )     $this->auth_type     = $data['Auth_Type'];
            if( isset( $data['auth_name'] ) )     $this->auth_name     = $data['auth_name'];
            if( isset( $data['updated_at'] ) )    $this->updated_at    = $data['updated_at'];
            if( isset( $data['display_name'] ) )  $this->display_name  = $data['display_name'];
            if( isset( $data['email_address'] ) ) $this->email_address = $data['email_address'];
            if( isset( $data['attributes'] ) )    $this->attributes    = $data['attributes'];
        }

    }

    public function getAttributes()
    {
        return json_decode( $this->attributes );
    }

}
