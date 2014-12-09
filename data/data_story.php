<?php

class data_story extends data
{

    public $id;

    public $category_id;

    public $first_chapter_id;

    public $title;

    public $brief;
	
	public $created;

	/** @var $category data_category */
	public $category;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )               $this->id               = $data['id'];
            if( isset( $data['category_id'] ) )      $this->category_id      = $data['category_id'];
            if( isset( $data['first_chapter_id'] ) ) $this->first_chapter_id = $data['first_chapter_id'];
            if( isset( $data['title'] ) )            $this->title            = $data['title'];
            if( isset( $data['brief'] ) )            $this->brief            = $data['brief'];
            if( isset( $data['created'] ) )          $this->created          = $data['created'];
        }

    }
	
	public function getDate()
	{
		
		if( empty( $this->created ) )
		{
			return null;
		}
		
		return $this->dateForDisplay( $this->created );
		
	}
	
	public function getLink()
	{
		
		return '/' . $this->encode_id( $this->id ) . 
		 	   '/' . $this->category->url . 
			   '/' . $this->clean_for_url( $this->title ) . '.html';
		
	}

}
