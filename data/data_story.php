<?php

class data_story extends data
{

    public $id;

    public $category_id;

    public $first_chapter_id;

    public $title;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )               $this->id               = $data['id'];
            if( isset( $data['category_id'] ) )      $this->category_id      = $data['category_id'];
            if( isset( $data['first_chapter_id'] ) ) $this->first_chapter_id = $data['first_chapter_id'];
            if( isset( $data['title'] ) )            $this->title            = $data['title'];
        }

    }

}
