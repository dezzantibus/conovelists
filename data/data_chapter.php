<?php

class data_chapter extends data
{

    public $id;

    public $parent_id;

    public $story_id;

    public $user_id;

    public $level;

    public $story;

    public $title;

    public $body;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )        $this->id        = $data['id'];
            if( isset( $data['parent_id'] ) ) $this->parent_id = $data['parent_id'];
            if( isset( $data['story_id'] ) )  $this->story_id  = $data['story_id'];
            if( isset( $data['user_id'] ) )   $this->user_id   = $data['user_id'];
            if( isset( $data['level'] ) )     $this->level     = $data['level'];
            if( isset( $data['story'] ) )     $this->story     = $data['story'];
            if( isset( $data['title'] ) )     $this->title     = $data['title'];
            if( isset( $data['body'] ) )      $this->body      = $data['body'];
        }

    }

    public function getLink()
    {

        $id = $this->encode_id( $this->id );

        $story_id = $this->encode_id( $this->story_id );

        $story = $this->clean_for_url( $this->story );

        $chapter = $this->clean_for_url( $this->title );

        return "/$story_id-$id/$story/$chapter.html";

    }

}
