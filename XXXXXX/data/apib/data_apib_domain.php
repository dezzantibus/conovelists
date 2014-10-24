<?php

class data_apib_domain extends data
{

    public $id;

    public $customer_id;

    public $host;

    public $GA_ID;

    public $name;

    public $logo_url;

    public $favicon_url;

    public $product;

    public $civi_dbname;

    public $civi_dbuser;

    public $civi_dbpass;

    public $civi_dbserver;

    public $civi_key;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['ID'] ) )              $this->id            = $data['ID'];
            if( isset( $data['Customer_ID'] ) )     $this->customer_id   = $data['Customer_ID'];
            if( isset( $data['Host'] ) )            $this->host          = $data['Host'];
            if( isset( $data['GA_ID'] ) )           $this->GA_ID         = $data['GA_ID'];
            if( isset( $data['Name'] ) )            $this->name          = $data['Name'];
            if( isset( $data['Logo_URL'] ) )        $this->logo_url      = $data['Logo_URL'];
            if( isset( $data['Favicon_URL'] ) )     $this->favicon_url   = $data['Favicon_URL'];
            if( isset( $data['Product'] ) )         $this->product       = $data['Product'];
            if( isset( $data['civi_dbname'] ) )     $this->civi_dbname   = $data['civi_dbname'];
            if( isset( $data['civi_dbuser'] ) )     $this->civi_dbuser   = $data['civi_dbuser'];
            if( isset( $data['civi_dbpass'] ) )     $this->civi_dbpass   = $data['civi_dbpass'];
            if( isset( $data['civi_dbserver'] ) )   $this->civi_dbserver = $data['civi_dbserver'];
            if( isset( $data['civi_key'] ) )        $this->civi_key      = $data['civi_key'];
        }

    }

}
