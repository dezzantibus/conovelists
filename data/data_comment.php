<?php

class data_comment extends data
{

    public $id;

    public $chapter_id;

    public $user_id;

    public $body;

    public $created;
	
	/** @var $user data_user */
	public $user;

    public function __construct( $data=null )
    {

        if( ! empty( $data ) )
        {
            if( isset( $data['id'] ) )         $this->id         = $data['id'];
            if( isset( $data['chapter_id'] ) ) $this->chapter_id = $data['chapter_id'];
            if( isset( $data['user_id'] ) )    $this->user_id    = $data['user_id'];
            if( isset( $data['body'] ) )       $this->body       = $data['body'];
            if( isset( $data['created'] ) )    $this->created    = $data['created'];
        }

    }

}
