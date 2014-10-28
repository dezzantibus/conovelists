<?php

class data_category extends data
{

    const STORIES_PER_PAGE = 10;

    public $id;

    public $name;

    public $description;

    public $url;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )          $this->id          = $data['id'];
            if( isset( $data['name'] ) )        $this->name        = $data['name'];
            if( isset( $data['description'] ) ) $this->description = $data['description'];
            if( isset( $data['url'] ) )         $this->url         = $data['url'];
        }

    }

}
