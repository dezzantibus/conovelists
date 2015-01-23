<?php

class layout_new_chapter extends layout_page
{

    function __construct(
        data_array      $categories,
        data_array      $bookmarks,
        data_statistics $footerStats,
                        $story_id,
                        $parent_id,
                        $level,
        data_chapter    $chapterData,
        data_array      $tags
    )
    {

        $this->title = 'New Chapter - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'new_chapter';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_new_chapter_body( $footerStats, $story_id, $parent_id, $level, $chapterData, $tags ) );

    }

}