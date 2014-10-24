<?php

class instance
{

    /** @var  $session data_apib_session */
    static public $session;

    /** @var  $customer data_apib_customer */
    static public $customer;

    /** @var  $civi data_apib_domain */
    static public $civi;

    static public $post;

    static public $get;

    static public $path;

    static public $result;

    /**
     * @param $get
     * @param $post
     * Authenticate session and
     * initialise the instance
     * with all necessary data
     */
    static public function initialise( $get, $post )
    {

        self::$get      = $get; // This can be subject to sanitization

        self::$post     = $post; // This can be subject to sanitization

        self::$path     = explode( '/', self::$get['path'] );

        self::$session  = model_apib_session::fetchById( self::$get['sid'] );

        self::$customer = model_apib_customer::fetchById( self::$session->customer_id );

        self::$civi     = model_apib_domain::fetchCiviDomainByCustomerId( self::$session->customer_id );

    }

}
