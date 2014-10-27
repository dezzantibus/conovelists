<?php

class data_bookmark extends data
{

    public $id;

    public $user_id;

    public $chapter_id;

    public $name;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )         $this->id         = $data['id'];
            if( isset( $data['user_id'] ) )    $this->user_id    = $data['user_id'];
            if( isset( $data['chapter_id'] ) ) $this->chapter_id = $data['chapter_id'];
            if( isset( $data['name'] ) )       $this->name       = $data['name'];
        }

    }

}
