<?php

class layout_category extends layout_page
{

    function __construct( data_category $category, data_array $stories )
    {

        $this->title = $category->name;

        $this->description = $category->description;

    }

}