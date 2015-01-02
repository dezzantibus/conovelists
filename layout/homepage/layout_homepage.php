<?php

class layout_homepage extends layout_page
{

    function __construct(
        data_array      $categories,
        data_array      $bookmarks,
        data_statistics $footerStats,
        data_array      $stories,
        data_array      $popular,
        data_array      $tags
    )
    {

        $this->title = 'Homepage';

        $this->description = 'Description';

		$this->page_id = 'home';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_homepage_body( $footerStats, $stories, $popular, $tags ) );

    }

}