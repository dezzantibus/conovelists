<?php

class layout_new_story extends layout_page
{

    function __construct( data_array $categories, data_array $bookmarks, data_statistics $footerStats, data_story $storyData )
    {

        $this->title = 'User Registration - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'admin_register';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_new_story_body( $footerStats, $storyData ) );	

    }

}