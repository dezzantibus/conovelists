<?php

class data_chapter extends data
{

    public $id;

    public $parent_id;

    public $story_id;

    public $user_id;

    public $level;

    /** @var $story data_story */
    public $story;

    public $title;

    public $body;
	
	public $created;

	/** @var $user data_user */
    public $user;

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
            if( isset( $data['created'] ) )   $this->created   = $data['created'];
        }

    }

    public function getLink()
    {

        $story_id = $this->encode_id( $this->story_id );
		
        $story = $this->clean_for_url( $this->story->title );

		if( $ythis->level > 1 )
		{
			
			$id = $this->encode_id( $this->id );
			
	        $chapter = $this->clean_for_url( $this->title );

	        return '/' . $story_id . '-' . $id . '/' . $this->story->category->url . '/' . $story . '/' . $chapter . '.html';
		
		}

		/**
		 * If the chapter is the first one of the story use the story link to avoid
		 * multiple urls for the same content and make google happier
		 */
		return '/' . $story_id . '/' . $this->story->category->url . '/' . $story . '.html';

    }

}
