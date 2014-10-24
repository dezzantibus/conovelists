<?php

class data_apib_customer extends data
{

    public $id;

    public $name;

    public $user;

    public $pass;

    public $DB_Host;

    public $DB_Username;

    public $DB_Password;

    public $DB_Name;

    public $Show_Working_Code;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['ID'] ) )                  $this->id                   = $data['ID'];
            if( isset( $data['Name'] ) )                $this->name                 = $data['Name'];
            if( isset( $data['User'] ) )                $this->user                 = $data['User'];
            if( isset( $data['Pass'] ) )                $this->pass                 = $data['Pass'];
            if( isset( $data['DB_Host'] ) )             $this->DB_Host              = $data['DB_Host'];
            if( isset( $data['DB_Username'] ) )         $this->DB_Username          = $data['DB_Username'];
            if( isset( $data['DB_Password'] ) )         $this->DB_Password          = $data['DB_Password'];
            if( isset( $data['DB_Name'] ) )             $this->DB_Name              = $data['DB_Name'];
            if( isset( $data['Show_Working_Code'] ) )   $this->Show_Working_Code    = $data['Show_Working_Code'];
        }

    }

}
