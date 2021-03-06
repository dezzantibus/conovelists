<?php

class layout_new_story extends layout_page
{

    function __construct( data_array $categories, data_array $bookmarks, data_statistics $footerStats, data_story $storyData, data_chapter $chapterData )
    {

        $this->title = 'New Story - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'new_story';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_new_story_body( $footerStats, $categories, $storyData, $chapterData ) );	

    }

}