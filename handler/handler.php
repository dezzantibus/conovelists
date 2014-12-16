<?php

abstract class handler
{

    protected $data;

    function __construct()
    {
        $this->data = $_GET;
    }

    public function run()
    {

    }

}