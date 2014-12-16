<?php

class layout_story extends layout_page
{

    function __construct( 
		data_array      $categories,
		data_array      $bookmarks, 
		data_statistics $footerStats, 
		data_chapter    $chapter, 
		data_array      $popular,
		data_array      $branches,
		data_array      $comments
	)
    {

        $this->title = $chapter->title;

        $this->description = $chapter->story->brief;
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_story_body( $footerStats, $chapter, $popular, $branches, $comments ) );	

    }

}