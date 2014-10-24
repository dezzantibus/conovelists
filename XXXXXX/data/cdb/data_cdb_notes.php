<?php

class data_cdb_notes extends data
{

    public $ID;

    public $created_at;

    public $Author;

    public $External_Key;

    public $Key_Type;

    public $Content;

    public $Expiry_date;


    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['ID'] ) )           $this->ID           = $data['ID'];
            if( isset( $data['created_at'] ) )   $this->created_at   = $data['created_at'];
            if( isset( $data['Author'] ) )       $this->Author       = $data['Author'];
            if( isset( $data['External_Key'] ) ) $this->External_Key = $data['External_Key'];
            if( isset( $data['Key_Type'] ) )     $this->Key_Type     = $data['Key_Type'];
            if( isset( $data['Content'] ) )      $this->Content      = $data['Content'];
            if( isset( $data['Expiry_date'] ) )  $this->ID           = $data['Expiry_date'];
        }

    }

    public function isExpired()
    {
        if( is_null( $this->Expiry_date ) )
        {
            return false;
        }

        if( strtotime( $this->Expriry_date ) > time() )
        {
            return false;
        }

        return true;

    }

}